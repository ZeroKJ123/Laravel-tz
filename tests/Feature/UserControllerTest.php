<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;

class UserControllerTest extends TestCase
{
    public function test_can_assign_task_to_user()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();

        $response = $this->post('/api/users/' . $user->id . '/assign-task', ['task_id' => $task->id]);
        $response->assertStatus(204);
    }

    public function test_can_get_all_users()
    {
        $response = $this->get('/api/users');
        $response->assertStatus(200);
    }

    public function test_can_create_user()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ];

        $response = $this->post('/api/users', $userData);
        $response->assertStatus(201);
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }
}
