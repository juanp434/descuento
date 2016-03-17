<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    protected $fillable = [
        'name', 'email', 'status', 'image', 'user_id'
    ];
}
