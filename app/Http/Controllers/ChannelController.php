<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlackRequest;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Helpers\Helper;
use App\Channel;
use Auth;
use DB;

class ChannelController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('token');
    }

    /**
     * Get channel history and redirect to home.
     *
     * @param Request $request
     * @return Response
     */
    public function chat(Request $request)
    {
        $chatId = $request->chat;

        // Initialize Slack request
        $request = new SlackRequest([
            'channel' => $chatId,
            'count' => 150
        ]);

        // Get json from Slack
        $json = $request->getJSON('channels.history');

        $history = collect(Helper::prepareImsHistory($json))->reverse();

        $chatName = Channel::where('chat_id', $chatId)
                            ->where('user_id', Auth::user()->id)
                            ->first();

        $channels = DB::table('channels')
            ->where('user_id', Auth::user()->id)
            ->where('is_member', true)
            ->get();

        $ims = DB::table('ims')
            ->where('user_id', Auth::user()->id)
            ->where('chat_id', '!=', null)
            ->get();

        $chatName = '#' . $chatName->name;

        return view('home', compact('channels', 'ims', 'history', 'chatName', 'chatId'));
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
