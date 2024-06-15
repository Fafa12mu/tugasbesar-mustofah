<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bkeluar extends Model
{
    protected $table = "bkeluars";

    protected $fillable = [
        'kdbk',
        'nmbk',
        'hbk',
        'jbk',
        'gbk',
        'kasir',
        'totalh'
    ];
}
