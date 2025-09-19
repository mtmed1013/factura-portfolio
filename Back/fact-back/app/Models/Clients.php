<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table = 'tbl_clients';
    protected $fillable = [
        'identification',
        'first_name',
        'last_name',
        'email',
        'phone',
        'estado'
    ];
}
