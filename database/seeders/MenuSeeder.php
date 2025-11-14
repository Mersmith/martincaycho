<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inicio = Menu::create([
            'nombre' => 'INICIO',
            'slug' => 'inicio',
            'url' => '/',
            'orden' => 1,
        ]);

        $nosotros = Menu::create([
            'nombre' => 'CONÓCEME',
            'slug' => 'martin-caycho',
            'url' => '/martin-caycho',
            'orden' => 2,
        ]);       

        $publicaciones = Menu::create([
            'nombre' => 'BLOG',
            'slug' => 'blog',
            'url' => '/blog',
            'orden' => 3,
        ]);
    }
}
