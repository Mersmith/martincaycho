<?php

namespace App\Livewire\Admin\Seccion;

use App\Models\Seccion;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\On;

#[Layout('layouts.admin.layout-admin')]
class SeccionBloqueCuatroEditarLivewire extends Component
{
    public $seccion;

    public $nombre;

    public $titulo;
    public $titulo_descripcion;

    public $subtitulo;
    public $subtitulo_descripcion;

    public $imagen;
    public $imagen_seo;

    public $imagen_fondo;
    public $imagen_fondo_seo;

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
            'titulo_descripcion' => 'nullable|string|max:255',
            'subtitulo' => 'nullable|string',
            'subtitulo_descripcion' => 'nullable|string',
            'imagen' => 'nullable|string',
            'imagen_seo' => 'nullable|required_with:imagen|string',
            'imagen_fondo' => 'nullable|string',
            'imagen_fondo_seo' => 'nullable|required_with:imagen_fondo|string',
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
        'imagen_fondo' => 'imagen fondo',
        'imagen_fondo_seo' => 'seo imagen fondo',
        'boton.link' => 'link',
    ];

    protected $messages = [
        'nombre.required' => 'El :attribute es obligatorio.',
        'boton.link.url' => 'El :attribute debe ser válido.',
        'imagen_seo.required_with' => 'El :attribute es obligatorio.',
        'imagen_fondo_seo.required_with' => 'El :attribute es obligatorio.',
    ];

    public function mount($id)
    {
        $this->seccion = Seccion::findOrFail($id);

        $this->nombre = $this->seccion->nombre;
        $this->activo = $this->seccion->activo;

        $contenido = $this->seccion->contenido ?? [];

        $this->titulo = $contenido['titulo'];
        $this->titulo_descripcion = $contenido['titulo_descripcion'];
        $this->subtitulo = $contenido['subtitulo'];
        $this->subtitulo_descripcion = $contenido['subtitulo_descripcion'];
        $this->imagen = $contenido['imagen'];
        $this->imagen_seo = $contenido['imagen_seo'];
        $this->imagen_fondo = $contenido['imagen_fondo'];
        $this->imagen_fondo_seo = $contenido['imagen_fondo_seo'];

        $this->boton = [
            'icono' => $contenido['boton']['icono'] ?? '',
            'fondo_color' => $contenido['boton']['fondo_color'] ?? '#000000',
            'texto' => $contenido['boton']['texto'] ?? '',
            'texto_color' => $contenido['boton']['texto_color'] ?? '#000000',
            'link' => $contenido['boton']['link'] ?? '',
        ];
    }

    public function store()
    {
        $this->validate();

        $this->seccion->update([
            'nombre' => $this->nombre,
            'contenido' => [
                'titulo' => $this->titulo,
                'titulo_descripcion' => $this->titulo_descripcion,
                'subtitulo' => $this->subtitulo,
                'subtitulo_descripcion' => $this->subtitulo_descripcion,
                'imagen' => $this->imagen,
                'imagen_seo' => $this->imagen_seo,
                'imagen_fondo' => $this->imagen_fondo,
                'imagen_fondo_seo' => $this->imagen_fondo_seo,
                'boton' => $this->boton,
            ],
            'activo' => $this->activo,
        ]);

        //$this->reset(['nombre', 'titulo', 'subtitulo', 'imagen', 'imagen_seo', 'boton', 'activo']);

        $this->dispatch('alertaLivewire', "Actualizado");
    }

    #[On('eliminarSeccion4On')]
    public function eliminarSeccion4On()
    {
        if ($this->seccion) {
            $this->seccion->delete();

            return redirect()->route('admin.seccion.bloque-cuatro.vista.todo');
        }
    }

    public function render()
    {
        return view('livewire.admin.seccion.seccion-bloque-cuatro-editar-livewire');
    }
}
