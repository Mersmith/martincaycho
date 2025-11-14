<?php

namespace App\Livewire\Admin\Seccion;

use App\Models\Seccion;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.admin.layout-admin')]
class SeccionBloqueOchoEditarLivewire extends Component
{
    public $seccion;

    public $nombre;

    public $titulo;
    public $titulo_descripcion;

    public $lista = [];

    public $activo = false;

    protected function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'titulo' => 'nullable|string|max:255',
            'titulo_descripcion' => 'nullable|string',
            'lista.*.id' => 'required|integer',
            'activo' => 'boolean',
        ];
    }

    protected $validationAttributes = [
        'nombre' => 'nombre',
        'lista.*.id' => 'id',
    ];

    protected $messages = [
        'nombre.required' => 'El :attribute es obligatorio.',
        'lista.*.id.    ' => 'El :attribute del item es obligatorio.',
    ];

    public function mount($id)
    {
        $this->seccion = Seccion::findOrFail($id);

        $this->nombre = $this->seccion->nombre;
        $this->activo = $this->seccion->activo;

        $contenido = $this->seccion->contenido ?? [];

        $this->titulo = $this->lista = $contenido['titulo'];
        $this->titulo_descripcion = $this->lista = $contenido['titulo_descripcion'];

        if (isset($contenido['lista']) && is_array($contenido['lista'])) {
            $this->lista = $contenido['lista'];
        } else {
            $this->lista = [
                [
                    'id' => 1,
                    'titulo' => '',
                    'subtitulo' => '',
                    'descripcion' => '',
                    'imagen' => '',
                    'imagen_seo' => '',
                ],
            ];
        }
    }

    public function agregarItem()
    {
        $maxId = collect($this->lista)->max('id');
        $nextId = $maxId ? $maxId + 1 : 1;

        $this->lista[] = [
            'id' => $nextId,
            'titulo' => '',
            'subtitulo' => '',
            'descripcion' => '',
            'imagen' => '',
            'imagen_seo' => '',
        ];

        $this->dispatch('lista-updated', count($this->lista));
    }

    public function eliminarItem($index)
    {
        array_splice($this->lista, $index, 1);

        $this->dispatch('lista-updated', count($this->lista));
    }

    public function store()
    {
        $this->validate();

        $this->seccion->update([
            'nombre' => $this->nombre,
            'contenido' => [
                'titulo' => $this->titulo,
                'titulo_descripcion' => $this->titulo_descripcion,
                'lista' => $this->lista,
            ],
            'activo' => $this->activo,
        ]);

        //$this->reset(['nombre', 'titulo', 'titulo_descripcion',  'lista', 'activo']);

        $this->dispatch('alertaLivewire', "Actualizado");
    }

    #[On('handleBloque8EditarOn')]
    public function handleBloque8EditarOn($item, $position)
    {
        $index = array_search($item, array_column($this->lista, 'id'));

        if ($index !== false) {
            $element = array_splice($this->lista, $index, 1)[0];
            array_splice($this->lista, $position, 0, [$element]);
        }
    }

    #[On('eliminarSeccion8On')]
    public function eliminarSeccion8On()
    {
        if ($this->seccion) {
            $this->seccion->delete();

            return redirect()->route('admin.seccion.bloque-ocho.vista.todo');
        }
    }

    public function render()
    {
        return view('livewire.admin.seccion.seccion-bloque-ocho-editar-livewire');
    }
}
