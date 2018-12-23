<?php

namespace Tests\Unit\Models;

use App\Models\Post;
use App\Models\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function an_post_belong_to_cateory()
    {
        $post = factory(Post::class)->create();
        $this->assertInstanceOf(Category::class,$post->category);
    }

}
