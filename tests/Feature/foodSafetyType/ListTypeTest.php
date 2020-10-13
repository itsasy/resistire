<?php

namespace Tests\Feature\foodSafetyType;

use App\Models\tb_foodsafety_types;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListTypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_list_a_type()
    {
        $this->withoutExceptionHandling();

        $type = factory(tb_foodsafety_types::class)->create();

        $response = $this->getJson(route('types_foodsafety.show', $type->id));

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'fdst_id_usr' => $type->fdst_id_usr,
                    'fdst_id_dst' => $type->fdst_id_dst,
                    'fdst_desc' => $type->fdst_desc,
                ]
            ]);
    }

    /** @test */
    function can_list_all_type()
    {
        $this->withoutExceptionHandling();

        $type = factory(tb_foodsafety_types::class)->times(2)->create();

        $response = $this->getJson(route('types_foodsafety.index'));

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    [
                        'fdst_id_usr' => $type[0]->fdst_id_usr,
                        'fdst_id_dst' => $type[0]->fdst_id_dst,
                        'fdst_desc' => $type[0]->fdst_desc
                    ],
                    [
                        'fdst_id_usr' => $type[1]->fdst_id_usr,
                        'fdst_id_dst' => $type[1]->fdst_id_dst,
                        'fdst_desc' => $type[1]->fdst_desc
                    ]
                ]
            ]);
    }
}
