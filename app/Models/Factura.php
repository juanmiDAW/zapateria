<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    /** @use HasFactory<\Database\Factories\FacturaFactory> */
    use HasFactory;

    protected $fillable = ['usuario_id'];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}

