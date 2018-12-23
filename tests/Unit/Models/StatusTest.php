<?php

namespace Tests\Unit\Models;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Status;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function an_status_belongs_to_user()
    {
        $status = factory(Status::class)->create();
        $this->assertInstanceOf(User::class,$status->user);
    }
    /**
     * @test
     */
    public function an_status_has_many_comments()
    {
        $status = factory(Status::class)->create();
        factory(Comment::class)->create(['status_id'=> $status->id]);
        $this->assertInstanceOf(Comment::class,$status->comments->first());
    }

    /**
     * @test
     */
    public function a_status_morph_many_likes()
    {
        $status = factory(Status::class)->create();

        factory(Like::class)->create([
            'likeable_id' => $status->id,
            'likeable_type' => get_class($status)
        ]);
        $this->assertInstanceOf(Like::class, $status->likes->first());
    }
}
