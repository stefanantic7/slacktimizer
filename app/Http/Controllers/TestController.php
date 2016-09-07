<?php

namespace App\Http\Controllers;

use CL\Slack\Payload\ChannelsListPayload;
use CL\Slack\Transport\ApiClient;
use Auth;
use App\Http\Requests;
use Crypt;

class TestController extends Controller
{
    public function index()
    {
        $client = new ApiClient(Auth::user()->remember_token);

        $payload = new ChannelsListPayload();
        $payload->setExcludeArchived(true);

        $response = $client->send($payload);

        if ($response->isOk()) {
            dd('Successfully posted message on %s' . dd($response->getChannels()));
        } else {
            dd('Failed to post message to Slack: %s' . dd($response->getErrorExplanation()));
        }
    }
}
