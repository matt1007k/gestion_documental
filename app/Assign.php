<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{

    public function document(){
        return $this->belongsTo('App\Document');
    }
}
