<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Label;

class LabelsTest extends TestCase
{
    private $label;
    private $user;
    private $data;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->label = Label::factory()->create();
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
}
