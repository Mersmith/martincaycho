<?php

namespace App\Livewire\Admin\FormularioLanding;

use App\Models\FormularioLanding;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin.layout-admin')]
class FormularioLandingTodoLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $formularios = FormularioLanding::orderBy('created_at', 'desc')
        ->paginate(20);

        return view('livewire.admin.formulario-landing.formulario-landing-todo-livewire', [
            'formularios' => $formularios,
        ]);
    }
}
