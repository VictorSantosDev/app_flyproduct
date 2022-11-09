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

    public function create($value): void
    {
        $this->model->create($value);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->all();
    }
}
