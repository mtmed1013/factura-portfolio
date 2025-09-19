<?php

namespace App\Repositories;

use App\Interfaces\IProductsRepository;
use App\Models\Products;

class ProductRepository implements IProductsRepository
{
    public function GetAll()
    {
        return Products::all();
    }

    public function GetById($id)
    {
        return Products::find($id);
    }

    public function Create($data)
    {
        return Products::create($data);
    }

    public function Update($id, $data)
    {
        $product = Products::find($id);
        if ($product) {
            $product->update($data);
            return $product;
        }
        return null;
    }

    public function Delete($id)
    {
        $product = Products::find($id);
        if ($product) {
            $product->delete();
            return true;
        }
        return false;
    }
}
