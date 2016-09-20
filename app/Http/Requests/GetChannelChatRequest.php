<?php

namespace App\Http\Requests;

use CL\Slack\Payload\ChannelsHistoryPayload;

class GetChannelChatRequest extends SlackRequest
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
        $payload = new ChannelsHistoryPayload();
        $payload->setChannelId($this->chat);
        $payload->setCount(10);

        // Get response
        $response = $this->client->send($payload);

        return $this->sendResponse($response, $response->getMessages(), $response->getErrorExplanation());
    }
}
