<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\DonorMail;
use DB;

class MailController extends Controller
{
    public function MailToDonate($id){
        $donor_mail = DB::table('blood_donors')->where('id',$id)->first();
        {
            $details = [
                'title' => 'Title: Mail For Donate Your Blood',
                'body' => 'Body: We arranged a blood donation campaign on (this date). We noticed that you are an interested to donate blood. So come on to donate on this date at 10 AM. Thank You.'
            ];

            \Mail::to($donor_mail->donor_email)->send(new DonorMail($details));

            $notification = array(
                    'messege' => 'Sent Mail To Donor',
                    'alert-type' => 'success'
                );
            return Redirect()->back()->with($notification);
        }
    }
}
