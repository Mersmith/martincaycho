<?php

namespace App\Livewire\Admin\FormularioLibroReclamacion;

use App\Models\FormularioLibroReclamacion;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.layout-admin')]
class FormularioLibroReclamacionEditarLivewire extends Component
{
    public $formulario;
    public $observaciones;
    public $leido;
    public $estado;
    public $estadosDisponibles = [];

    public function mount($id)
    {
        $this->formulario = FormularioLibroReclamacion::findOrFail($id);

        if (!$this->formulario->leido) {
            $this->formulario->update(['leido' => true]);
        }

        $this->formulario = $this->formulario->fresh();
        $this->leido = $this->formulario->leido;
        $this->estado = $this->formulario->estado;
        $this->observaciones = $this->formulario->observaciones;

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

    public function actualizarObservaciones()
    {
        // Si el formulario está cerrado, no se puede modificar
        if ($this->formulario->estado === 'cerrado') {
            // $this->dispatch('alertaLivewire', "❌ No se puede modificar un formulario cerrado.");
            return;
        }

        // Si ya tiene observaciones, no permitir volver a editarlas
        if (!empty($this->formulario->observaciones)) {
            // $this->dispatch('alertaLivewire', "⚠️ Las observaciones ya fueron registradas y no se pueden modificar.");
            return;
        }

        // Validar el campo
        $this->validate([
            'observaciones' => 'nullable|string',
        ]);

        // Si observaciones está vacía y el estado es cerrado, también prohibir
        if (empty($this->observaciones) && $this->formulario->estado === 'cerrado') {
            //$this->dispatch('alertaLivewire', "⚠️ No se puede modificar porque el formulario está cerrado y sin observaciones.");
            return;
        }

        // Actualizar observaciones y fecha de respuesta solo si hay texto nuevo
        $data = [
            'observaciones' => $this->observaciones,
            'fecha_respuesta' => now(),
        ];

        $this->formulario->update($data);
        $this->formulario = $this->formulario->fresh();

        $this->dispatch('alertaLivewire', "Actualizado");
    }

    public function actualizarEstado()
    {
        if ($this->formulario->estado === 'cerrado') {
            $this->dispatch('alertaLivewire', "Error");
            return;
        }

        $this->validate([
            'estado' => 'in:nuevo,revision,resuelto,cerrado',
        ]);

        $this->formulario->update(['estado' => $this->estado]);
        $this->formulario = $this->formulario->fresh();
        $this->definirEstadosDisponibles();

        $this->dispatch('alertaLivewire', "Actualizado");
    }

    public function render()
    {
        return view('livewire.admin.formulario-libro-reclamacion.formulario-libro-reclamacion-editar-livewire');
    }
}
