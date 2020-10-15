<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        Post::factory()->create([
            'title' => 'Primer post',
             'category_id' => 1,
             'published_at' => Carbon::now()->subDays(4)
        ]);

        Post::factory()->create([
            'title' => 'Segundo post',
             'category_id' => 1,
             'published_at' => Carbon::now()->subDays(3)
        ]);

        Post::factory()->create([
            'title' => 'Tercer post',
             'category_id' => 2,
             'published_at' => Carbon::now()->subDays(2)
        ]);

        Post::factory()->create([
            'title' => 'Cuarto post',
             'category_id' => 2,
             'published_at' => Carbon::now()->subDays(1)
        ]);

    }
}
