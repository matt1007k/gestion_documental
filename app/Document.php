<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'cod_documento', 'titulo', 'asunto','origen', 'destino', 'archivo', 'estado'
    ];

    public function type(){
        return $this->belongsTo('App\Type');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


    public function adjuntados()
    {
        return $this->belongsToMany(Document::class, 'adjuntados', 'adjuntado_id', 'document_id')->withTimestamps();
    }

    public function documentos()
    {
        return $this->belongsToMany(Document::class, 'adjuntados', 'document_id', 'adjuntado_id')->withTimestamps();
    }
}
