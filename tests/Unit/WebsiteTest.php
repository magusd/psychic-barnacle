<?php

namespace Tests\Unit;

use App\Website;
use Tests\TestCase;


class WebsiteTest extends TestCase
{
    public function testCreateSite()
    {
        $website = Website::create([
            'url' => $this->faker->url,
            'name' => $this->faker->name
        ]);
        $this->assertNotNull($website);
    }

    public function testCreateSiteUnique()
    {
        $url = $this->faker->url;
        Website::create([
            'url' => $url,
            'name' => $this->faker->name
        ]);
        $this->expectException(\PDOException::class);
        Website::create([
            'url' => $url,
            'name' => $this->faker->name
        ]);
    }
}
