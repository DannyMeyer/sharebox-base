<?php

namespace DannyMeyer\ShareBox\Base\Config;

use DannyMeyer\Di\Container;
use DannyMeyer\ShareBox\Base\ConfigProvider;
use DannyMeyer\ShareBox\Base\Config\Factory\PDOFactory;
use PDO;

use function array_merge_recursive;

/**
 * Class ConfigProviderDev
 *
 * @package DannyMeyer\ShareBox\config
 */
class ConfigProviderDev extends ConfigProvider
{
    public function __invoke(): array
    {
        return array_merge_recursive(
            parent::__invoke(),
            [
                Container::CONFIG_DEPENDENCIES => [
                    Container::CONFIG_FACTORIES => [
                        PDO::class => PDOFactory::class,
                    ],
                ]
            ]
        );
    }
}