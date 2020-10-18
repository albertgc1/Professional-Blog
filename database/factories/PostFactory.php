<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $title = $this->faker->sentence,
            'url' => Str::slug($title),
            'excerpt' => $this->faker->paragraph,
            'body' => $this->faker->paragraph(4),
            'published_at' => now(),
            'category_id' => Category::factory()->create()
        ];
    }
}
