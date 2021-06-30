<?php

namespace Tests\Unit\controllerTest;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $payload = [
                "name"=> "markus jackson",
                "email"=> " test3@test.ie",
                 "password"=> "password",
                 "password_confirmation"=> "password"
             ];
        $this->withoutExceptionHandling();
        Artisan::call('passport:install');
        $response = $this->json("post", "api/user/register", $payload);
        $response->assertStatus(204);
        $this->assertDatabaseHas('users', [ "name" => $payload['name'] ]);
    }

    public function test_registered_user_can_login()
    {
        $user = factory(User::class)->create();
        $payload = [
            "email"=> $user->email,
            "password"=> $user->password,
            "password_confirmation"=> $user->password
        ];
        $this->withoutExceptionHandling();
        $response = $this->json("post", "api/user/login", $payload);
        $response->assertStatus(200);

    }

    public function test_can_get_user_returns_user(){
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->get('api/user/me/'.$user->id);
        $response->assertStatus(200);
    }

    public function test_can_updated_user(){
        $user =  factory(User::class)->create();
        $payload =  [
            "name" => "edited",
            "email"=> "edited"];
        $this->withoutExceptionHandling();
        $response = $this->actingAs($user, 'api')->
        put('api/user/'.$user->id, $payload );
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [ "name" =>"edited", "email"=> "edited" ]);
    }

    public function test_can_logout_authenticated_user(){
//        $user =  factory(User::class)->create();
//
//        $this->withoutExceptionHandling();
//        $response = $this->actingAs($user, 'api')->get("api/user/logout");
//        $response->assertStatus(200);
    }

    public function test_can_delete_user(){

        $user =  factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->delete('api/user/'.$user->id);
        $response->assertStatus(204);
        $this->assertDatabaseCount("users", 0);
    }
}
