<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_dto()
    {
        $user = new \App\Models\User();
        $user->name = 'John Doe';
        $user->email = 'john@example.com';
        $user->password = bcrypt('password');

        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
        $this->assertNotNull($user->password);
    }
}
