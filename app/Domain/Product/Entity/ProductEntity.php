<?php

declare(strict_types=1);

namespace App\Domain\Product\Entity;

class ProductEntity implements ProductInterface
{
    /** @var string */
    private $type;

    /** @var string */
    private $name;

    /** @var string */
    private $description;

    /** @var string */
    private $photograph;

    /** @var float */
    private $price;

    public function __construct(
    string $type, 
    string $name, 
    string $description, 
    ?string $photograph, 
    float $price
    )
    {
        $this->type = $type;
        $this->name = $name;
        $this->description = $description;
        $this->photograph = $photograph;
        $this->price = $price;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPhotograph(): string
    {
        return $this->photograph;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
