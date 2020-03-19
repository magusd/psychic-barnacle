<?php

namespace App\Http\Controllers;

use App\Http\Api\Fractal\WebsiteFractal;
use App\Http\Api\RestResponse;
use App\Http\Requests\CreateWebsiteRequest;
use App\Website;
use Illuminate\Http\Request;

class WebsitesController extends Controller
{
    use RestResponse;
    public function index(WebsiteFractal $fractal)
    {
        $data = [];
        if($websites = Website::paginate(10))
            $data = $fractal->transformMany($websites);
        return $this->ok($data);
    }

    public function store(CreateWebsiteRequest $request,WebsiteFractal $fractal)
    {
        $website = Website::create($request->all());
        return $this->created($fractal->transform($website));
    }
}
