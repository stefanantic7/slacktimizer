<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlackRequest;

class TestController extends Controller
{
    public function index()
    {
        $token = decrypt('0xEE3paZS4EucdIFpI2WaYxGrStdSbmcLsEtNSMROGM68GXepeUbudLpXkh8');

        dd($token);
//        $request = new SlackRequest([
//            'channel' => 'U1V5A1G15'
//        ]);
//
//        // Get json from Slack
//        $json = $request->getJSON('channels.history');
//        dd($json);
//        // TODO: Parse data and return.
//        return $json;
    }
}
