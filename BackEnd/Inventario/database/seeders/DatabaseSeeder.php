<?php

namespace Database\Seeders;

use App\Models\Categorias;
use App\Models\Productos;
use App\Models\Productos_Categorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Categorias::truncate();
            Productos::truncate();
            Productos_Categorias::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Categorias::factory()
        ->count(200)
        ->create();

        Productos::factory()
        ->count(200)
        ->create();

        Productos_Categorias::factory()
        ->count(4000)
        ->create();
    }
}
