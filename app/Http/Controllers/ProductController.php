<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Domain\Product\Services\ProductService;
use Exception;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /** @var ProductService */
    private $service;

    public function __construct(ProductService $productService)
    {
        $this->service = $productService;
    }

    protected function store(ProductRequest $request): JsonResponse
    {
        try{

            $this->service->storeProduct($request);

            return response()->json([
                'SUCCESS' => 'Produto salvo com sucesso!'
            ], 200);

        }catch(Exception $e){
            return response()->json([
                'FAILED_IN_SAVE_PRODUCT' => $e->getMessage()
            ], 500);
        }
    }

    /** @param Request $request */
    protected function update(Request $request): JsonResponse
    {
        try{

            if(empty($request->input('id'))){
                throw new Exception('Necessário passar o id do produto!');
            }

            $this->service->updateProduct($request, (int) $request->input('id'));

            return response()->json([
                'UPDATE_SUCCESS' => 'Produto editado com sucesso!'
            ], 200);

        }catch(Exception $e){
            return response()->json([
                'FAILAD_IN_UPDATE' => $e->getMessage()
            ], 500);
        }
    }
}
