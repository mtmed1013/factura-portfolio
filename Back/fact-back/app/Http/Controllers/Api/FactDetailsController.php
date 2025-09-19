<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IFactDetailsService;
use Illuminate\Http\Request;

class FactDetailsController extends Controller
{
    protected $IFactDetailsService;

    public function __construct(IFactDetailsService $IFactDetailsService)
    {
        $this->IFactDetailsService = $IFactDetailsService;
    }

    public function index(int $id)
    {
        return $this->IFactDetailsService->GetAllByIdFact($id);
    }

    public function create(Request $request)
    {
        return $this->IFactDetailsService->Create($request);
    }

    public function delete($id)
    {
        return $this->IFactDetailsService->Delete($id);
    }
}
