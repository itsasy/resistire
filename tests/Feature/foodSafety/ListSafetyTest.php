<?php

namespace Tests\Feature\foodSafety;

use App\Models\tb_foodsafety;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListSafetyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_fetch_a_single_article()
    {
        $this->withoutExceptionHandling();
        $article = factory(tb_foodsafety::class)->create();

        $response = $this->getJson(route('foodsafety.show', $article->getRouteKey()));

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'fds_title' => $article->fds_title,
                    'slug' => $article->slug,
                    'fds_desc' => $article->fds_desc,
                    'fds_source' => $article->fds_source,
                    'fds_url' => $article->fds_url,
                    'fds_youtube' => $article->fds_youtube,
                    'fds_instagram' => $article->fds_instagram,
                    'fds_facebook' => $article->fds_facebook,
                    'fds_date' => $article->fds_date,
                    'fds_enable' => $article->fds_enable,
                    'fds_id_usr' => $article->fds_id_usr,
                    'fds_id_fdst' => $article->fds_id_fdst,
                    'fds_id_dst' => $article->fds_id_dst,
                    'links' => [
                        'image' => null
                    ],
                ]
            ]);
    }
    /** @test */
    function can_fetch_all_article()
    {
        $this->withoutExceptionHandling();
        $article = factory(tb_foodsafety::class)->times(2)->create();

        $response = $this->getJson(route('foodsafety.index'));

        $response->assertStatus(200)
            ->assertJsonFragment([
                'data' => [
                    [
                        'fds_title' => $article[0]->fds_title,
                        'slug' => $article[0]->slug,
                        'fds_desc' => $article[0]->fds_desc,
                        'fds_source' => $article[0]->fds_source,
                        'fds_url' => $article[0]->fds_url,
                        'fds_youtube' => $article[0]->fds_youtube,
                        'fds_instagram' => $article[0]->fds_instagram,
                        'fds_facebook' => $article[0]->fds_facebook,
                        'fds_date' => $article[0]->fds_date,
                        'fds_enable' => $article[0]->fds_enable,
                        'fds_id_usr' => $article[0]->fds_id_usr,
                        'fds_id_fdst' => $article[0]->fds_id_fdst,
                        'fds_id_dst' => $article[0]->fds_id_dst,
                        'links' => [
                            'image' => null
                        ],
                    ],
                    [
                        'fds_title' => $article[1]->fds_title,
                        'slug' => $article[1]->slug,
                        'fds_desc' => $article[1]->fds_desc,
                        'fds_source' => $article[1]->fds_source,
                        'fds_url' => $article[1]->fds_url,
                        'fds_youtube' => $article[1]->fds_youtube,
                        'fds_instagram' => $article[1]->fds_instagram,
                        'fds_facebook' => $article[1]->fds_facebook,
                        'fds_date' => $article[1]->fds_date,
                        'fds_enable' => $article[1]->fds_enable,
                        'fds_id_usr' => $article[1]->fds_id_usr,
                        'fds_id_fdst' => $article[1]->fds_id_fdst,
                        'fds_id_dst' => $article[1]->fds_id_dst,
                        'links' => [
                            'image' => null
                        ],
                    ]
                ]
            ]);
    }
}
