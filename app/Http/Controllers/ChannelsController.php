<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GetChannelsRequest;

use App\Http\Requests;

class ChannelsController extends Controller
{
    public function getImChannels()
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

    /**
     * Get channels from Slack for logged user
     * and store them to database.
     *
     * @param GetChannelsRequest $request
     */
    public function getChannels(GetChannelsRequest $request)
    {
        dd($request->getJSON());
    }
}
