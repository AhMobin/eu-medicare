<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('patients.index');
    }


    public function bookAppoint(){
        $specialize = DB::table('specializes')->get();
        $doc = DB::table('doctors')->join('specializes','doctors.specialize_id','specializes.id')->select('doctors.*','specializes.specialize_name')
        ->get();
        return view('patients.book_appoint',compact('specialize','doc'));
    }

    public function getDoctorName($specialize_id){
        $doctor = DB::table('doctors')->where('specialize_id',$specialize_id)->get();
        return json_encode($doctor);
    }


    public function bookAppointment(Request $request){
        $validatedData = $request->validate([
            'specialize_id' => 'required',
            'doctor_id' => 'required',
            'appoint_date' => 'required',
        ]);

        $app_id = hexdec(uniqid());

        $data = array();
        $data['patient_id'] = $request->patient_id;
        $data['appoint_id'] = $app_id;
        $data['specialize_id'] = $request->specialize_id;
        $data['doctor_id'] = $request->doctor_id;
        $data['appoint_date'] = $request->appoint_date;
        $data['problem_desc'] = $request->problem_desc;

        DB::table('appointments')->insert($data);
        $notification = array(
            'messege' => 'Appoint Booked Successfull',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
