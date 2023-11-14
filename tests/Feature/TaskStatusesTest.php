<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\TaskStatus;
use App\Models\User;

class TaskStatusesTest extends TestCase
{
    private User $user;
    private TaskStatus $taskStatus;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
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

    public function testForbiddenDestroyByUnknown(): void
    {
        $response = $this->delete(route('task_statuses.destroy', $this->taskStatus));

        $response->assertForbidden();
    }

    public function testAllowedDestroyByUser(): void
    {
        $response = $this->actingAs($this->user)->delete(route('task_statuses.destroy', $this->taskStatus));

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);

        $this->assertDatabaseMissing('task_statuses', ['id' => $this->taskStatus->id]);
    }
}
