<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\On;

#[Layout('layouts.admin.layout-admin')]
class UserEditarLivewire extends Component
{
    public $user;

    public $name;
    public $email;
    public $password;
    public $role = 'cliente';

    public $activo = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'required|min:6',
            'role' => 'required|in:admin,cliente',
        ];
    }

    public function mount($id)
    {
        $this->user = User::findOrFail($id);

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->password = $this->user->password;
        $this->role = $this->user->role;
        $this->activo = $this->user->activo;

    }

    public function store()
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
            'activo' => $this->activo,
        ]);

        $this->dispatch('alertaLivewire', 'Actualizado');
    }

    #[On('eliminarUserOn')]
    public function eliminarUserOn()
    {
        if ($this->user) {
            $this->user->delete();

            return redirect()->route('admin.usuario.vista.todo');
        }
    }

    public function render()
    {
        return view('livewire.admin.user.user-editar-livewire');
    }
}
