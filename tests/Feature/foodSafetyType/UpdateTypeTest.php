<?php

namespace Tests\Feature\foodSafetyType;

use App\Models\tb_foodsafety_types;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateTypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_update_a_type()
    {
        $this->withoutExceptionHandling();

        $type = factory(tb_foodsafety_types::class)->create();

        $update = ['fdst_desc' => 'Otra descripción'];

        $response = $this->putJson(route('types_foodsafety.update', $type->id), $update);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'fdst_id_usr' => $type['fdst_id_usr'],
                    'fdst_id_dst' => $type['fdst_id_dst'],
                    'fdst_desc' => $update['fdst_desc'],
                ]
            ]);
    }
}
