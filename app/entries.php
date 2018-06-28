<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class entries extends Model
{
    protected $fillable = [
        'name', 'email', 'message',
    ];
}
