<?php

namespace Gustavovinicius\Crm\Controllers;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class BaseController
{
    protected $entityManager;
    protected $entityPath = "";

    public function __construct()
    {
        // print_r(json_encode([$this->entityPath]));echo "\n\n";exit;
        $config = $this->configEntityPath($this->entityPath);
        $connection = $this->configConnection($config);
        $this->entityManager = new EntityManager($connection, $config);
    }

    public function configEntityPath($entityPath)
    {
        return ORMSetup::createAttributeMetadataConfiguration(
            paths: array($entityPath),
            isDevMode: true,
        );
    }

    public function configConnection($config)
    {
        return DriverManager::getConnection([
            'driver' => 'pdo_mysql',
            'host' => 'mysql',
            'port' => 3306,
            'dbname' => 'laravel',
            'user' => 'root',
            'password' => 'laravel',
        ], $config);
    }
}
