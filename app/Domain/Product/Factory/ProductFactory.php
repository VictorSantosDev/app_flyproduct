<?php

namespace App\Domain\Product\Factory;

use App\Domain\Product\Entity\ProductEntity;
use App\Domain\Product\Entity\ProductInterface;

class ProductFactory
{
    static public function create(
    string $type, 
    string $name, 
    string $description, 
    ?string $photograph, 
    float $price): ProductInterface
    {
        return new ProductEntity($type, $name, $description, $photograph, $price);
    }
}
