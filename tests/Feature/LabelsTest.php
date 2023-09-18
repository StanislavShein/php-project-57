<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Label;

class LabelsTest extends TestCase
{
    use RefreshDatabase;

    private $label;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->label = Label::factory()->create();
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

    public function testForbiddenEditByUnknown(): void
    {
        $response = $this->get(route('labels.edit', $this->label));

        $response->assertForbidden();
    }

    public function testAllowedEditByUser(): void
    {
        $response = $this->actingAs($this->user)->get(route('labels.edit', $this->label));

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

        $response->assertStatus(302);

        $this->assertDatabaseMissing('labels', ['id' => $this->label->id]);
    }
}
