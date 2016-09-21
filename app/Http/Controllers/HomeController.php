<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Requests\SlackRequest;

class HomeController extends Controller
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
     * Main homepage.
     *
     * @return view
     */
    public function index()
    {
        $channels = DB::table('channels')
                        ->where('user_id', Auth::user()->id)
                        ->where('is_member', true)
                        ->get();

        $ims = DB::table('ims')
                        ->where('user_id', Auth::user()->id)
                        ->where('chat_id', '!=', null)
                        ->get();

        $history = [];
        if(session('chat'))
        {
            $history = session('chat');
            session()->forget('chat');
        }

        return view('home', compact('channels', 'ims', 'history'));

    }

    /**
     * Send message.
     *
     * @param Request $request
     * @return response
     */
    public function send(Request $request)
    {
        // Initialize Slack request
        $request = new SlackRequest([
            'channel' => $request->send_to,
            'text' => $request->message,
            'as_user' => true
        ]);

        // Get json from Slack
        $request->getJSON('chat.postMessage');

        return redirect('/');
    }
}
