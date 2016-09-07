<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ChannelsController extends Controller
{
    public function getChannels()
    {
        $client = new ApiClient(Auth::user()->remember_token);

        $payload = new ImListPayload();

        $response = $client->send($payload);

        if ($response->isOk()) {
            dd('Successfully posted message on %s' . dd($response->getImChannels()));
        } else {
            dd('Failed to post message to Slack: %s' . dd($response->getErrorExplanation()));
        }
    }
}
