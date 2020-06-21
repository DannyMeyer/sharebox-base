<?php

namespace DannyMeyer\ShareBox\Base;

use DannyMeyer\Di\Container;

/**
 * Class ConfigProvider
 * @package DannyMeyer\ShareBox
 */
class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            Container::CONFIG_DEPENDENCIES => [
                Container::CONFIG_FACTORIES => [

                ],
            ]
        ];
    }
}
