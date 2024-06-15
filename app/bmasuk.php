<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bmasuk extends Model
{
    protected $table = "bmasuks";

    protected $fillable = [
        'kdbm',
        'nmbm',
        'hbm',
        'jbm',
        'gbm',
        'pengirim',
        'penerima'
    ];
}
