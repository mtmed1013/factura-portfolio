<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactDetails extends Model
{
    protected $table = 'tbl_fact_details';
    protected $fillable = [
        'fact_id',
        'product_id',
        'quantity',
        'final_price',
    ];
}
