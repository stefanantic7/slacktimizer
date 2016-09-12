<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SendPrivateMessageRequest;
use App\Chat;

class MessagesController extends Controller
{
    /**
     * Show message form.
     */
    public function show()
    {
        $channels = Chat::all()->pluck('name', 'chat_id');

        return view('sendMessage', compact('channels'));
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
}
