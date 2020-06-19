<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;


class SMSController extends Controller
{
    public function SMSForm(){
        return view('sms');
    }

    public function SendSMS(Request $request){


        Nexmo::message()->send([
            'to'   => '88'.$request->phone_number,
            'from' => '01636737279',
            'text' => 'NEXMO TEST SMS.'
        ]);


        return redirect()->back();
    }
}
