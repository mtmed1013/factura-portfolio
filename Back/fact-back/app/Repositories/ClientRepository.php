<?php

namespace App\Repositories;

use App\Interfaces\IClientsRepository;
use App\Models\Clients;

class ClientRepository implements IClientsRepository
{
    public function GetAll()
    {
        return Clients::all();
    }

    public function GetById($id)
    {
        return Clients::find($id);
    }

    public function Create($data)
    {
        $data['estado'] = 'A';
        return Clients::create($data);
    }

    public function Update($id, $data)
    {
        $client = Clients::find($id);
        if ($client) {
            $client->update($data);
            return $client;
        }
        return null;
    }

    public function Delete($id)
    {
        $client = Clients::find($id);
        if ($client) {
            $client->delete();
            return true;
        }
        return false;
    }
}
