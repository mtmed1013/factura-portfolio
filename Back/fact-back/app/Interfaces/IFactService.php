<?php

namespace App\Interfaces;

interface IFactService
{
    public function GetAll();
    public function GetAllByClient($clientId);
    public function Create($data);
    public function Delete($id);
}
