<?php

namespace Tests\Feature\foodSafety;

use App\Models\tb_foodsafety;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DestroySafetyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_destroy_a_article()
    {
        $this->withoutExceptionHandling();
        $article = factory(tb_foodsafety::class)->create();

        $response = $this->delete(route('foodsafety.destroy', $article->getRouteKey()));

        $response->assertStatus(200);


        $this->assertDatabaseMissing('tb_foodsafety', ['id' => $article->id]);
    }

}
