<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlackRequest;

class TestController extends Controller
{
    public function index()
    {
        dd(date('d-m-Y H:i', 1474375082.000008));

//         Initialize Slack request
//        $request = new SlackRequest([
//            'channel' => 'D1V5A8C1K',
//            'count' => 10
//        ]);
//
//        // Get json from Slack
//        $json = $request->getJSON('im.history');
//
//        // TODO: Parse data and return.
//        return $json;
    }
}
