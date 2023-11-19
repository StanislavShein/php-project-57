<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\TaskStatus;
use App\Models\User;

class TaskStatusesTest extends TestCase
{
    private User $user;
    private TaskStatus $taskStatus;
    private array $data;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->data = TaskStatus::factory()->make()->only(['name']);
        $this->taskStatus = TaskStatus::factory()->create();
    }

    public function testIndex(): void
    {
        $response = $this->get(route('task_statuses.index'));

        $response->assertOk();
    }

    public function testForbiddenCreateByUnknown(): void
    {
        $response = $this->get(route('task_statuses.create'));

        $response->assertForbidden();
    }

    public function testAllowedCreateByUser(): void
    {
        $response = $this->actingAs($this->user)->get(route('task_statuses.create'));

        $response->assertOk();
    }

    public function testAllowedStoreByUser(): void
    {
        $response = $this->actingAs($this->user)->post(route('task_statuses.store'), $this->data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('task_statuses.index'));

        $this->assertDatabaseHas('task_statuses', $this->data);
    }

    public function testForbiddenEditByUnknown(): void
    {
        $response = $this->get(route('task_statuses.edit', $this->taskStatus));

        $response->assertForbidden();
    }

    public function testAllowedEditByUser(): void
    {
        $response = $this->actingAs($this->user)->get(route('task_statuses.edit', $this->taskStatus));

        $response->assertSessionHasNoErrors();
        $response->assertOk();
    }

    public function testAllowedUpdateByUser(): void
    {
        $response = $this->actingAs($this->user)
            ->put(route('task_statuses.update', $this->taskStatus), $this->data);

        $this->assertDatabaseHas('task_statuses', $this->data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('task_statuses.index'));
    }

    public function testForbiddenDestroyByUnknown(): void
    {
        $response = $this->delete(route('task_statuses.destroy', $this->taskStatus));

        $response->assertForbidden();
    }

    public function testAllowedDestroyByUser(): void
    {
        $response = $this->actingAs($this->user)->delete(route('task_statuses.destroy', $this->taskStatus));

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('task_statuses.index'));
        $response->assertStatus(302);

        $this->assertDatabaseMissing('task_statuses', ['id' => $this->taskStatus->id]);
    }
}
