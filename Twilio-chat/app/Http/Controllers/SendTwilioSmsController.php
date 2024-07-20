<?php

namespace App\Http\Controllers;
use Twilio\Rest\Client;

use Illuminate\Http\Request;

class SendTwilioSmsController extends Controller
{
    public function sendSmsView(){
        return view('sendSmsView');
    }

    public function sendSms(){

        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $fromNumber = getenv('TWILIO_PHONE_NUMBER');

        request()->validate([
            'number' => 'required',
            'message' => 'required',
        ]);

        $toNumber = request('number');
        $messageTo = request('message'); 

        $twilio = new Client($sid, $token);

        try{

            $message = $twilio->messages->create(
               $toNumber, // to
                [
                    "body" =>
                        $messageTo,
                    "from" => $fromNumber,
                ]
            );
    
            return redirect()->route('sendSmsView')->with('message','Message sent successfully');
        }
        catch(\Exception $e){
            $errorMessage = $e->getMessage();
            return redirect()->route('sendSmsView')->with('error',$errorMessage);

        }
    }
}
