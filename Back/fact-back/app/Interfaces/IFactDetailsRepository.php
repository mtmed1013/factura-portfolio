<?php

namespace App\Interfaces;

interface IFactDetailsRepository
{
    public function GetAllByIdFact($factId);
    public function GetAllByIdProduct($productId);
    public function Create($data);
    public function Delete($id);
    public function DeleteByFact($factId);
}
