<?php

namespace App\Http\Requests;

use CL\Slack\Payload\ChannelsListPayload;
use Auth;

class GetChannelsRequest extends SlackRequest
{
    /**
     * Send API request to Slack and parse
     * json data from response.
     *
     * @return object
     */
    public function getJSON()
    {
        // Set plugin payload
        $payload = new ChannelsListPayload();
        $payload->setExcludeArchived(true);

        // Get response
        $response = $this->client->send($payload);

        // Check for messages
        return $this->sendResponse($response, $response->getChannels(), $response->getErrorExplanation());
    }
}
