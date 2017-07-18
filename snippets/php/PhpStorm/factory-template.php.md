```php
<?php
declare(strict_types=1);

namespace #[[$NAMESPACE$]]#;

use Psr\Container\ContainerInterface;

/**
 * Class #[[$CLASS_PREFIX$]]#Factory
 * @package #[[$NAMESPACE$]]#
 */
class #[[$CLASS_PREFIX$]]#Factory
{
    /**
     * @param ContainerInterface \$container
     * @return #[[$CLASS_PREFIX$]]##[[$CLASS_SUFFIX$]]#
     */
    public function __invoke(ContainerInterface \$container): #[[$CLASS_PREFIX$]]##[[$CLASS_SUFFIX$]]#
    {
        return new #[[$CLASS_PREFIX$]]##[[$CLASS_SUFFIX$]]#();
    }
}

```
