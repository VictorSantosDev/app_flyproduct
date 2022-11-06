<?php

declare(strict_types=1);

namespace App\Domain\Product\Entity;

interface ProductInterface
{
    public function getType(): string;

    public function getName(): string;

    public function getDescription(): string;

    public function getPhotograph(): string;

    public function getPrice(): float;
}
