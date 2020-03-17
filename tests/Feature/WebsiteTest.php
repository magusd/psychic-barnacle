<?php

namespace Tests\Feature;

use App\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WebsiteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $website = Website::create([
            'url' => $this->faker->url,
            'name' => $this->faker->name
        ]);

        $response = $this->get('api/websites')->assertJsonFragment([
            'url' => $website->url
        ]);

        dump($response);
        $response->assertStatus(200);
    }
}
