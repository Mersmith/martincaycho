<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin.layout-admin')]
class UserTodoLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::orderBy('created_at', 'desc')
            ->paginate(10);
        return view('livewire.admin.user.user-todo-livewire', [
            'users' => $users,
        ]);
    }
}
