<?php

namespace Tests\Feature\foodSafety;

use App\Models\tb_foodsafety;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

class CreateSafetyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_create_a_article_without_image()
    {
        $this->withoutExceptionHandling();

        $article = factory(tb_foodsafety::class)->raw(['fds_img' => null]);

        $response = $this->post(route('foodsafety.store', $article));

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'fds_title' => $article['fds_title'],
                    'slug' => $article['slug'],
                    'fds_desc' => $article['fds_desc'],
                    'fds_source' => $article['fds_source'],
                    'fds_url' => $article['fds_url'],
                    'fds_youtube' => $article['fds_youtube'],
                    'fds_instagram' => $article['fds_instagram'],
                    'fds_facebook' => $article['fds_facebook'],
                    'fds_date' => $article['fds_date'],
                    'fds_enable' => $article['fds_enable'],
                    'fds_id_usr' => $article['fds_id_usr'],
                    'fds_id_fdst' => $article['fds_id_fdst'],
                    'links' => [
                        'image' => null
                    ],
                ]
            ]);
    }
    /** @test */
    function can_create_a_article_with_image()
    {
        $this->withoutExceptionHandling();

        $article = factory(tb_foodsafety::class)->raw([
            'fds_img' => UploadedFile::fake()->image('image.png', 100, 100)
        ]);

        $response = $this->post(route('foodsafety.store'), $article);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'fds_title' => $article['fds_title'],
                    'slug' => $article['slug'],
                    'fds_desc' => $article['fds_desc'],
                    'fds_source' => $article['fds_source'],
                    'fds_url' => $article['fds_url'],
                    'fds_youtube' => $article['fds_youtube'],
                    'fds_instagram' => $article['fds_instagram'],
                    'fds_facebook' => $article['fds_facebook'],
                    'fds_date' => $article['fds_date'],
                    'fds_enable' => $article['fds_enable'],
                    'fds_id_usr' => $article['fds_id_usr'],
                    'fds_id_fdst' => $article['fds_id_fdst'],
                    'links' => [
                        'image' => url('storage/foodSafety/' . $article['fds_img']->getClientOriginalName())
                    ],
                ]
            ]);
    }
}
