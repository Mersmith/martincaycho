<?php

namespace App\Livewire\Admin\Seccion;

use App\Models\Seccion;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin.layout-admin')]
class SeccionBloqueCincoTodoLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $secciones = Seccion::where('tipo', 'bloque-5')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.seccion.seccion-bloque-cinco-todo-livewire', [
            'secciones' => $secciones,
        ]);
    }
}
