<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MessagesController extends Controller
{
    /**
     * @var ApiClient
     */
    private $client;

    /**
     * MessagesController constructor.
     */
    public function __construct()
    {
        // Set user
        $this->client = new ApiClient(Auth::user()->remember_token);
    }

    /**
     * @param Request $request
     */
    public function sendMessage(Request $request)
    {
        // TODO: Set payload.
        // Set plugin payload
        $payload = new ChatPostMessagePayload();
        $payload->setChannel('@antic');
        $payload->setText('Hello from Laravel!');

        // Get response
        $response = $this->client->send($payload);

        // TODO: Handle errors.
        // Check for messages
        if ($response->isOk()) {
            dd('Successfully posted message on %s' . $response->getChannelId());
        } else {
            dd('Failed to post message to Slack: %s' . $response->getErrorExplanation());
        }

    }
}
