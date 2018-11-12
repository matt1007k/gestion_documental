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

    public  function  assigns(){
        return $this->hasMany('App\Assign');
    }

    public  function  emisions(){
        return $this->hasMany('App\Emision');
    }

    // Scope de filtros o búsquedas
    public function scopeTexto($query, $texto)
    {
        if ($texto)
            return $query->Where('titulo', 'LIKE', "%$texto%")
                        ->orWhere('asunto', 'LIKE', "%$texto%")
                        ->orWhere('origen', 'LIKE', "%$texto%")
                        ->orWhere('destino', 'LIKE', "%$texto%")
                        ->orWhere('created_at', 'LIKE', "%$texto%")
                        ->orWhere('estado', 'LIKE', "%$texto%");
    }

    public function scopeTitulo($query, $titulo)
    {
        if ($titulo)
            return $query->where('titulo', 'LIKE', "%$titulo%");
    }

    public function scopeAsunto($query, $asunto)
    {
        if ($asunto)
            return $query->where('asunto', 'LIKE', "%$asunto%");
    }

    public function scopeOrigen($query, $origen)
    {
        if ($origen)
            return $query->where('origen', 'LIKE', "%$origen%");
    }

    public function scopeDestino($query, $destino)
    {
        if ($destino)
            return $query->where('destino', 'LIKE', "%$destino%");
    }


    public function scopeEstado($query, $estado)
    {
        if ($estado)
            return $query->where('estado', 'LIKE', "%$estado%");
    }

    // Rango de fecha
    public function scopeFechas($query, $fecha1, $fecha2)
    {
        if ($fecha1)
            return $query->where('created_at', 'LIKE', "%$fecha1%");
        elseif ($fecha1 && $fecha2)
            return $query->orWhere('created_at', 'LIKE', "%$fecha1%")
                        ->orWhere('created_at', 'LIKE', "%$fecha2%");
    }

}
