<?php

namespace App\Livewire\Admin\Blog;

use App\Models\Blog;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.admin.layout-admin')]
class BlogEditarLivewire extends Component
{
    public $blog;

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
            'slug' => 'required|unique:blogs,slug,' . $this->blog->id,
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
        $this->blog = Blog::findOrFail($id);

        $this->titulo = $this->blog->titulo;
        $this->slug = $this->blog->slug;
        $this->imagen = $this->blog->imagen;
        $this->contenido = $this->blog->contenido;
        $this->meta_title = $this->blog->meta_title;
        $this->meta_description = $this->blog->meta_description;
        $this->meta_image = $this->blog->meta_image;
        $this->activo = $this->blog->activo;

        $documento = $this->blog->documento ?? [];

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

        $this->blog->update([
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

    #[On('handleBlogEditarOn')]
    public function handleBlogEditarOn($item, $position)
    {
        $index = array_search($item, array_column($this->lista, 'id'));

        if ($index !== false) {
            $element = array_splice($this->lista, $index, 1)[0];
            array_splice($this->lista, $position, 0, [$element]);
        }
    }

    #[On('eliminarBlogOn')]
    public function eliminarBlogOn()
    {
        if ($this->blog) {
            $this->blog->delete();

            return redirect()->route('admin.blog.vista.todo');
        }
    }

    public function render()
    {
        return view('livewire.admin.blog.blog-editar-livewire');
    }
}
