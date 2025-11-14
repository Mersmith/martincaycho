<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormularioLibroReclamacion extends Model
{
    /** @use HasFactory<\Database\Factories\FormularioLibroReclamacionFactory> */
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'ticket';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $appends = ['codigo'];

    protected $fillable = [
        'tipo_formulario_id',
        'serie',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'domicilio',
        'telefono',
        'email',
        'tipo_documento',
        'numero_documento',
        'tipo_bien_contratado',
        'monto_reclamado',
        'descripcion',
        'tipo_pedido',
        'detalle',
        'pedido',
        'conformidad',
        'observaciones',
        'fecha_respuesta',
        'leido',
        'estado',
    ];

    protected $casts = [
        'fecha_respuesta' => 'datetime',
    ];

    public function tipoFormulario()
    {
        return $this->belongsTo(TipoFormulario::class, 'tipo_formulario_id');
    }

    public function getCodigoAttribute()
    {
        return $this->serie . '-' . str_pad($this->ticket, 9, '0', STR_PAD_LEFT);
    }
}
