<?php

namespace App\Domain\Product\Adapters;

class ProductApiCommands
{
    public function postInsertApi($value): void
    {

    }

    public function postUpdateApi($value): void
    {

    }

    public function postDeleteApi($id): void
    {

    }

    public function getFindApi($id): array
    {
        return [];
    }

    /** @return array */
    public function getAllApi($limit, $offSet): array
    {
        if($limit != null){

        }

        if($offSet != null){

        }


        return [];
    }
}
