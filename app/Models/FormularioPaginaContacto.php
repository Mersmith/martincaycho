<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormularioPaginaContacto extends Model
{
    /** @use HasFactory<\Database\Factories\FormularioPaginaContactoFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tipo_formulario_id',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'asunto',
        'mensaje',
        'leido',
        'estado',
    ];

    public function tipoFormulario()
    {
        return $this->belongsTo(TipoFormulario::class, 'tipo_formulario_id');
    }
}
