<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Label;
use App\Models\Task;

class LabelsTest extends TestCase
{
    private Label $label;
    private Label $associatedWithTaskLabel;
    private User $user;
    private Task $task;
    private array $data;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->label = Label::factory()->create();
        $this->associatedWithTaskLabel = Label::factory()->create();
        $this->task = Task::factory()->create();
        $this->associatedWithTaskLabel->task()->attach($this->task);
        $this->data = Label::factory()->make()->only(['name', 'description']);
    }

    public function testIndex(): void
    {
        $response = $this->get(route('labels.index'));

        $response->assertOk();
    }

    public function testForbiddenCreateByUnknown(): void
    {
        $response = $this->get(route('labels.create'));

        $response->assertForbidden();
    }

    public function testAllowedCreateByUser(): void
    {
        $response = $this->actingAs($this->user)->get(route('labels.create'));

        $response->assertOk();
    }

    public function testForbiddenStoreByUnknown(): void
    {
        $response = $this->post(route('labels.store'), $this->data);

        $response->assertForbidden();

        $this->assertDatabaseMissing('labels', $this->data);
    }

    public function testAllowedStoreByUser(): void
    {
        $response = $this->actingAs($this->user)->post(route('labels.store'), $this->data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('labels.index'));

        $this->assertDatabaseHas('labels', $this->data);
    }

    public function testForbiddenEditByUnknown(): void
    {
        $response = $this->get(route('labels.edit', $this->label));

        $response->assertForbidden();
    }

    public function testAllowedEditByUser(): void
    {
        $response = $this->actingAs($this->user)->get(route('labels.edit', $this->label));

        $response->assertSessionHasNoErrors();
        $response->assertOk();
    }

    public function testForbiddenDestroyByUnknown(): void
    {
        $response = $this->delete(route('labels.destroy', $this->label));

        $response->assertForbidden();
    }

    public function testAllowedDestroyByUser(): void
    {
        $response = $this->actingAs($this->user)->delete(route('labels.destroy', $this->label));

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);

        $this->assertDatabaseMissing('labels', ['id' => $this->label->id]);
    }

    public function testForbiddenDestroyLabelWithAssociatedTask(): void
    {
        $response = $this->actingAs($this->user)->delete(route('labels.destroy', $this->associatedWithTaskLabel));

        $this->assertDatabaseHas('labels', ['id' => $this->associatedWithTaskLabel->id]);
    }
}
