<?php

namespace App\Livewire\Admin\Seccion;

use App\Models\Seccion;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\On;

#[Layout('layouts.admin.layout-admin')]
class SeccionBloqueSeisEditarLivewire extends Component
{
    public $seccion;

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

    public function mount($id)
    {
        $this->seccion = Seccion::findOrFail($id);

        $this->nombre = $this->seccion->nombre;
        $this->activo = $this->seccion->activo;

        $contenido = $this->seccion->contenido ?? [];

        $this->titulo = $contenido['titulo'];
        $this->subtitulo = $contenido['subtitulo'];
    }

    public function store()
    {
        $this->validate();

        $this->seccion->update([
            'nombre' => $this->nombre,
            'contenido' => [
                'titulo' => $this->titulo,
                'subtitulo' => $this->subtitulo,
            ],
            'activo' => $this->activo,
        ]);

        //$this->reset(['nombre', 'titulo', 'subtitulo', 'activo']);

        $this->dispatch('alertaLivewire', "Actualizado");
    }

    #[On('eliminarSeccion6On')]
    public function eliminarSeccion6On()
    {
        if ($this->seccion) {
            $this->seccion->delete();

            return redirect()->route('admin.seccion.bloque-seis.vista.todo');
        }
    }

    public function render()
    {
        return view('livewire.admin.seccion.seccion-bloque-seis-editar-livewire');
    }
}
