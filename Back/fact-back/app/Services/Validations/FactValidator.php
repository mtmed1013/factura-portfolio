<?php

namespace App\Services\Validations;

use Illuminate\Http\Request;

class FactsValidator
{
    public static function ValidateFields(Request $request): void
    {
        $request->validate([
            'client_id' => 'required|numeric',
        ], [
            'client_id.required' => 'El cliente es obligatorio.',
            'client_id.numeric' => 'El formato del cliente enviado es incorrecto',
        ]);
    }
}
