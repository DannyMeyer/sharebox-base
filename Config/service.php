<?php

use DannyMeyer\Di\Container;
use DannyMeyer\ShareBox\Base\Config\ConfigProviderDev;
use Laminas\ConfigAggregator\ConfigAggregator;

Container::addConfiguration(
    new ConfigAggregator(
        [
            ConfigProviderDev::class
        ]
    )
);
