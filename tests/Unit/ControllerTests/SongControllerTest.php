<?php

namespace Tests\Unit;



use App\Album;
use App\artist;
use App\Song;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SongControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_songs_returns_songs()
    {
        factory(artist::class)->create();
        factory(Album::class)->create();
        factory(Song::class, 2)->create();

        $this->withoutExceptionHandling();
        $response = $this->get('/api/songs');
        $response->assertStatus(200);
    }

    public function test_can_post_song()
    {
        $artist = factory(artist::class)->create()->id;
        $album = factory(Album::class)->create()->id;

        $payload =  [
            "title" => $this->faker->title,
            "link" => $this->faker->url,
            "image"=> $this->faker->url,
            "producer" => $this->faker->name,
            "writer" => $this->faker->name,
            "feature" => $this->faker->name,
            "downloads" => $this->faker->numberBetween(0, 200),
            "streams" => $this->faker->numberBetween(0, 100),
            'artist_id'=>$artist,
            'album_id'=>$album
        ];

        $this->withoutExceptionHandling();
        $response = $this->json('post','/api/songs', $payload);
        $response->assertStatus(204);
        $this->assertDatabaseHas('songs', [ "title" => $payload['title'] ]);
    }

    public function test_show_song_returns_one_song()
    {
        factory(artist::class)->create();
        factory(Album::class)->create();
        $song = factory(Song::class)->create();

        $response = $this->get('api/songs/'.$song->id);
        $response->assertStatus(200);
    }

    public function test_can_update_song()
    {

        $song = factory(Song::class)->create();
        $payload =  [
            "title" => "edited",
            "link" => $this->faker->url,
            "image"=> $this->faker->url,
            "producer" => "edited",
            "writer" => $this->faker->name,
            "feature" => $this->faker->name,
            "downloads" => $this->faker->numberBetween(0, 200),
            "streams" => $this->faker->numberBetween(0, 100),

        ];
        $this->withoutExceptionHandling();
        $response = $this->put('api/songs/'.$song->id, $payload );
        $response->assertStatus(200);
       // $this->assertDatabaseHas('songs', [ "title" =>"edited" ]);
    }

    public function test_destroy_song()
    {
        factory(artist::class)->create();
        factory(Album::class)->create();
        $song = factory(Song::class)->create();

        $response = $this->delete('api/songs/'.$song->id);
        $response->assertStatus(204);
        $this->assertDatabaseCount("songs", 0);
    }
}
