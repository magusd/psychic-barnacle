<?php


namespace App\Http\Api\Fractal;


class WebsiteFractal extends BaseFractal
{
    public function transform($website)
    {
        return [
            'id' => (int)$website['id'],
            'url' => $website['url'],
            'name' => $website['name']
        ];
    }
}
