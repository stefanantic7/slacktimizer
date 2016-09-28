<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SlackRequest;
use App\Http\Requests;
use App\Repositories\Repository;

class GroupController extends Controller
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
        $json = $request->getJSON('groups.list');

        Repository::saveGroups($json);
    }
}
