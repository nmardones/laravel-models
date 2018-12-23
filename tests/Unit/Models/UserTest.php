<?php

namespace Tests\Unit\Models;

use App\Models\Status;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function an_user_has_many_statuses()
    {
        $user = factory(User::class)->create();
        factory(Status::class)->create(['user_id' => $user->id]);
        $this->assertInstanceOf(Status::class,$user->statuses->first());
    }
}
