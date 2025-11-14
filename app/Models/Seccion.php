<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seccion extends Model
{
    /** @use HasFactory<\Database\Factories\SeccionFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'tipo',
        'contenido',
        'activo',
    ];

    protected $casts = [
        'contenido' => 'array',
    ];
}
