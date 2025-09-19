<?php

namespace App\Services;

use App\Interfaces\IFactDetailsRepository;
use App\Interfaces\IProductsRepository;
use App\Interfaces\IProductsService;
use Illuminate\Http\Request;
use App\Services\Validations\ProductValidator;

class ProductService implements IProductsService
{
    private $IProductRepository;
    private $IFactDetailsDetailsRepository;

    public function __construct(
        IProductsRepository $IProductRepository,
        IFactDetailsRepository $IFactDetailsDetailsRepository
    ) {
        $this->IProductRepository = $IProductRepository;
        $this->IFactDetailsDetailsRepository = $IFactDetailsDetailsRepository;
    }

    public function GetAll()
    {
        return $this->IProductRepository->GetAll();
    }

    public function GetById($id)
    {
        return $this->IProductRepository->GetById($id);
    }

    public function Create(Request $data)
    {
        ProductValidator::ValidateFieldsAdd($data);
        $result = $this->IProductRepository->Create($data->all());
        return ['message' => 'Producto creado exitosamente', 'product' => $result];
    }

    public function Update($id, Request $data)
    {
        ProductValidator::ValidateFieldsUpd($data, $id);
        $result = $this->IProductRepository->Update($id, $data->all());
        return ['message' => 'Product updated successfully', 'product' => $result];
    }

    public function Delete($id)
    {
        $product = $this->IFactDetailsDetailsRepository->GetAllByIdProduct($id);
        ProductValidator::ValidateProductInFacts($product);
        return ['message' => 'Producto eliminado exitosamente', 'product' => $this->IProductRepository->Delete($id)];
    }
}
