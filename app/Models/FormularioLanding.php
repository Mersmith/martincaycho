<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormularioLanding extends Model
{
    /** @use HasFactory<\Database\Factories\FormularioLandingFactory> */
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
        'whatsapp_enviado',
        'whatsapp_message_id',
        'whatsapp_status',
        'whatsapp_response',
    ];

    public function tipoFormulario()
    {
        return $this->belongsTo(TipoFormulario::class, 'tipo_formulario_id');
    }
}
