<?php

namespace Tests\Feature\foodSafetyType;

use App\Models\tb_foodsafety_types;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateTypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_create_a_type()
    {
        $this->withoutExceptionHandling();

        $type = factory(tb_foodsafety_types::class)->raw();

        $response = $this->postJson(route('types_foodsafety.store', $type));

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'fdst_id_usr' => $type['fdst_id_usr'],
                    'fdst_id_dst' => $type['fdst_id_dst'],
                    'fdst_desc' => $type['fdst_desc'],
                ]
            ]);
    }
}
