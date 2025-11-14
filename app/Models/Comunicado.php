<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comunicado extends Model
{
    /** @use HasFactory<\Database\Factories\ComunicadoFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titulo',
        'slug',
        'contenido',
        'imagen',
        'publicado_en',
        'activo',
        'documento',
        'meta_title',
        'meta_description',
        'meta_image',
        'views'
    ];

    protected $casts = [
        'documento' => 'array',
    ];
}
