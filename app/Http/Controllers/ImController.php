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
    public function chat($chat)
    {
        $page=1;
        $option = 'ims';
        // Initialize Slack request
        $request = new SlackRequest([
            'channel' => $chat,
            'count' => 50,

        ]);

        // Get json from Slack
        $json = $request->getJSON('im.history');

        $history = collect(Helper::prepareImsHistory($json));
        session(['sessionHistory' => $history]);
        $history=$history->slice(0,10);
        $history = $history->reverse();
        $user = Im::where('chat_id', $chat)
            ->where('user_id', Auth::user()->id)
            ->first();

        $chatName = '@' . $user->username;
        $fullName = $user->name;

        return view('home', compact('history', 'chatName', 'chat', 'fullName', 'page', 'option' ));
    }
    public function pagination($chat, $page=1)
    {
        $option = 'ims';
        $user = Im::where('chat_id', $chat)
            ->where('user_id', Auth::user()->id)
            ->first();
        $chatName = '@' . $user->username;
        $fullName = $user->name;
        $startAt=($page - 1)*10;
        $history=session('sessionHistory');

        $history=$history->slice($startAt,10);
        $history = $history->reverse();
        return view('home', compact('history', 'chatName', 'chat', 'fullName', 'page', 'option'));
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
