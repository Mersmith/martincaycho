<?php

namespace App\Livewire\Admin\Seccion;

use App\Models\Seccion;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.layout-admin')]
class SeccionBloqueNueveCrearLivewire extends Component
{
    public $nombre;

    public $titulo;
    public $subtitulo;
    public $content_html;

    public $activo = false;

    protected function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'titulo' => 'nullable|string|max:255',
            'subtitulo' => 'nullable|string',
            'content_html' => 'required|string',
            'activo' => 'boolean',
        ];
    }

    protected $validationAttributes = [
        'nombre' => 'nombre',
        'content_html' => 'contenido',
    ];

    protected $messages = [
        'nombre.required' => 'El :attribute es obligatorio.',
        'content_html.required' => 'El :attribute es obligatorio.',
    ];

    public function store()
    {
        $this->validate();

        Seccion::create([
            'nombre' => $this->nombre,
            'tipo' => 'bloque-9',
            'contenido' => [
                'titulo' => $this->titulo,
                'subtitulo' => $this->subtitulo,
                'content_html' => $this->content_html,
            ],
            'activo' => $this->activo,
        ]);

        //$this->reset(['nombre', 'titulo', 'subtitulo', 'activo']);

        $this->dispatch('alertaLivewire', 'Creado');

        return redirect()->route('admin.seccion.bloque-nueve.vista.todo');
    }

    public function render()
    {
        return view('livewire.admin.seccion.seccion-bloque-nueve-crear-livewire');
    }
}
