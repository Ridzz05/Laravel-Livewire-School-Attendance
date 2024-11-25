<?php

namespace Tests\Feature\Livewire\Components;

use App\Livewire\Components\Alert;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AlertTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Alert::class)
            ->assertStatus(200);
    }
}
