<?php

namespace App\Http\Requests;


use CL\Slack\Payload\ImListPayload;
use App\Repositories\Repository;
use CL\Slack\Payload\UsersListPayload;

class GetImsRequest extends SlackRequest
{
    /**
     * Send API request to Slack and parse
     * json data from response.
     *
     * @return array
     */
    public function getJSON()
    {
        // Set plugin payload
        $payloadIms = new ImListPayload();
        $payloadIms->setExcludeArchived(true);
        $payloadUsers = new UsersListPayload();

        // Get response
        $responseIms = $this->client->send($payloadIms);
        $responseUsers = $this->client->send($payloadUsers);

        Repository::saveIms($responseIms->getImChannels(), $responseUsers->getUsers());
    }
}
