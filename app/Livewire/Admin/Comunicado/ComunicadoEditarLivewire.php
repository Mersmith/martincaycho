<?php

namespace App\Livewire\Admin\Comunicado;

use App\Models\Comunicado;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.admin.layout-admin')]
class ComunicadoEditarLivewire extends Component
{
    public $comunicado;

    public $titulo;
    public $slug;
    public $imagen;
    public $contenido;
    public $meta_title;
    public $meta_description;
    public $meta_image;
    public $activo = false;

    public $lista = [];

    protected function rules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'slug' => 'required|unique:comunicados,slug,' . $this->comunicado->id,
            'imagen' => 'required|string|max:255',
            'contenido' => 'required|string',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_image' => 'required|string|max:255',
            'activo' => 'required|boolean',
            'lista.*.id' => 'required|integer',
            'lista.*.texto' => 'required|string',
            'lista.*.link' => 'required|string',
        ];
    }

    public function mount($id)
    {
        $this->comunicado = Comunicado::findOrFail($id);

        $this->titulo = $this->comunicado->titulo;
        $this->slug = $this->comunicado->slug;
        $this->imagen = $this->comunicado->imagen;
        $this->contenido = $this->comunicado->contenido;
        $this->meta_title = $this->comunicado->meta_title;
        $this->meta_description = $this->comunicado->meta_description;
        $this->meta_image = $this->comunicado->meta_image;
        $this->activo = $this->comunicado->activo;

        $documento = $this->comunicado->documento ?? [];

        if (isset($documento['lista']) && is_array($documento['lista'])) {
            $this->lista = $documento['lista'];
        } else {
            $this->lista = [
                [
                    'id' => 1,
                    'texto' => '',
                    'texto_color' => '#000000',
                    'link' => '',
                    'boton_color' => '#000000',
                ],
            ];
        }
    }

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
            'texto' => '',
            'texto_color' => '#000000',
            'link' => '',
            'boton_color' => '#000000',
        ];
    }

    public function eliminarItem($index)
    {
        array_splice($this->lista, $index, 1);
    }

    public function store()
    {
        $this->validate();

        $this->comunicado->update([
            'titulo' => $this->titulo,
            'slug' => $this->slug,
            'contenido' => $this->contenido,
            'imagen' => $this->imagen,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_image' => $this->meta_image,
            'activo' => $this->activo,
            'documento' => [
                'lista' => $this->lista,
            ],
        ]);

        $this->dispatch('alertaLivewire', "Actualizado");
    }

    #[On('handleComunicadoEditarOn')]
    public function handleComunicadoEditarOn($item, $position)
    {
        $index = array_search($item, array_column($this->lista, 'id'));

        if ($index !== false) {
            $element = array_splice($this->lista, $index, 1)[0];
            array_splice($this->lista, $position, 0, [$element]);
        }
    }

    #[On('eliminarComunicadoOn')]
    public function eliminarComunicadoOn()
    {
        if ($this->comunicado) {
            $this->comunicado->delete();

            return redirect()->route('admin.comunicado.vista.todo');
        }
    }

    public function render()
    {
        return view('livewire.admin.comunicado.comunicado-editar-livewire');
    }
}
