<?php

namespace Tests\Feature\Posts;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListPostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_fetch_all_posts()
    {
        $this->withExceptionHandling();

        $project = Post::factory()->create();

        $this->getJson(route('posts.index'))
            ->assertStatus(200)
            ->assertViewIs('posts.index')
            ->assertViewHas('posts')
            ->assertSee($project->title);
    }

    
}
