<?php

namespace App\Http\Requests;

use App\Http\Requests\SlackRequest;
use CL\Slack\Transport\ApiClient;
use CL\Slack\Payload\ChannelsListPayload;
use Auth;

class GetChannelsRequest extends SlackRequest
{
    /**
     * Send API request to Trello and parse
     * json data from response.
     *
     * @return array
     */
    public function getJSON()
    {
        $client = new ApiClient(Auth::user()->remember_token);

        $payload = new ChannelsListPayload();
        $payload->setExcludeArchived(true);

        $response = $client->send($payload);

        // Error handling
        if ($response->isOk())
            return $response->getChannels();
        else
            return 'Failed to post message to Slack: %s.' . $response->getErrorExplanation();
    }
}
