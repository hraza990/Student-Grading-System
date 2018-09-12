<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'desc', 'condition', 'percentage'
    ];
}
