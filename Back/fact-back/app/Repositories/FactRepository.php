<?php

namespace App\Repositories;

use App\Interfaces\IFactRepository;
use App\Models\Facts;

class FactRepository implements IFactRepository
{
    protected $factDetailsRepository;

    public function __construct(FactDetailsRepository $factDetailsRepository)
    {
        $this->factDetailsRepository = $factDetailsRepository;
    }

    public function GetAll()
    {
        return Facts::all();
    }

    public function GetAllByClient($clientId)
    {

        return Facts::select('facts.*')
            ->selectRaw('SUM(fd.total) as total_factura')
            ->join('tbl_fact_details as fd', 'facts.id', '=', 'fd.fact_id')
            ->where('facts.client_id', $clientId)
            ->groupBy('facts.id')
            ->get();
    }

    public function Create($data)
    {
        return Facts::create($data);
    }

    public function Delete($id)
    {
        $fact = Facts::find($id);
        if ($fact) {
            $fact->delete();
            return true;
        }
        return false;
    }
}
