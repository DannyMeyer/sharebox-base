<?php

use DannyMeyer\Di\Container;

require_once __DIR__ . '/../vendor/autoload.php';

$container = Container::getInstance();
$pdo = $container->get(PDO::class);

return [
    'paths' => [
        'migrations' => __DIR__ . '/Base'
    ],
    'version_order' => 'execution',
    'templates' => [
        'file' => __DIR__ . '/Config/phinx.template'
    ],
    'environments' => [
        'default_database' => 'sharebox',
        'default_migration_table' => 'phinxlog',
        'sharebox' => [
            'name' => 'sharebox',
            'connection' => $pdo
        ]
    ]
];
