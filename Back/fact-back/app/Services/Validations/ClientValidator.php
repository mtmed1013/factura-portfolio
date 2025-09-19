<?php

namespace App\Services\Validations;

use Illuminate\Http\Request;

class ClientValidator
{
    public static function ValidateFieldsAdd(Request $request): void
    {
        $request->validate([
            'identification' => 'required|string|max:20',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => [
                'required',
                'string',
                'max:150',
                'regex:/^(?![\w\.-]+@(test\.com|nocorreo\.com)$)[\w\.-]+@[\w\.-]+\.\w{2,}$/'
            ],
            'phone' => [
                'required',
                'numeric',
                'digits:10',
            ]
        ], [
            'identification.required' => 'La identificación es obligatoria.',
            'identification.string' => 'La identificación debe ser texto.',
            'identification.max' => 'La identificación no puede tener más de 20 caracteres.',
            'first_name.required' => 'El nombre es obligatorio.',
            'first_name.string' => 'El nombre debe ser texto.',
            'first_name.max' => 'El nombre no puede tener más de 50 caracteres.',
            'last_name.required' => 'El apellido es obligatorio.',
            'last_name.string' => 'El apellido debe ser texto.',
            'last_name.max' => 'El apellido no puede tener más de 50 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser texto.',
            'email.max' => 'El correo electrónico no puede tener más de 150 caracteres.',
            'email.regex' => 'El formato del correo electrónico es incorrecto.',
            'phone.required' => 'El teléfono o celular es obligatorio.',
            'phone.numeric' => 'El teléfono o celular debe ser un número.',
            'phone.digits' => 'El teléfono o celular debe tener exactamente 10 dígitos.',
        ]);
    }

    public static function ValidateFieldsUpd(Request $request): void
    {
        $request->validate([
            'id' => 'numeric|required|exists:tbl_clients,id'
        ], [
            'id.required' => 'El ID es obligatorio cuando se proporciona.',
            'id.numeric' => 'El ID debe ser un número.',
            'id.exists' => 'El ID debe existir en la base de datos.',
        ]);
        ClientValidator::ValidateFieldsAdd($request);
    }

    public static function ValidateClientInFacts($facts): void
    {
        if ($facts->count() > 0) {
            throw new \Exception('No se puede eliminar el cliente porque tiene facturas asociadas.');
        }
    }
}
