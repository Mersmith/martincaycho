<?php

namespace App\Livewire\Admin\Pagina;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Pagina;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

#[Layout('layouts.admin.layout-admin')]
class PaginaCrearLivewire extends Component
{
    public $titulo;
    public $slug;
    public $meta_imagen;
    public $activo = 0;

    public $lista = [];

    protected function rules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'slug' => 'required|unique:paginas,slug',
            'meta_imagen' => 'nullable|string|max:255',
            'activo' => 'required|boolean',
            'lista.*.id' => 'required|integer',
        ];
    }

    protected $validationAttributes = [
        'titulo' => 'titulo',
        'slug' => 'url',
        'lista.*.id' => 'id',
    ];

    protected $messages = [
        'titulo.required' => 'El :attribute es requerido.',
        'slug.required' => 'El :attribute es requerido.',
        'lista.*.id.required' => 'El :attribute es requerido.',
    ];

    public function updatedTitulo($value)
    {
        $this->slug = Str::slug($value);
    }

    public function agregarItem()
    {
        $maxId = collect($this->lista)->max('id');
        $nextId = $maxId ? $maxId + 1 : 1;

        $this->lista[] = [
            'id' => $nextId,
            'seccion_id' => '',
            'tipo' => '',
        ];
    }

    public function eliminarItem($index)
    {
        array_splice($this->lista, $index, 1);
    }


    public function store()
    {
        $this->validate();

        Pagina::create([
            'titulo' => $this->titulo,
            'slug' => $this->slug,
            'meta_imagen' => $this->meta_imagen,
            'activo' => $this->activo,
            'contenido' => [
                'lista' => $this->lista,
            ],
        ]);

        $this->dispatch('alertaLivewire', "Creado");

        return redirect()->route('admin.pagina.vista.todo');
    }

    #[On('handlePaginaCrearOn')]
    public function handlePaginaCrearOn($item, $position)
    {
        $index = array_search($item, array_column($this->lista, 'id'));

        if ($index !== false) {
            $element = array_splice($this->lista, $index, 1)[0];
            array_splice($this->lista, $position, 0, [$element]);
        }
    }

    public function render()
    {
        return view('livewire.admin.pagina.pagina-crear-livewire');
    }
}
