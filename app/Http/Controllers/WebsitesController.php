<?php

namespace App\Http\Controllers;

use App\Http\Api\Fractal\WebsiteFractal;
use App\Http\Api\RestResponse;
use App\Website;
use Illuminate\Http\Request;

class WebsitesController extends Controller
{
    use RestResponse;
    public function index(WebsiteFractal $fractal)
    {
        $data = [];
        if($websites = Website::all())
            $data = $fractal->transformMany($websites->toArray());
        return $this->ok($data);
    }
}
