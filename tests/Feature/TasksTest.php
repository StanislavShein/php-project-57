<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskStatus;

class TasksTest extends TestCase
{
    private User $user;
    private User $creator;
    private Task $task;
    private array $newTaskData;
    private array $updateTaskData;


    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->creator = User::factory()->create();
        TaskStatus::factory()->create();
        $this->task = Task::factory([
            'created_by_id' => $this->creator->id,
        ])->create();
        $this->newTaskData = Task::factory()->make()->only([
            'name',
            'description',
            'status_id',
            'assigned_to_id',
        ]);
        $this->updateTaskData = Task::factory()->make()->only([
            'name',
            'description',
            'status_id',
            'assigned_to_id',
        ]);
    }

    public function testIndex(): void
    {
        $response = $this->get(route('tasks.index'));

        $response->assertOk();
    }

    public function testForbiddenCreateByUnknown(): void
    {
        $response = $this->get(route('tasks.create'));

        $response->assertForbidden();
    }

    public function testAllowedCreateByUser(): void
    {
        $response = $this->actingAs($this->user)->get(route('tasks.create'));

        $response->assertOk();
    }

    public function testAllowedStoreByUser(): void
    {
        $response = $this->actingAs($this->user)->post(route('tasks.store'), $this->newTaskData);

        $this->assertDatabaseHas('tasks', $this->newTaskData);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('tasks.index'));
    }

    public function testShow(): void
    {
        $response = $this->get(route('tasks.show', $this->task));

        $response->assertOk();
    }

    public function testForbiddenEditByUnknown(): void
    {
        $response = $this->get(route('tasks.edit', $this->task));

        $response->assertForbidden();
    }

    public function testAllowedEditByUser(): void
    {
        $response = $this->actingAs($this->user)->get(route('tasks.edit', $this->task));

        $response->assertSessionHasNoErrors();
        $response->assertOk();
    }

    public function testAllowedUpdateByUser(): void
    {
        $response = $this->actingAs($this->user)
            ->patch(route('tasks.update', $this->task), $this->updateTaskData);

        $this->assertDatabaseHas('tasks', $this->updateTaskData);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('tasks.index'));
    }

    public function testForbiddenDestroyByUnknown(): void
    {
        $response = $this->delete(route('tasks.destroy', $this->task));

        $response->assertForbidden();
    }

    public function testForbiddenDestroyByUser(): void
    {
        $response = $this->actingAs($this->user)->delete(route('tasks.destroy', $this->task));

        $response->assertForbidden();
    }

    public function testAllowedDestroyByCreator(): void
    {
        $response = $this->actingAs($this->creator)->delete(route('tasks.destroy', $this->task));

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('tasks.index'));
        $response->assertStatus(302);

        $this->assertDatabaseMissing('tasks', ['id' => $this->task->id]);
    }
}
