<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SendPrivateMessageRequest;
use App\Chat;
class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('token');
    }
    /**
     * Show the application dashboard.
     *
     * @param Request $request.
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $channels = Chat::all()->pluck('chat_id');
        $sendTo = '';
        if($request->session('name'))
            $sendTo =  $request->session()->get('name');

        return view('home', compact('channels','sendTo'));
    }

    public function send(SendPrivateMessageRequest $request)
    {
        $request->getJSON();
        $request->session()->flash('name', $request->input('send_to'));

        return redirect('/');
    }
    public function get($user){
        $channels = Chat::all()->pluck('chat_id');
        $sendTo = $user;


        return view('home', compact('channels','sendTo'));

    }
}
