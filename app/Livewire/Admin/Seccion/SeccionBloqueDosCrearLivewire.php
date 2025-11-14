<?php

namespace App\Livewire\Admin\Seccion;

use App\Models\Seccion;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.admin.layout-admin')]
class SeccionBloqueDosCrearLivewire extends Component
{
    public $nombre;

    public $titulo;
    public $titulo_descripcion;

    public $imagen;
    public $imagen_seo;

    public $subtitulo;
    public $subtitulo_descripcion;

    public $lista = [];

    public $boton = [
        'icono' => '',
        'fondo_color' => '#000000',
        'texto' => '',
        'texto_color' => '#000000',
        'link' => '',
    ];

    public $invertir = false;

    public $activo = false;

    protected function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'titulo' => 'nullable|string|max:255',
            'titulo_descripcion' => 'nullable|string',
            'imagen' => 'required|string',
            'imagen_seo' => 'required|string',
            'subtitulo' => 'nullable|string|max:255',
            'subtitulo_descripcion' => 'nullable|string',
            'lista.*.id' => 'required|integer',
            'lista.*.texto' => 'required|string',
            'boton.icono' => 'nullable|string',
            'boton.fondo_color' => 'nullable|string',
            'boton.texto' => 'nullable|string',
            'boton.texto_color' => 'nullable|string',
            'boton.link' => 'nullable|url',
            'invertir' => 'boolean',
            'activo' => 'boolean',
        ];
    }

    protected $validationAttributes = [
        'nombre' => 'nombre',
        'imagen' => 'imagen',
        'imagen_seo' => 'seo imagen',
        'lista.*.id' => 'id',
        'lista.*.texto' => 'texto',
        'boton.link' => 'link',
    ];

    protected $messages = [
        'nombre.required' => 'El :attribute es obligatorio.',
        'imagen.required' => 'El :attribute es obligatorio.',
        'imagen_seo.required' => 'El :attribute es obligatorio.',
        'lista.*.id.required' => 'El :attribute del item es obligatorio.',
        'lista.*.texto.required' => 'El :attribute es obligatorio.',
        'boton.link.url' => 'El :attribute debe ser válido.',
    ];

    public function agregarItem()
    {
        $maxId = collect($this->lista)->max('id');
        $nextId = $maxId ? $maxId + 1 : 1;

        $this->lista[] = [
            'id' => $nextId,
            'icono' => '',
            'icono_color' => '#000000',
            'texto' => '',
            'texto_color' => '#000000',
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
            'tipo' => 'bloque-2',
            'contenido' => [
                'invertir' => $this->invertir,
                'titulo' => $this->titulo,
                'titulo_descripcion' => $this->titulo_descripcion,
                'imagen' => $this->imagen,
                'imagen_seo' => $this->imagen_seo,
                'subtitulo' => $this->subtitulo,
                'subtitulo_descripcion' => $this->subtitulo_descripcion,
                'lista' => $this->lista,
                'boton' => $this->boton,
            ],
            'activo' => $this->activo,
        ]);

        //$this->reset(['nombre', 'titulo', 'titulo_descripcion', 'imagen', 'imagen_seo', 'subtitulo', 'subtitulo_descripcion', 'lista', 'boton', 'invertir', 'activo']);

        $this->dispatch('alertaLivewire', 'Creado');

        return redirect()->route('admin.seccion.bloque-dos.vista.todo');
    }

    #[On('handleBloque2CrearOn')]
    public function handleBloque2CrearOn($item, $position)
    {
        $index = array_search($item, array_column($this->lista, 'id'));

        if ($index !== false) {
            $element = array_splice($this->lista, $index, 1)[0];
            array_splice($this->lista, $position, 0, [$element]);
        }
    }

    public function render()
    {
        return view('livewire.admin.seccion.seccion-bloque-dos-crear-livewire');
    }
}
