<?php

namespace App\Repositories;

use App\Channel;
use App\Im;
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
     * Fill channels table with user channels.
     *
     * @param array $channels
     */
    public static function saveChannels($channels)
    {
        // Begin transaction
        DB::beginTransaction();

        try
        {
            // Remove old channels
            DB::table('channels')
                        ->where('user_id', '=', Auth::user()->id)
                        ->delete();

            // Add new channels
            foreach($channels['channels'] as $channel)
            {
                Channel::create(['user_id' => Auth::user()->id,
                                 'chat_id' => $channel['id'],
                                 'name' => $channel['name'],
                                 'is_member' => $channel['is_member']]);
            }

            DB::commit();
        } catch (Exception $e)
        {
            // Return error
            DB::rollback();
        }
    }

    /**
     * Fill ims table with user ims.
     *
     * @param array $ims
     * @param array $users
     */
    public static function saveIms($ims, $users)
    {
//        dd($ims);

        // Begin transaction
        DB::beginTransaction();

        try
        {
            // Delete old ims
            DB::table('ims')
                        ->where('user_id', '=', Auth::user()->id)
                        ->delete();

            foreach($users['members'] as $user)
            {
                Im::create(['user_id' => Auth::user()->id,
                            'slack_user_id' => $user['id'],
                            'chat_id' => Helper::parseChatId($ims['ims'], $user['id']),
                            'username' => $user['name'],
                            'name' => $user['profile']['real_name']]);
            }

            DB::commit();
        } catch (Exception $e)
        {
            // Return error
            DB::rollback();
        }
    }
}