<?php

namespace App\Services;

use App\Interfaces\IClientsRepository;
use App\Interfaces\IClientsService;
use App\Services\Validations\ClientValidator;
use App\Interfaces\IFactRepository;

class ClientService implements IClientsService
{
    protected $clientRepository;
    protected $factRepository;

    public function __construct(IClientsRepository $clientRepository, IFactRepository $factRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->factRepository = $factRepository;
    }

    public function GetAll()
    {
        return $this->clientRepository->GetAll();
    }

    public function GetById($id)
    {
        return $this->clientRepository->GetById($id);
    }

    public function Create($data)
    {
        ClientValidator::ValidateFieldsAdd($data);
        $result = $this->clientRepository->Create($data->all());
        return ['message' => 'Client created successfully', 'client' => $result];
    }

    public function Update($data, $id)
    {
        ClientValidator::ValidateFieldsUpd($data);
        $result = $this->clientRepository->Update($id, $data->all());
        return ['message' => 'Client updated successfully', 'client' => $result];
    }

    public function Delete($id)
    {
        $facts = $this->factRepository->GetAllByClient($id);
        ClientValidator::ValidateClientInFacts($facts);
        $this->clientRepository->Delete($id);
        return ['message' => 'Client deleted successfully'];
    }
}
