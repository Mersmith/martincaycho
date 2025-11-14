<?php

namespace App\Livewire\Admin\Comunicado;

use App\Models\Comunicado;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin.layout-admin')]
class ComunicadoTodoLivewire extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage = 20;

    public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Comunicado::where('titulo', 'like', '%' . $this->buscar . '%')
        ->orderBy('created_at', 'desc')
        ->paginate($this->perPage);

        return view('livewire.admin.comunicado.comunicado-todo-livewire', compact('posts'));
    }
}
