<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoFormulario extends Model
{
    /** @use HasFactory<\Database\Factories\TipoFormularioFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'activo',
    ];

    public function formularioPaginaContacto()
    {
        return $this->hasMany(FormularioPaginaContacto::class);
    }

}
