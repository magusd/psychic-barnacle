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
    public function testFetchWebsites()
    {
        $website = Website::create([
            'url' => $this->faker->url,
            'name' => $this->faker->name
        ]);

        $response = $this->get('api/websites')
            ->assertJsonFragment([
                'id' => $website->id,
                'url' => $website->url,
                'name' => $website->name
            ])
            ->assertStatus(200);
    }

    public function testCreateWebsite()
    {
        $website = new Website([
            'url' => $this->faker->url,
            'name' => $this->faker->name,
        ]);
        $response = $this->post('api/websites',$website->toArray());
        $response->assertStatus(201);
        $db = Website::where('url',$website->url)->first();
        $this->assertEquals($db->url,$website->url);
    }

    public function testWebsiteValidation()
    {
        $website = new Website([
            'url' => $this->faker->url,
//            'name' => $this->faker->name,
        ]);
        $response = $this->post('api/websites',$website->toArray());
        $response->assertStatus(422);

    }
}
