<?php

namespace App\Domain\Product\Repository;

interface ProductRepositoryInterface
{
    public function create(): void;

    public function all();
}
