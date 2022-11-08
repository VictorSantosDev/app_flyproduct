<?php

declare(strict_types=1);

namespace App\Domain\Product\Services;

use Illuminate\Support\Str;
use App\Domain\Product\Factory\ProductFactory;
 
class ProductService extends AbstractProductService
{
    /** @var ProductFactory */
    private $product;

    public function storeProduct($request): void
    {
        $this->product = ProductFactory::create(
            (string) $request->type,
            (string) Str::ucfirst($request->name),
            (string) $request->description,
            (string) $request->photograph,
            (float) $this->removeComma($request->price)
        );
        dd($this->repository->all());
    }

    private function removeComma($price): float
    {
        return (float) Str::replace(',', '.', $price);
    }
}
