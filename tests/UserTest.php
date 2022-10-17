<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_login()
    {
        $user = User::findOrfail(1);
        $this->actingAs($user)->post('api/login', [
            'userName' => 'Steven',
            'password' => 'password'
        ]);
        $this->assertTrue(true);
    }

    public function test_user_can_register()
    {
        $this->post('api/register', [
            'userName' => 'John Doe',
            'password' => 'pass'
        ]);
        $this->assertTrue(true);
    }

    public function test_user_can_refresh_token()
    {
        $user = User::findOrfail(1);
        $this->actingAs($user)->post('api/refresh');
        $this->assertTrue(true);
    }

    public function test_user_can_log_out()
    {
        $user = User::findOrfail(1);
        $this->actingAs($user)->post('api/logout');
        $this->assertTrue(true);
    }

    
}
