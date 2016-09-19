<?php

namespace App\Http\Requests;

use App\Http\Requests\SlackRequest;
use CL\Slack\Payload\ChatPostMessagePayload;

class SendPrivateMessageRequest extends SlackRequest
{
    /**
     * @return string
     */
    public function getJSON()
    {
        // Set plugin payload
        $payload = new ChatPostMessagePayload();
        $payload->setChannel($this->input('send_to'));
        $payload->setText($this->input('message'));

        // Get response
        $response = $this->client->send($payload);

        // Check for messages
        $this->sendResponse($response, $response->getChannelId(), $response->getErrorExplanation());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'send_to' => 'required',
//            'message' => 'required',
        ];
    }
}
