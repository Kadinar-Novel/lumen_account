<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAccount extends Model 
{
    protected $table = 'account';

    protected $fillable = [
        'nama', 'alamat', 'telepon', 'email', 'username', 'password'
    ];
}
