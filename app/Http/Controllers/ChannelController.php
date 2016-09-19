<?php

namespace App\Http\Controllers;

use App\Repositories\Repository;
use App\Http\Requests\GetChannelsRequest;

class ChannelController extends Controller
{
    /**
     * Get channels from Slack for logged user
     * and store them to database.
     *
     * @param GetChannelsRequest $request
     * @return object
     */
    public function getChannels(GetChannelsRequest $request)
    {
        $channels = $request->getJson();

        Repository::saveChannels($channels);
//        return redirect('direct');
    }
}
