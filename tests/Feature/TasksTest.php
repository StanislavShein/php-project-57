<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskStatus;

class TasksTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    private $taskStatus;
    private $task;


    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->taskStatus = TaskStatus::factory()->create();
        $this->task = Task::factory()->create();
    }

    public function testIndex(): void
    {
        $response = $this->get(route('tasks.index'));

        $response->assertOk();
    }

    public function testCreateByUnknown(): void
    {
        $response = $this->get(route('tasks.create'));

        $response->assertForbidden();
    }

    public function testCreateByUser(): void
    {
        $response = $this->actingAs($this->user)->get(route('tasks.create'));

        $response->assertOk();
    }

    public function testEditByUnknown(): void
    {
        $response = $this->get(route('tasks.edit', $this->task));

        $response->assertForbidden();
    }

    public function testEditByUser(): void
    {
        $response = $this->actingAs($this->user)->get(route('tasks.edit', $this->task));

        $response->assertOk();
    }

    public function testDestroyByUnknown(): void
    {
        $response = $this->delete(route('tasks.destroy', $this->task));

        $response->assertForbidden();
    }

    public function testDestroyByUser(): void
    {
        $response = $this->actingAs($this->user)->delete(route('tasks.destroy', $this->task));

        $response->assertStatus(302);

        $this->assertDatabaseMissing('tasks', ['id' => $this->task->id]);
    }
}
