<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlackRequest;

class TestController extends Controller
{
    public function index()
    {
        // Replace username
        preg_match_all('(<.*?>)', $text, $matches);

        foreach($matches[0] as $match)
        {
            $insert = $match;
            $exploded = explode('|', $match);
            if($exploded[0][1] == 'h')
            {
                $insert = '<a class="messageLink" href="' . substr($exploded[0], 1) . '">' . substr($exploded[0], 1) .
                '</a>';
            }
            else if($exploded[0][1] == '@')
            {
                $insert = '<span class="messageUsername">' . substr($exploded[0], 1) . '</span>';
            }

            $text = str_replace($match, $insert, $text);
        }

        return $text;
    }
}
