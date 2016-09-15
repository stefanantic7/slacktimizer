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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Send response back.
     *
     * @param Response $response
     * @param string $ok
     * @param string $error
     * @return object
     */
    protected function sendResponse($response, $ok, $error)
    {
        if ($response->isOk())
            return $ok;
        else
            dd('Failed to post message to Slack: %s' . $error);
    }
}
