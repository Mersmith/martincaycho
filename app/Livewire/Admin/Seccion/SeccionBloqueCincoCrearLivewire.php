<?php

namespace App\Livewire\Admin\Seccion;

use App\Models\Seccion;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.layout-admin')]
class SeccionBloqueCincoCrearLivewire extends Component
{
    public $nombre;

    public $titulo;
    public $subtitulo;

    public $imagen;
    public $imagen_seo;

    public $boton = [
        'icono' => '',
        'fondo_color' => '#000000',
        'texto' => '',
        'texto_color' => '#000000',
        'link' => '',
    ];

    public $activo = false;

    protected function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'titulo' => 'nullable|string|max:255',
            'subtitulo' => 'nullable|string',
            'imagen' => 'nullable|string',
            'imagen_seo' => 'nullable|required_with:imagen|string',
            'boton.icono' => 'nullable|string',
            'boton.fondo_color' => 'nullable|string',
            'boton.texto' => 'nullable|string',
            'boton.texto_color' => 'nullable|string',
            'boton.link' => 'nullable|url',
            'activo' => 'boolean',
        ];
    }

    protected $validationAttributes = [
        'nombre' => 'nombre',
        'imagen' => 'imagen',
        'imagen_seo' => 'seo imagen',
        'boton.link' => 'link',
    ];

    protected $messages = [
        'nombre.required' => 'El :attribute es obligatorio.',
        'boton.link.url' => 'El :attribute debe ser válido.',
        'imagen_seo.required_with' => 'El :attribute es obligatorio.',
    ];

    public function store()
    {
        $this->validate();

        Seccion::create([
            'nombre' => $this->nombre,
            'tipo' => 'bloque-5',
            'contenido' => [
                'titulo' => $this->titulo,
                'subtitulo' => $this->subtitulo,
                'imagen' => $this->imagen,
                'imagen_seo' => $this->imagen_seo,
                'boton' => $this->boton,
            ],
            'activo' => $this->activo,
        ]);

        //$this->reset(['nombre', 'titulo', 'subtitulo', 'imagen', 'imagen_seo', 'boton', 'activo']);

        $this->dispatch('alertaLivewire', 'Creado');

        return redirect()->route('admin.seccion.bloque-cinco.vista.todo');
    }

    public function render()
    {
        return view('livewire.admin.seccion.seccion-bloque-cinco-crear-livewire');
    }
}
