<?php

namespace App\Infrastructure\Repository\Product;

use App\Domain\Product\Repository\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    private $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function create(): void
    {

    }

    public function all()
    {
        return $this->model->all();
    }
}
