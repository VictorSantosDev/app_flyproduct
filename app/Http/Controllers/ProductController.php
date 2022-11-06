<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Domain\Product\Services\ProductService;
use Exception;

class ProductController extends Controller
{
    /** @var ProductService */
    private $service;

    public function __construct(ProductService $productService)
    {
        $this->service = $productService;
    }

    protected function store(ProductRequest $request)
    {
        try{
            $this->service->storeProduct($request);
        }catch(Exception $e){
            throw new Exception('FALHA AO CRIAR PRODUTO: '.$e->getMessage());
        }
    }
}
