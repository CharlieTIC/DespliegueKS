<?php

namespace Database\Seeders;
use App\Models\Categoria;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
    [
        'nombre' => 'SOBREMESA',
        'subcategorias' => [
            ['nombre' => 'Oficina'],
            ['nombre' => 'Estudios'],
            ['nombre' => 'Gaming'],
        ],
    ],
    [
        'nombre' => 'PORTÁTILES',
        'subcategorias' => [
            ['nombre' => 'Estudios'],
            ['nombre' => 'Oficina'],
            ['nombre' => 'Gaming'],
        ],
    ],
    [
        'nombre' => 'PERIFÉRICOS',
        'subcategorias' => [
            ['nombre' => 'Teclados'],
            ['nombre' => 'Ratón'],
            ['nombre' => 'Auriculares'],
            ['nombre' => 'Monitores'],
            ['nombre' => 'Cargadores FA'],
        ],
    ],
];

foreach ($categorias as $categoriaData) {
    $categoria = Categoria::create(['nombre' => $categoriaData['nombre']]);

    foreach ($categoriaData['subcategorias'] as $subcategoriaData) {
        $categoria->subcategorias()->create($subcategoriaData);
    }
}
    }
}
