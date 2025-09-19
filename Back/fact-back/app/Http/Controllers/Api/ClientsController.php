<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IClientsService;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    protected $IClientService;

    public function __construct(IClientsService $IClientService)
    {
        $this->IClientService = $IClientService;
    }

    public function index()
    {
        return $this->IClientService->GetAll();
    }
    public function show($id)
    {
        return $this->IClientService->GetById($id);
    }
    public function create(Request $request)
    {
        return $this->IClientService->Create($request);
    }

    public function update(Request $request, $id)
    {
        return $this->IClientService->Update($request, $id);
    }

    public function delete($id)
    {
        return $this->IClientService->Delete($id);
    }
}
