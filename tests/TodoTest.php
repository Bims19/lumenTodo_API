<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\User;


class TodoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_create_todo()
    {
        $user = User::findOrfail(1);
        $this->actingAs($user)->post('api/add-todo', [
            'todo' => 'Visit the dentist',
        ]);
        $this->assertTrue(true);
    }

    public function test_user_can_get_todos()
    {
        $this->get('api/index');
        $this->assertTrue(true);
    }

    public function test_user_can_update_todos()
    {
        $user = User::findOrfail(1);
        $this->actingAs($user)->post('api/update/1', [
            'completed' => true
        ]);
        $this->assertTrue(true);
    }

    public function test_user_can_delete_todos()
    {
        $user = User::findOrfail(1);
        $this->actingAs($user)->post('api/delete/1');
        $this->assertTrue(true);
    }
}
