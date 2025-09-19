<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facts extends Model
{
    protected $table = 'tbl_facts';
    protected $fillable = [
        'client_id',
        'estado'
    ];
}
