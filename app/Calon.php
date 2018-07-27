<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    //
    protected $table = 'calon';
    protected $guarded = [];

    // Join table Sesi
    public function sesi()
    {
    	//
    	return $this->belongsTo('App\Sesi', 'sesi_id', 'id');
    }
}
