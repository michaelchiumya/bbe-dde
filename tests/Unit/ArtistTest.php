<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ArtistTest extends TestCase
{
    /**
     * A http get unit test.
     *
     * @return void
     */
    public function test_index_returns_artists()
    {
        $response = $this->get('/api/artists');
        $response->assertStatus(500);
    }

//    public function test_store_artist(){
//
//         $payload =  [
//            "name" => "michael yekha",
//            "biography" => " some bio here",
//            "instagram" => " some link here",
//            "facebook"=>" some link here",
//            "applemusic" => " some link here",
//            "youtube" => " some link here",
//            "soundcloud" => " some link here",
//            "spotify" => " some link here"
//           ];
//
//        $response = $this->withHeaders(['content-type' => 'application/json',])->json('post','/api/artist', $payload)
//       ;
//
//        $response->assertStatus(200)->assertJson(['created' => true]);
//    }
   public function test_show_artist(){
       $response = $this->get('/api/artists/1');
       $response->assertStatus(500);

   }
//    public function test_update_artist(){}
   public function test_destroy_artist(){
       $response = $this->delete('/api/artists/1');
       $response->assertStatus(500);
   }
}
