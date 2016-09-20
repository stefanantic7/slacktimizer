<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SendPrivateMessageRequest;
use App\Chat;
use DB;
use Auth;

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
     * Show specific chat with history.
     *
     * @return redirect
     */
    public function chat(Request $request)
    {
        return redirect('/')->with('chat', $request->chat);
    }

    public function send(SendPrivateMessageRequest $request)
    {
        $request->getJSON();
        $request->session()->flash('name', $request->input('send_to'));

        return redirect('/');
    }
}
