<?php

namespace Gustavovinicius\Example\Controllers;

use Gustavovinicius\Crm\Controllers\BaseController;
use Gustavovinicius\Example\Domain\Post;
use Doctrine\ORM\EntityManager;

class PostController extends BaseController
{
    // protected $entityManager;
    protected $entityPath = "../packages/example/src/Domain";

    // public function __construct()
    // {
    //     $this->entityManager = EntityManager::class;
    // }

    public function index()
    {
        $productRepository = $this->entityManager->getRepository('Post');
        $result = $productRepository->findAll();
        print_r(json_encode([$result]));echo "\n\n";exit;
    }
}
