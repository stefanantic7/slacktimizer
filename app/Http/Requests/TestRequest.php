<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use GuzzleHttp\Client;
use GuzzleHttp;

class TestRequest extends FormRequest
{
    public function index()
    {
        try
        {
            $response = $client->get('im.history')->getBody();
        }
        catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();

            return $response->getBody()->getContents();
        }

        return json_decode($response, true);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
