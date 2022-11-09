<?php

declare(strict_types=1);

namespace App\Domain\Product\Services;

use Illuminate\Support\Str;
use App\Domain\Product\Factory\ProductFactory;
use Exception;

class ProductService extends AbstractProductService
{
    public function storeProduct($request): void
    {
        try{
            $constructProduct = ProductFactory::create(
                (string) $request->type,
                (string) Str::ucfirst($request->name),
                (string) $request->description,
                (string) $request->photograph,
                (float) $this->removeComma($request->price)
            );

            $product = [
                'type' => $constructProduct->getType(), 
                'name' => $constructProduct->getName(),
                'description' => $constructProduct->getDescription(),
                'photograph' => $this->checkPhotograph($constructProduct->getPhotograph()),
                'price' => $constructProduct->getPrice(),
            ];

            $this->repository->create($product);

        }catch(Exception $e){
            throw new Exception('save_product'.$e->getMessage());
        }
    }

    /** @param int $id */
    public function updateProduct($request, int $id): void
    {
        try{
            $product = $this->repository->find($id);
    
            $product->type         = $request->type != null ? $request->type : $product->type;
            $product->name         = $request->name != null ? $request->name : $product->name;
            $product->description  = $request->description != null ? $request->description : $product->description;
            
            if($request->input('photograph_hidden') == 'active'){
                $product->photograph = $request->photograph;
            }else{
                $product->photograph = $request->photograph != null ? $request->photograph : null;
            }

            $product->price = $request->price != null ? $this->removeComma($request->price) : $product->price;

            $product->save();
        }catch(Exception $e){
            throw new Exception('update_product'.$e->getMessage());
        }
    }

    /** @return float */
    private function removeComma(string $price): float
    {
        return (float) Str::replace(',', '.', $price);
    }

    /** @return string|null */
    private function checkPhotograph(string $photograph)
    {
        return !empty($photograph) ? $photograph : null;
    }
}
