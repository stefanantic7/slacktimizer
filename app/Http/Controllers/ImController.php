<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\SlackRequest;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use App\Im;
use DB;

class ImController extends Controller
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
     * Get chat history and redirect it to homepage.
     *
     * @param Request $request
     * @return Response
     */
    public function chat(Request $request)
    {
        $chatId = $request->chat;

        // Initialize Slack request
        $request = new SlackRequest([
            'channel' => $request->chat,
            'count' => 10,
            'unreads' => 1
        ]);

        // Get json from Slack
        $json = $request->getJSON('im.history');

        $history = collect(Helper::prepareImsHistory($json))->reverse();;

        $user = Im::where('chat_id', $chatId)
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


        $chatName = '@' . $user->username;
        $fullName = $user->name;
//        return redirect('/')->with(['chat' => $history, 'chat_name' => '@' . $chatName->username]);
        return view('home', compact('channels', 'ims', 'history', 'chatName', 'chatId', 'fullName'));
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
        $requestIms = new SlackRequest([
            'exclude_archived' => 1
        ]);

        // Get json from Slack
        $jsonIms = $requestIms->getJSON('im.list');

        // Initialize Slack request
        $requestUsers = new SlackRequest([
            'exclude_archived' => 1
        ]);

        // Get json from Slack
        $jsonUsers = $requestUsers->getJSON('users.list');

        Repository::saveIms($jsonIms, $jsonUsers);
    }
}
