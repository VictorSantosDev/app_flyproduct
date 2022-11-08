<?php

namespace App\Domain\Product\Services;

// use App\Domain\Product\Repository\ProductRepositoryInterface;

use App\Infrastructure\Repository\Product\ProductRepository;

abstract class AbstractProductService
{
    /** @var  */
    protected $repository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }
}
