<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    //blood Donation
    public function BloodDonation(Request $request){
        $validatedData = $request->validate([
            'donor_id' => 'required',
            'donor_name' => 'required',
            'donor_phone' => 'required',
            'donor_email' => 'required|email',
            'blood_group' => 'required',
        ]);

        $data = array();
        $data['donor_id'] = $request->donor_id;
        $data['donor_name'] = $request->donor_name;
        $data['donor_phone'] = $request->donor_phone;
        $data['donor_email'] = $request->donor_email;
        $data['blood_group'] = $request->blood_group;

        DB::table('blood_donors')->insert($data);
        $notification = array(
            'messege' => 'Thank You For Become A Donor. We Will Contact You',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
