<?php

namespace Tests\Feature\foodSafety;

use App\Models\tb_foodsafety_types;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DestroyTypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_destroy_a_type()
    {
        $type = factory(tb_foodsafety_types::class)->create();

        $response = $this->deleteJson(route('types_foodsafety.destroy', $type->getRouteKey()));

        $response->assertStatus(200);

        $this->assertDatabaseMissing('tb_foodsafety', ['id' => $type->id]);
    }

}
