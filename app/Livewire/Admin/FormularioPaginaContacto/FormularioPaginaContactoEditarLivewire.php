<?php

namespace App\Livewire\Admin\FormularioPaginaContacto;

use App\Models\FormularioPaginaContacto;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.layout-admin')]
class FormularioPaginaContactoEditarLivewire extends Component
{
    public $formulario;
    public $leido;
    public $estado;
    public $estadosDisponibles = [];

    public function mount($id)
    {
        $this->formulario = FormularioPaginaContacto::findOrFail($id);

        if (!$this->formulario->leido) {
            $this->formulario->update(['leido' => true]);
        }

        $this->formulario = $this->formulario->fresh();
        $this->leido = $this->formulario->leido;
        $this->estado = $this->formulario->estado;

        $this->definirEstadosDisponibles();
    }

    public function definirEstadosDisponibles()
    {
        $mapa = [
            'nuevo' => ['revision', 'resuelto', 'cerrado'],
            'revision' => ['resuelto', 'cerrado'],
            'resuelto' => ['cerrado'],
            'cerrado' => [],
        ];

        $this->estadosDisponibles = $mapa[$this->formulario->estado] ?? [];
    }

    public function update()
    {
        $this->validate([
            'estado' => 'in:nuevo,revision,resuelto,cerrado',
        ]);

        if (!in_array($this->estado, $this->estadosDisponibles)) {
            $this->dispatch('alertaLivewire', "No puedes retroceder el estado");
            return;
        }

        $this->formulario->update(['estado' => $this->estado]);

        $this->formulario = $this->formulario->fresh();
        $this->definirEstadosDisponibles();

        $this->estado = $this->formulario->estado;

        $this->dispatch('alertaLivewire', "Actualizado");
    }

    public function render()
    {
        return view('livewire.admin.formulario-pagina-contacto.formulario-pagina-contacto-editar-livewire');
    }
}
