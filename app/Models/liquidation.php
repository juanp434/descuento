<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class liquidation extends Model
{
    protected $fillable = [
        'promotion_id', 'estado', 'Monto'
    ];
}
