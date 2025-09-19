<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface IClientsService
{
    public function GetAll();
    public function GetById($id);
    public function Create(Request $data);
    public function Update($id, Request $data);
    public function Delete($id);
}
