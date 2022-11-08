<?php

namespace App\Domain\Product\Adapters;

interface ApiAdapterInterface
{
    public function insert($value): void;

    public function update($value): void;

    public function delete(int $id): void;

    public function find(int $id): array;

    public function all(?int $limit = null, ?int $offSet = null): array;
}
