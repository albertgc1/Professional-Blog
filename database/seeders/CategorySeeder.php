<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create(['name' => 'Categoria 1']);
        Category::factory()->create(['name' => 'Categoria 2']);

        //tags
        Tag::create(['name' => 'Etiqueta 1']);
        Tag::create(['name' => 'Etiqueta 2']);
        Tag::create(['name' => 'Etiqueta 3']);
        Tag::create(['name' => 'Etiqueta 4']);
    }
}
