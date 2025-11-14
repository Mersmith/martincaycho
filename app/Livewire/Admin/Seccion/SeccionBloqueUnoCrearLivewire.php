<?php

namespace App\Livewire\Admin\Seccion;

use App\Models\Seccion;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.admin.layout-admin')]
class SeccionBloqueUnoCrearLivewire extends Component
{
    public $nombre;
    public $lista = [];
    public $activo = false;

    protected function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'lista.*.id' => 'required|integer',
            'lista.*.imagen_computadora' => 'required|string',
            'lista.*.imagen_movil' => 'required|string',
            'lista.*.link' => 'nullable|url',
            'activo' => 'boolean',
        ];
    }

    protected $validationAttributes = [
        'nombre' => 'nombre',
        'lista.*.id' => 'id',
        'lista.*.imagen_computadora' => 'imagen computadora',
        'lista.*.imagen_movil' => 'imagen móvil',
        'lista.*.link' => 'link',
    ];

    protected $messages = [
        'nombre.required' => 'El :attribute es requerido.',
        'lista.*.id.required' => 'El :attribute es requerido.',
        'lista.*.imagen_computadora.required' => 'El :attribute es requerido.',
        'lista.*.imagen_movil.required' => 'El :attribute es requerido.',
        'lista.*.link.url' => 'El :attribute debe ser válido.',
    ];

    public function agregarItem()
    {
        $maxId = collect($this->lista)->max('id');
        $nextId = $maxId ? $maxId + 1 : 1;

        $this->lista[] = [
            'id' => $nextId,
            'imagen_computadora' => '',
            'imagen_movil' => '',
            'link' => '',
        ];
    }

    public function eliminarItem($index)
    {
        array_splice($this->lista, $index, 1);
    }

    public function store()
    {
        $this->validate();

        Seccion::create([
            'nombre' => $this->nombre,
            'tipo' => 'bloque-1',
            'contenido' => [
                'lista' => $this->lista,
            ],
            'activo' => $this->activo,
        ]);

        //$this->reset(['nombre', 'lista', 'activo']);

        $this->dispatch('alertaLivewire', 'Creado');

        return redirect()->route('admin.seccion.bloque-uno.vista.todo');
    }

    #[On('handleBloque1CrearOn')]
    public function handleBloque1CrearOn($item, $position)
    {
        $index = array_search($item, array_column($this->lista, 'id'));

        if ($index !== false) {
            $element = array_splice($this->lista, $index, 1)[0];
            array_splice($this->lista, $position, 0, [$element]);
        }
    }

    public function render()
    {
        return view('livewire.admin.seccion.seccion-bloque-uno-crear-livewire');
    }
}
