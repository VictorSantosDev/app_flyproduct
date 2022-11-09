<?php

namespace App\Domain\Product\Repository;

interface ProductRepositoryInterface
{
    public function create($value): void;

    public function find($id);
    public function all();
}
