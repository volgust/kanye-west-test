<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class FavoriteQuotesApiTest extends TestCase
{
    public function test_get_favorite_quotes()
    {
        $user = User::factory()->create();
        $this->assertCount(0, $user->tokens);

        $this->actingAs($user);
        $response = $this->get('/api/favorite_quotes');

        $response->assertStatus(200);

//        $response->dump();
    }
}
