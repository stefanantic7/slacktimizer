<?php

namespace App\Helpers;

use Auth;
use DB;

/**
 * Abstract Helper class stores helper functions.
 *
 * @author Milos Milosevic <milos.milosevic@labs.devana.rs>
 */
abstract class Helper
{
    /**
     * Prepare ims message history.
     *
     * @param array $ims
     * @return array $ims
     */
    public static function prepareImsHistory($ims)
    {
        $users = DB::table('ims')
                        ->where('user_id', Auth::user()->id)
                        ->pluck('username', 'slack_user_id')
                        ->toArray();

        $history = [];
        foreach($ims['messages'] as $message)
        {
            $history[] = [
                'username' => $users[$message['user']],
                'timestamp' => date('d-m-Y H:i', $message['ts']),
                'text' => $message['text']
            ];
        }

        return $history;
    }

    /**
     * Parse chat id
     *
     * @param array $ims
     * @param string $userId
     * @return string $chatId
     */
    public static function parseChatId($ims, $userId)
    {
        foreach($ims as $im)
        {
            if($im['user'] == $userId)
                return $im['id'];
        }

        return null;
    }
}