<?php

namespace App\Interfaces;

interface IClientsRepository
{
    public function GetAll();
    public function GetById($id);
    public function Create(array $data);
    public function Update($id, array $data);
    public function Delete($id);
}
