<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'description', 'price', 'final', 'image', 'status'
    ];

    public function shops()
	{
		return $this->hasMany('App\Models\shop');
	}
}
