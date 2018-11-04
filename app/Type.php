<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['nombre', 'descripcion'];


    public function documentos(){
        return $this->hasMany('App\Document');
    }
}
