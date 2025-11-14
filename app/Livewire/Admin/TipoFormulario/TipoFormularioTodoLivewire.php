<?php

namespace App\Livewire\Admin\TipoFormulario;

use App\Models\TipoFormulario;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin.layout-admin')]
class TipoFormularioTodoLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $formularios = TipoFormulario::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.tipo-formulario.tipo-formulario-todo-livewire', [
            'formularios' => $formularios,
        ]);
    }
}
