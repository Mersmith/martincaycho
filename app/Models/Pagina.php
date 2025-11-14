<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagina extends Model
{
    /** @use HasFactory<\Database\Factories\PaginaFactory> */
    use HasFactory, SoftDeletes;

    const TIPO_SECCIONES = 'secciones';
    const TIPO_PERSONALIZADO = 'personalizado';

    protected $fillable = [
        'tipo',
        'titulo',
        'slug',
        'contenido',
        'meta_title',
        'meta_description',
        'meta_imagen',
        'meta_imagen_alt',
        'views',
        'mostrar_en_menu',
        'orden',
        'activo',
    ];

    protected $casts = [
        'contenido' => 'array',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
