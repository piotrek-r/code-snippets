<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;

/** @var \Interop\Container\ContainerInterface $container */
$container = require __DIR__ . '/../config/container.php';

$application = new Application('application-name-cli'); // todo application name

$commands = $container->get('config')['console']['commands'];

foreach ($commands as $command) {
    $application->add($container->get($command));
}

$application->run();
