<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    // create protected table named sesi
    protected $table = 'sesi';

    // variable tak lalu form
    protected $guarded = [];
    // OR (EITHER ONE JE)
    // variable lalu form
    //protected $fillable = ['name', 'status', 'pingat']
}
