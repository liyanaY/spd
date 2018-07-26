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

    // Accessor
    public function getCreatedAtFormatAttribute()
    {
    	return $this->created_at->format('d M Y h:i:s');
    }
    public function getUpdatedAtFormatAttribute()
    {
    	return $this->updated_at->format('d M Y h:i:s');
    }

}
