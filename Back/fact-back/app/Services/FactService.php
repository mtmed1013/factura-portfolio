<?php

namespace App\Services;

use App\Interfaces\IFactRepository;
use App\Interfaces\IFactService;
use App\Interfaces\IFactDetailsRepository;
use App\Services\Validations\FactsValidator;

class FactService implements IFactService
{
    protected $factRepository;
    protected $factDetailsRepository;

    public function __construct(IFactRepository $factRepository, IFactDetailsRepository $factDetailsRepository)
    {
        $this->factRepository = $factRepository;
        $this->factDetailsRepository = $factDetailsRepository;
    }
    public function GetAllByClient($clientId)
    {
        $result = $this->factRepository->GetAllByClient($clientId);
        return ['message' => 'Client retrieved successfully', 'client' => $result];
    }

    public function GetAll()
    {
        $result = $this->factRepository->GetAll();
        return ['message' => 'All facts retrieved successfully', 'facts' => $result];
    }

    public function Create($data)
    {
        FactsValidator::ValidateFields($data);
        $result = $this->factRepository->Create($data);
        return ['message' => 'Fact created successfully', 'fact' => $result];
    }

    public function Delete($id)
    {
        $this->factDetailsRepository->DeleteByFact($id);
        $result = $this->factRepository->Delete($id);
        return ['message' => 'Fact deleted successfully', 'fact' => $result];
    }
}
