<?php

namespace App\Container;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;
use Interop\Container\ContainerInterface;

/**
 * Class EntityManagerFactory
 * @package App\Container
 */
class EntityManagerFactory
{
    /**
     * @param ContainerInterface $container
     * @return EntityManagerInterface
     */
    public function __invoke(ContainerInterface $container): EntityManagerInterface
    {
        $doctrineConfig = $container->get('config')['doctrine'] ?? [];
        $ormConfig = $doctrineConfig['orm'] ?? [];

        // Doctrine ORM
        $doctrine = new Configuration();
        $doctrine->setProxyDir($ormConfig['proxy_dir']);
        $doctrine->setProxyNamespace($ormConfig['proxy_namespace']);
        $doctrine->setAutoGenerateProxyClasses($ormConfig['auto_generate_proxy_classes']);
        if ($ormConfig['underscore_naming_strategy']) {
            $doctrine->setNamingStrategy(new UnderscoreNamingStrategy());
        }

        if (!empty($ormConfig['logger_class'])) {
            $doctrine->setSQLLogger($container->get($ormConfig['logger_class']));
        }

        foreach ($ormConfig['register_annotations'] as $registerAnnotation) {
            AnnotationRegistry::registerFile($registerAnnotation);
        }

        $driver = new AnnotationDriver(new AnnotationReader(), [$ormConfig['entity_dir']]);
        $doctrine->setMetadataDriverImpl($driver);

        // Cache
//        $cache = $container->get(Cache::class);
//        $doctrine->setQueryCacheImpl($cache);
//        $doctrine->setResultCacheImpl($cache);
//        $doctrine->setMetadataCacheImpl($cache);

        // EntityManager
        return EntityManager::create($doctrineConfig['connection']['orm_default'], $doctrine);
    }
}
