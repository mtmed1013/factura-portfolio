<?php

namespace App\Interfaces;

interface IFactRepository
{
    public function GetAll();
    public function GetAllByClient($clientId);
    public function Create($data);
    public function Delete($id);
}
