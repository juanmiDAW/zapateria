<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    /** @use HasFactory<\Database\Factories\LineaFactory> */
    use HasFactory;

    protected $fillable = ['factura_id', 'usuario_id', 'zapato_id', 'cantidad'];

    public function factura(){
        return $this->belongsTo(Factura::class);
    }

    public function zapato(){
        return $this->belongsTo(Zapato::class);
    }
}
