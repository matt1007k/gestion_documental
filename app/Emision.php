<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emision extends Model
{
    public function document(){
        return $this->belongsTo('App\Document');
    }
}
