<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'tbl_products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
    ];
    const UPDATED_AT = null;
}
