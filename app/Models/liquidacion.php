<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class liquidacion extends Model
{
    protected $fillable = [
        'promotion_id', 'estado', 'Monto'
    ];
}
