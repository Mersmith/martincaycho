<?php

namespace App\Livewire\Admin\TipoFormulario;

use App\Models\TipoFormulario;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\On;

#[Layout('layouts.admin.layout-admin')]
class TipoFormularioEditarLivewire extends Component
{
    public $formulario;

    public $nombre;

    public $activo = false;

    protected function rules()
    {
        return [
            'nombre' => 'required|string|max:255|unique:tipo_formularios,nombre,' . $this->formulario->id,
            'activo' => 'required|boolean',
        ];
    }

    public function mount($id)
    {
        $this->formulario = TipoFormulario::findOrFail($id);

        $this->nombre = $this->formulario->nombre;
        $this->activo = $this->formulario->activo;
    }

    public function store()
    {
        $this->validate();

        $this->formulario->update([
            'nombre' => $this->nombre,
            'activo' => $this->activo,
        ]);

        //$this->reset(['nombre', 'lista', 'activo']);

        $this->dispatch('alertaLivewire', "Actualizado");
    }

    #[On('eliminarTipoFormularioOn')]
    public function eliminarTipoFormularioOn()
    {
        if ($this->formulario) {
            $this->formulario->delete();

            return redirect()->route('admin.tipo-formulario.vista.todo');
        }
    }

    public function render()
    {
        return view('livewire.admin.tipo-formulario.tipo-formulario-editar-livewire');
    }
}
