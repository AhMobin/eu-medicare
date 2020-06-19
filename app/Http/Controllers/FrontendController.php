<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{

    //emergency blood request
    public function EmergencyBlood(Request $request){
        $validatedData = $request->validate([
            'req_blood_group' => 'required',
            'req_from_number' => 'required',
            'patient_location' => 'required',
        ]);

        $data = array();
        $data['req_blood_group'] = strtolower($request->req_blood_group);
        $data['req_from_number'] = $request->req_from_number;
        $data['patient_location'] = $request->patient_location;

        DB::table('emergency_bloods')->insert($data);
        $notification = array(
            'messege' => 'We Will Notify Our Donors ASAP.',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


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
        $data['blood_group'] = strtolower($request->blood_group);

        DB::table('blood_donors')->insert($data);
        $notification = array(
            'messege' => 'Thank You For Become A Donor. We Will Contact You',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
