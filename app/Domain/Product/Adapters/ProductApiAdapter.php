<?php

namespace App\Domain\Product\Adapters;

use App\Domain\Product\Adapters\ApiAdapterInterface;

class ProductApiAdapter implements ApiAdapterInterface
{
    /** @var ProductApiCommands */
    private $productApi;

    public function __construct(ProductApiCommands $productApi)
    {
        $this->productApi = $productApi;
    }

    public function insert($value): void
    {
        $this->productApi->postInsertApi($value);
    }

    public function update($value): void
    {
        $this->productApi->postUpdateApi($value);
    }

    public function delete(int $id): void
    {
        $this->productApi->postDeleteApi($id);
    }

    /** @return array */
    public function find(int $id): array
    {
        $response = $this->productApi->getFindApi($id);
        return $response;
    }

    /** @return array */
    public function all(?int $limit = null, ?int $offSet = null): array
    {
        $reponse = $this->productApi->getAllApi($limit, $offSet);
        return [];
    }
}
