<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlackRequest;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\Helper;

class ChannelController extends Controller
{
    /**
     * Get channel history and redirect to home.
     *
     * @param Request $request
     * @return Response
     */
    public function chat(Request $request)
    {
        // Initialize Slack request
        $request = new SlackRequest([
            'channel' => $request->chat,
            'count' => 10
        ]);

        // Get json from Slack
        $json = $request->getJSON('channels.history');

        $history = Helper::prepareImsHistory($json);

        return redirect('/')->with('chat', $history);
    }

    /**
     * Get channels from Slack for logged user
     * and store them to database.
     *
     * @param GetChannelsRequest $request
     * @return object
     */
    public function get(GetChannelsRequest $request)
    {
        $channels = $request->getJson();

        Repository::saveChannels($channels);
    }
}
