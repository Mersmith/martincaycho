<?php

namespace App\Livewire\Admin\TipoFormulario;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\TipoFormulario;

#[Layout('layouts.admin.layout-admin')]
class TipoFormularioCrearLivewire extends Component
{
    public $nombre;

    public $activo = false;

    protected function rules()
    {
        return [
            'nombre' => 'required|string|max:255|unique:tipo_formularios,nombre',
        ];
    }

    public function store()
    {
        $this->validate();

        TipoFormulario::create([
            'nombre' => $this->nombre,
            'activo' => $this->activo,
        ]);

        $this->dispatch('alertaLivewire', 'Creado');

        return redirect()->route('admin.tipo-formulario.vista.todo');
    }

    public function render()
    {
        return view('livewire.admin.tipo-formulario.tipo-formulario-crear-livewire');
    }
}
