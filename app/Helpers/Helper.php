<?php

namespace App\Helpers;

/**
 * Abstract Helper class stores helper functions.
 *
 * @author Milos Milosevic <milos.milosevic@labs.devana.rs>
 */
abstract class Helper
{
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
            if($im->getUserId() == $userId)
                return $im->getId();
        }

        return null;
    }
}