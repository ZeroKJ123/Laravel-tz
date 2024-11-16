<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

class TaskControllerTest extends TestCase
{
    public function test_can_get_all_tasks()
    {
        $response = $this->get('/api/tasks');
        $response->assertStatus(200);
    }

    public function test_can_create_task()
    {
        $task = [
            'title' => 'New Task',
            'description' => 'Task description',
            'status' => 'pending',
        ];

        $response = $this->post('/api/tasks', $task);
        $response->assertStatus(201);
    }

    public function test_can_get_task()
    {
        $task = Task::factory()->create();
        $response = $this->get('/api/tasks/' . $task->id);
        $response->assertStatus(200);
    }

    public function test_can_update_task()
    {
        $task = Task::factory()->create();
        $updatedTask = [
            'title' => 'Updated Task',
            'description' => 'Updated description',
            'status' => 'in_progress',
        ];

        $response = $this->put('/api/tasks/' . $task->id, $updatedTask);
        $response->assertStatus(200);
    }

    public function test_can_delete_task()
    {
        $task = Task::factory()->create();
        $response = $this->delete('/api/tasks/' . $task->id);
        $response->assertStatus(204);
    }
}
