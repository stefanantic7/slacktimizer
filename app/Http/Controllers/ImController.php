<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\SlackRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImController extends Controller
{
    /**
     * Get chat history and redirect it to homepage.
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
        $json = $request->getJSON('im.history');

        $history = Helper::prepareImsHistory($json);

        return redirect('/')->with('chat', $history);
    }

    /**
     * Send message.
     *
     * @param SendPrivateMessageRequest $request
     * @return View
     */
    public function send(SendPrivateMessageRequest $request)
    {
        $request->getJson();

        return redirect('direct');
    }

    /**
     * Get im's from Slack for logged user
     * and store them to database.
     *
     * @return object
     */
    public function get()
    {
        // Initialize Slack request
        $request = new SlackRequest([
            'channel' => 'D1V5A8C1K',
            'count' => 10
        ]);

        // Get json from Slack
        $json = $request->getJSON('im.history');
        dd($json);
        // TODO: Parse data.
        // TODO: Return to homepage.
//        return $json;
    }
}
