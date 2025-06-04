<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('producto');
        Storage::makeDirectory('producto');
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Carlos',
            'last_name' => 'Flores Flores',
            'document_type' => '1',
            'document_number' => '12345678',
            'phone' => '987654321',
            'email' => 'carlos.ffptg@gmail.com',
            'password' => bcrypt('Pl4tan0123')
        ]);

        $this->call([
            CategoriasSeeders::class,

        ]);

        Producto::factory(40)->create();
    }
}
