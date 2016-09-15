<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetChannelsRequest;
use App\Repositories\Repository;

class TestController extends Controller
{
    public function index(GetChannelsRequest $request)
    {
        $channels = $request->getJson();
        dd($channels);
//        Repository::saveChannels($channels);
//
//        return redirect('direct');
    }
}
