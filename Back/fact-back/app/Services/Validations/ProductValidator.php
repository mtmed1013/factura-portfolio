<?php

namespace App\Services\Validations;

use App\Exceptions\CustomHttpException;
use Illuminate\Http\Request;

class ProductValidator
{
    public static function ValidateFieldsAdd(Request $request): void
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tbl_products,name',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock' => 'nullable|integer',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser texto.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'name.unique' => 'El nombre del producto ya existe.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'description.string' => 'La descripción debe ser texto.',
            'stock.integer' => 'El stock debe ser un número entero.',
        ]);
    }

    public static function ValidateFieldsUpd(Request $request, string $id): void
    {
        $request->validate([
            'id' => 'numeric|required|exists:tbl_products,id',
            'name' => 'required|string|max:255|unique:tbl_products,name,' . $id,
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'stock' => 'nullable|integer',
        ], [
            'id.required' => 'El ID es obligatorio cuando se proporciona.',
            'id.numeric' => 'El ID debe ser un número.',
            'id.exists' => 'El ID debe existir en la base de datos.',
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser texto.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'name.unique' => 'El nombre del producto ya existe.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'description.string' => 'La descripción debe ser texto.',
            'stock.integer' => 'El stock debe ser un número entero.',
        ]);
    }

    public static function ValidateProductInFacts(object $products): void
    {
        if (count($products) > 0) {
            throw new CustomHttpException("No se puede eliminar el producto porque está asociado a detalles de facturas.", 409);
        }
    }
}
