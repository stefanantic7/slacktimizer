<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlackRequest;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\Helper;
use Illuminate\Support\Collection;

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

        $history =collect($history)->reverse()->all();


        return redirect('/')->with('chat', $history);
    }

    /**
     * Get channels from Slack for logged user
     * and store them to database.
     *
     * @return object
     */
    public function get()
    {
        // Initialize Slack request
        $request = new SlackRequest([
            'exclude_archived' => 1
        ]);

        // Get json from Slack
        $json = $request->getJSON('channels.list');

        Repository::saveChannels($json);
    }
}
