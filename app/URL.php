<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URL extends Model
{
    protected $table = 'links';
    protected $fillable = ['url','hash'];

}
