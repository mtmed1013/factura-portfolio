<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IFactService;
use Illuminate\Http\Request;

class FactsController extends Controller
{
    protected $IFactService;

    public function __construct(IFactService $IFactService)
    {
        $this->IFactService = $IFactService;
    }

    public function index(int $id)
    {
        return $this->IFactService->GetAllByClient($id);
    }

    public function create(Request $request)
    {
        return $this->IFactService->Create($request);
    }

    public function delete($id)
    {
        return $this->IFactService->Delete($id);
    }
}
