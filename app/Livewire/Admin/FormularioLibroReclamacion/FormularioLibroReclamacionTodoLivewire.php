<?php

namespace App\Livewire\Admin\FormularioLibroReclamacion;

use App\Models\FormularioLibroReclamacion;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin.layout-admin')]
class FormularioLibroReclamacionTodoLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $formularios = FormularioLibroReclamacion::orderBy('created_at', 'desc')
            ->paginate(20);

        return view('livewire.admin.formulario-libro-reclamacion.formulario-libro-reclamacion-todo-livewire', [
            'formularios' => $formularios,
        ]);
    }
}
