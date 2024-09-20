<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;


class PhonePeController extends Controller
{
    public function phonepe(){
        $data = [
            "merchantId" => "PGTESTPAYUAT",
            "merchantTransactionId" => "MT7850590068188104",
            "merchantUserId" => "MUID123",
            "amount" => 10000,
            "redirectUrl" => route('response'),
            "redirectMode" => "REDIRECT",
            "callbackUrl" => route('response'),
            "mobileNumber" => "9999999999",
            "paymentInstrument" =>[ 
                "type" =>"PAY_PAGE"
            ]
        ];
        $encode = base64_encode(json_encode($data));
        $saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
        $saltIndex = 1;

        $string =$encode.'/pg/v1/pay'.$saltKey;
        $sha256 =hash('sha256',$string);
        $finalXHeader = $sha256."###".$saltIndex;
    
        $response = Curl::to('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay')
        // $response = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/pay')
                    ->withHeader('Content-Type:application/json')
                    ->withHeader('X-VERIFY:'.$finalXHeader)
                    ->withData(json_encode(['request' =>$encode]))
                    ->post();

        dd(json_decode($response));
         
    }
    public function response(Request $request){
        $input = $request->all();
        dd($input);
    }
}
