<?php

namespace Tests\Unit\Models;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Status;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function an_comment_belongs_to_user()
    {
        $comment = factory(Comment::class)->create();
        $this->assertInstanceOf(User::class,$comment->user);
    }
    /**
     * @test
     */
    public function a_comment_morph_many_likes()
    {
        $comment = factory(Comment::class)->create();

        factory(Like::class)->create([
            'likeable_id' => $comment->id,
            'likeable_type' => get_class($comment)
        ]);
        $this->assertInstanceOf(Like::class, $comment->likes->first());
    }

}
