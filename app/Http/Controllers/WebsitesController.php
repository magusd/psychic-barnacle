<?php

namespace App\Http\Controllers;

use App\Http\Api\RestResponse;
use App\Website;
use Illuminate\Http\Request;

class WebsitesController extends Controller
{
    use RestResponse;
    public function index()
    {
        return $this->ok(Website::all()->toArray());
    }
}
