<?php

namespace App\Repositories;

use App\Models\FactDetails;
use App\Interfaces\IFactDetailsRepository;

class FactDetailsRepository implements IFactDetailsRepository
{

    public function GetAllByIdFact($factId)
    {
        return FactDetails::where('fact_id', $factId)
            ->join('tbl_products', 'tbl_fact_details.product_id', '=', 'tbl_products.id')
            ->join('tbl_facts', 'tbl_fact_details.fact_id', '=', 'tbl_facts.id')
            ->join('tbl_clients', 'tbl_facts.client_id', '=', 'tbl_clients.id')
            ->select('tbl_fact_details.*', 'tbl_products.name as product_name', 'tbl_clients.first_name as client_first_name', 'tbl_clients.last_name as client_last_name')
            ->get();
    }

    public function GetAllByIdProduct($productId)
    {
        return FactDetails::where('product_id', $productId)->get();
    }

    public function Create($data)
    {
        return FactDetails::create($data);
    }

    public function Delete($id)
    {
        $factDetail = FactDetails::find($id);
        if ($factDetail) {
            $factDetail->delete();
            return true;
        }
        return false;
    }

    public function DeleteByFact($factId)
    {
        return FactDetails::where('fact_id', $factId)->delete();
    }
}
