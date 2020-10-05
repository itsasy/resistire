<?php

namespace Tests\Feature\foodSafety;

use App\Models\tb_foodsafety;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

class UpdateSafetyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function can_update_a_article_without_image()
    {
        $this->withoutExceptionHandling();

        $article = factory(tb_foodsafety::class)->create(['fds_img' => null]);

        $update = ['fds_title' => 'Titulo'];

        $response = $this->put(route('foodsafety.update', $article->id), $update);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'fds_title' => $update['fds_title'],
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
    function can_update_a_article_with_image()
    {
        $this->withoutExceptionHandling();

        $article = factory(tb_foodsafety::class)->create(['fds_img' => 'image.png']);

        $update = ['fds_title' => 'Título'];

        $response = $this->put(route('foodsafety.update' , $article->id), $update);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'fds_title' => $update['fds_title'],
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
                        'image' => url('storage/foodSafety/' . $article['fds_img'])
                    ],
                ]
            ]);
    }

    /** @test */
    function can_update_a_image_exists_of_article()
    {
        $this->withoutExceptionHandling();

        $article = factory(tb_foodsafety::class)->create(['fds_img' => 'aea.png']);

        $update = ['fds_img' => UploadedFile::fake()->image('image.png', 100, 100)];

        $response = $this->put(route('foodsafety.update' , $article->id), $update);

        $response->assertStatus(200)
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
                        'image' => url('storage/foodSafety/' . $update['fds_img']->getClientOriginalName())
                    ],
                ]
            ]);
    }

    /** @test */
    function can_added_a_image_of_article()
    {
        $this->withoutExceptionHandling();

        $article = factory(tb_foodsafety::class)->create();

        $update = ['fds_img' => UploadedFile::fake()->image('image.png', 100, 100)];

        $response = $this->put(route('foodsafety.update' , $article->id), $update);

        $response->assertStatus(200)
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
                        'image' => url('storage/foodSafety/' . $update['fds_img']->getClientOriginalName())
                    ],
                ]
            ]);
    }
}
