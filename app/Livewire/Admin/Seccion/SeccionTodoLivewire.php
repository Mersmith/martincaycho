<?php

namespace App\Livewire\Admin\Seccion;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Seccion;
use Livewire\WithPagination;

#[Layout('layouts.admin.layout-admin')]
class SeccionTodoLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $secciones = Seccion::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.seccion.seccion-todo-livewire', [
            'secciones' => $secciones,
        ]);
    }
}
