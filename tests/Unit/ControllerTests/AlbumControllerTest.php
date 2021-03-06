<?php

namespace Tests\Unit\Http;

use App\Album;
use App\artist;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlbumControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A http get unit test.
     * @return void
     */
    public function test_get_albums_returns_albums()
    {
        factory(Album::class, 3)->create();
        $user = factory(User::class)->create();

        $this->withoutExceptionHandling();
        $response = $this->actingAs($user, 'api')->get('/api/albums');
        $response->assertStatus(200);
    }

    public function test_can_post_albums()
    {
        $artist =  factory(artist::class)->create()->id;
        $user = factory(User::class)->create();

        $payload =  [
            "title" => $this->faker->title,
            "label" => $this->faker->company,
            "link" => $this->faker->url,
            "release_date" => $this->faker->date("y-m-d"),
            "image"=> $this->faker->url,
            'artist_id'=>$artist
        ];

        $this->withoutExceptionHandling();
        $response = $this->actingAs($user, 'api')->json('post','/api/albums', $payload);
        $response->assertStatus(204);
        $this->assertDatabaseHas('albums', [ "title" => $payload['title'] ]);
    }

    public function test_show_album_returns_one_album()
    {
        $album = factory(Album::class)->create();
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->get('api/albums/'.$album->id);
        $response->assertStatus(200);
    }

    public function test_can_update_album()
    {
        $album = factory(Album::class)->create();
        $user = factory(User::class)->create();
        $payload =  [
            "title" => "edited",
            "label" => $this->faker->company,
            "link" => $this->faker->url,
            "release_date" => $this->faker->date("y-m-d"),
            "image"=> $this->faker->url
        ];
        $this->withoutExceptionHandling();
        $response =$this->actingAs($user, 'api')->put('api/albums/'.$album->id, $payload );
        $response->assertStatus(200);
        $this->assertDatabaseHas('albums', [ "title" =>"edited" ]);
    }

    public function test_destroy_album()
    {
        $album = factory(Album::class)->create();
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->delete('api/albums/'.$album->id);
        $response->assertStatus(204);
        $this->assertDatabaseCount("albums", 0);
    }
}
