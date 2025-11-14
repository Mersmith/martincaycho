<?php

namespace App\Livewire\Admin\Seccion;

use App\Models\Seccion;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.layout-admin')]
class SeccionBloqueSeisCrearLivewire extends Component
{
    public $nombre;

    public $titulo;
    public $subtitulo;

    public $activo = false;

    protected function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'titulo' => 'nullable|string|max:255',
            'subtitulo' => 'nullable|string',
            'activo' => 'boolean',
        ];
    }

    protected $validationAttributes = [
        'nombre' => 'nombre',
    ];

    protected $messages = [
        'nombre.required' => 'El :attribute es obligatorio.',
    ];

    public function store()
    {
        $this->validate();

        Seccion::create([
            'nombre' => $this->nombre,
            'tipo' => 'bloque-6',
            'contenido' => [
                'titulo' => $this->titulo,
                'subtitulo' => $this->subtitulo,
            ],
            'activo' => $this->activo,
        ]);

        //$this->reset(['nombre', 'titulo', 'subtitulo', 'activo']);

        $this->dispatch('alertaLivewire', 'Creado');

        return redirect()->route('admin.seccion.bloque-seis.vista.todo');
    }

    public function render()
    {
        return view('livewire.admin.seccion.seccion-bloque-seis-crear-livewire');
    }
}
