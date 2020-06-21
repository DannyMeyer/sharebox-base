<?php

namespace DannyMeyer\ShareBox\Base\Config\Factory;

use PDO;
use Psr\Container\ContainerInterface;

/**
 * Class PDOFactory
 */
class PDOFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $options = [
            PDO::ATTR_PERSISTENT         => true,
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $dbName = 'sharebox';
        $host = '127.0.0.1';
        $user = 'root';
        $password = '';
        $dsn = 'mysql:dbname=' . $dbName . ';host=' . $host . ';charset=utf8;';

        return new PDO($dsn, $user, $password, $options);
    }
}