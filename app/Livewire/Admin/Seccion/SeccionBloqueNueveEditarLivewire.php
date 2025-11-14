<?php

namespace App\Livewire\Admin\Seccion;

use App\Models\Seccion;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\On;

#[Layout('layouts.admin.layout-admin')]
class SeccionBloqueNueveEditarLivewire extends Component
{
    public $seccion;

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

    public function mount($id)
    {
        $this->seccion = Seccion::findOrFail($id);

        $this->nombre = $this->seccion->nombre;
        $this->activo = $this->seccion->activo;

        $contenido = $this->seccion->contenido ?? [];

        $this->titulo = $contenido['titulo'];
        $this->subtitulo = $contenido['subtitulo'];
        $this->content_html = $contenido['content_html'];
    }

    public function store()
    {
        $this->validate();

        $this->seccion->update([
            'nombre' => $this->nombre,
            'contenido' => [
                'titulo' => $this->titulo,
                'subtitulo' => $this->subtitulo,
                'content_html' => $this->content_html,
            ],
            'activo' => $this->activo,
        ]);

        //$this->reset(['nombre', 'titulo', 'subtitulo', 'activo']);

        $this->dispatch('alertaLivewire', "Actualizado");
    }

    #[On('eliminarSeccion9On')]
    public function eliminarSeccion9On()
    {
        if ($this->seccion) {
            $this->seccion->delete();

            return redirect()->route('admin.seccion.bloque-nueve.vista.todo');
        }
    }

    public function render()
    {
        return view('livewire.admin.seccion.seccion-bloque-nueve-editar-livewire');
    }
}
