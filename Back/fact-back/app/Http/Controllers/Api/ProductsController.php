<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IProductsService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $IProductService;

    public function __construct(IProductsService $IProductService)
    {
        $this->IProductService = $IProductService;
    }

    public function index()
    {
        return response()->json($this->IProductService->GetAll());
    }
    public function show($id)
    {
        return response()->json($this->IProductService->GetById($id));
    }
    public function create(Request $request)
    {
        return response()->json($this->IProductService->Create($request));
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->IProductService->Update($id, $request));
    }

    public function delete($id)
    {
        return response()->json($this->IProductService->Delete($id));
    }
}
