<?php

namespace Tests\Unit;


use App\artist;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArtistTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A http get unit test.
     * @return void
     */
    public function test_get_artists_returns_artists()
    {
       $payload =  factory(artist::class, 3)->create();
        $user =  factory(User::class)->create();
        $this->withoutExceptionHandling();
        $response = $this->actingAs($user, 'api')->get('/api/artists');
        $response->assertStatus(200);
        $response->assertExactJson($payload->toArray());
    }


    public function test_can_post_artists()
    {
         $payload =  [
              "name" => $this->faker->name,
              "biography" => $this->faker->paragraph,
              "image"=> $this->faker->url,
              "instagram" => $this->faker->url,
              "facebook"=>$this->faker->url,
             "applemusic" => $this->faker->url,
             "youtube" => $this->faker->url,
             "soundcloud" => $this->faker->url,
             "spotify" => $this->faker->url
           ];
        $user =  factory(User::class)->create();

          $this->withoutExceptionHandling();
          $response = $this->actingAs($user, 'api')->json('post','/api/artists', $payload);
          $response->assertStatus(204);
          $this->assertDatabaseHas('artists', [
            "name" => $payload['name']
       ]);
   }

   public function test_show_artists_returns_one_artist()
   {
        $artist = factory(artist::class)->create();
        $user =  factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->get('api/artists/'.$artist->id);
        $response->assertStatus(200);
   }

    public function test_can_update_artist()
    {
        $artist = factory(artist::class)->create();
        $user =  factory(User::class)->create();
        $payload =  [
            "name" => "edited",
            "biography" => "edited bio",
            "image"=> $this->faker->url,
            "instagram" => $this->faker->url,
            "facebook"=>$this->faker->url,
            "applemusic" => $this->faker->url,
            "youtube" => $this->faker->url,
            "soundcloud" => $this->faker->url,
            "spotify" => $this->faker->url
        ];
        $this->withoutExceptionHandling();
        $response = $this->actingAs($user, 'api')->
        put('api/artists/'.$artist->id, $payload );
        $response->assertStatus(200);
        $this->assertDatabaseHas('artists', [
            "name" =>"edited"
        ]);
    }

   public function test_destroy_artist()
   {
       $artist = factory(artist::class)->create();
       $user =  factory(User::class)->create();
       $response = $this->actingAs($user, 'api')->delete('api/artists/'.$artist->id);
       $response->assertStatus(204);
       $this->assertDatabaseCount("artists", 0);
   }
}
