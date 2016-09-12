<?php

namespace App\Http\Requests;

use CL\Slack\Transport\ApiClient;
use Auth;

abstract class SlackRequest extends Request
{
    /**
     * @var ApiClient
     */
    protected $client;

    /**
     * MessagesController constructor.
     */
    public function __construct()
    {
        // Set user
        $this->client = new ApiClient(Auth::user()->remember_token);
    }

    /**
     * Send API request to Trello and parse
     * json data from response.
     *
     * @return json
     */
    public function getJSON() {}

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO: Token request!

        return true;
    }

    protected function sendResponse($response, $ok, $error)
    {
        if ($response->isOk()) {
//            dd('Successfully posted message on %s' . $ok);
        } else {
            dd('Failed to post message to Slack: %s' . $error);
        }
    }
}
