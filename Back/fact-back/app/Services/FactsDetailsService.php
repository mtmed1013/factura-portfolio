<?php

namespace App\Services;

use App\Interfaces\IFactDetailsRepository;
use App\Interfaces\IFactDetailsService;

class FactsDetailsService implements IFactDetailsService
{
    protected $factDetailsRepository;

    public function __construct(IFactDetailsRepository $factDetailsRepository)
    {
        $this->factDetailsRepository = $factDetailsRepository;
    }

    public function GetAllByIdFact($id)
    {
        return $this->factDetailsRepository->GetAllByIdFact($id);
    }

    public function GetAllByIdProduct($productId)
    {
        return $this->factDetailsRepository->GetAllByIdProduct($productId);
    }

    public function Create($data)
    {
        return $this->factDetailsRepository->Create($data);
    }

    public function Delete($id)
    {
        return $this->factDetailsRepository->Delete($id);
    }
}
