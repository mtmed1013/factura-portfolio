<?php

namespace App\Services\Validations;

use Illuminate\Http\Request;

class FactDetailsValidator
{
    public static function ValidateFields(Request $request): void
    {
        $request->validate([
            'fact_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric|min:1',
            'final_price' => 'required|numeric|min:1',
        ], [
            'fact_id.required' => 'El ID de la factura es obligatorio.',
            'fact_id.numeric' => 'El formato del ID de la factura enviado es incorrecto.',
            'product_id.required' => 'El ID del producto es obligatorio.',
            'product_id.numeric' => 'El formato del ID del producto enviado es incorrecto.',
            'quantity.required' => 'La cantidad es obligatoria.',
            'quantity.numeric' => 'El formato de la cantidad enviada es incorrecto.',
            'quantity.min' => 'La cantidad debe ser al menos 1.',
            'final_price.required' => 'El precio final es obligatorio.',
            'final_price.numeric' => 'El formato del precio final enviado es incorrecto.',
            'final_price.min' => 'El precio final debe ser al menos 1.',
        ]);
    }
}
