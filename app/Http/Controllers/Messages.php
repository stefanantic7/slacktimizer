<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cache;

class Messages extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){
        $json = [
            "ok" => true,
            "messages" => [
                [
                    "type" => "message",
                    "user"=> "U1V5A1G15",
                    "text"=> "hello",
                    "ts"=> "1473152050.000002"
                ],
                [
                    "type" => "message",
                    "user" => "U1V5FARPT",
                    "text" => "cao sta imacao sta imacao sta grbrgbrgbimacao sta imacao sta imacao sta imacao sta imacao sta ima",
                    "bot_id" => "B27LJNGHF",
                    "ts" => "1473075103.000041"
                ],
                [
                    "type" => "message",
                    "user" => "U1V5FARPT",
                    "text" => "fdafnmdajs du sdfmkmasdfklasd fl asdlfasdfasdfas df asdf anms fa skfsdfb hbasdf hjasd fh asdjfh ahsd fh asdh fah fha sdhf ahsd fasdbf ashdd gfjk asdfhv asjkd gfhasd fhk ashdfasdf as kf kass dfkmaod fk aksd fk asdkfl asd kf kasd fkasd fas asjkld fmja sdmklf asmld fmklasd klmf aklsd fklas djklf klas kdlf klas djklf asjkld flasleefasdfasdhf asd fas dfb asdj fhas dfh asd fhas dhf ashd fha qwerh qwhe rfqwe fh dhs jhwe jf jksa hf asdjk fhjasdhf asjkdf ajksdfasdjf asjkd fjkas djkf asjkd fjkas djkf ajksd fjkasjkdf jasdsdfh ash dfhjas dfj asd fhjas f asd hanfjnjasdnfjasdnfj sdfa!",
                    "bot_id" => "B27LJNGHF",
                    "ts" => "1473075103.000040"
                ],
                [
                    "type" => "message",
                    "user" => "U1V5FARPT",
                    "text" => "Hello from Laravel!",
                    "bot_id" => "B27LJNGHF",
                    "ts" => "1473075101.000039"
                ],
                [
                    "type" => "message",
                    "user" => "U1V5FARPT",
                    "text" => "Hello from Laravel!",
                    "bot_id" => "B27LJNGHF",
                    "ts" => "1473075101.000038"
                ]
            ],
            "has_more" => true,
            "is_limited" => false
        ];

        return view('showMessage', compact('json'));
    }
    public function send(){

//        cache()->put('foo',view('sendMessage'),60);
//        return cache()->get('foo');
        return view('sendMessage');
    }
}
