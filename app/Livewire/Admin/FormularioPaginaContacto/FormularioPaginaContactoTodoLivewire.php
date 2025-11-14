<?php

namespace App\Livewire\Admin\FormularioPaginaContacto;

use App\Models\FormularioPaginaContacto;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin.layout-admin')]
class FormularioPaginaContactoTodoLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $formularios = FormularioPaginaContacto::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.formulario-pagina-contacto.formulario-pagina-contacto-todo-livewire', [
            'formularios' => $formularios,
        ]);
    }
}
