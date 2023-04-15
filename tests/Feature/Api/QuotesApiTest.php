<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;



class QuotesApiTest extends TestCase
{
    public function test_get_quotes()
    {
        $user = User::factory()->create();
        $this->assertCount(0, $user->tokens);

        $this->actingAs($user);
        $response = $this->getJson('/api/quotes');

        $response->assertStatus(200)
                 ->assertJson(fn (AssertableJson $json) =>
                    $json->has(1)
                 );
//        $response->dump();
    }

    public function test_get_quotes_count()
    {
        $user = User::factory()->create();
        $this->assertCount(0, $user->tokens);

        $this->actingAs($user);
        $response = $this->get('/api/quotes/5');

        $response->assertStatus(200)
                 ->assertJson(fn (AssertableJson $json) =>
                     $json->has(5)
                 );

//        $response->dump();
    }
}
