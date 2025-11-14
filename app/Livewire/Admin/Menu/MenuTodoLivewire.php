<?php

namespace App\Livewire\Admin\Menu;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Menu;

#[Layout('layouts.admin.layout-admin')]
class MenuTodoLivewire extends Component
{
    public function render()
    {
        $menus = Menu::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.menu.menu-todo-livewire', [
            'menus' => $menus,
        ]);
    }
}
