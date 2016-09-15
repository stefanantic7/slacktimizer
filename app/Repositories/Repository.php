<?php

namespace App\Repositories;

use App\Chat;
use App\Helpers\Helper;
use Auth;
use DB;

/**
 * Abstract Repository class deals with database manipulation.
 *
 * @author Milos Milosevic <milos.milosevic@labs.devana.rs>
 */
abstract class Repository
{
    /**
     * Fill chats table with user channels.
     *
     * @param array $channels
     */
    public static function saveChannels($channels)
    {
        DB::table('chats')
                    ->where('user_id', '=', Auth::user()->id)
                    ->where('type_id', '=', '2')
                    ->delete();

        foreach($channels as $channel)
        {
            Chat::create(['user_id' => Auth::user()->id,
                          'type_id' => '2',
                          'chat_id' => $channel->getId(),
                          'name' => $channel->getName()]);
        }
    }

    /**
     * Fill chats table with user ims.
     *
     * @param array $ims
     * @param array $users
     */
    public static function saveIms($ims, $users)
    {
        DB::table('chats')
                    ->where('user_id', '=', Auth::user()->id)
                    ->where('type_id', '=', '1')
                    ->delete();

        foreach($users as $user)
        {
            Chat::create(['user_id' => Auth::user()->id,
                         'slack_user_id' => $user->getId(),
                         'type_id' => '1',
                         'chat_id' => Helper::parseChatId($ims, $user->getId()),
                         'username' => $user->getName(),
                         'name' => $user->getProfile()->getRealName()]);
        }
    }
}