<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

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
        ->where('doctors.status',1)
        ->get();
        return view('patients.book_appoint',compact('specialize','doc'));
    }

    public function getDoctorName($specialize_id){
        $doctor = DB::table('doctors')->where('specialize_id',$specialize_id)->where('status',1)->get();
        return json_encode($doctor);
    }


    public function bookAppointment(Request $request){
        $validatedData = $request->validate([
            'specialize_id' => 'required',
            'doctor_id' => 'required',
            'appoint_date' => 'required',
        ]);

        $data = array();
        $data['patient_id'] = $request->patient_id;
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

    public function medicalHistory(){
        $id = Auth::user()->id;
        $view = DB::table('appointments')
                ->join('doctors','appointments.doctor_id','doctors.id')
                ->select('appointments.*','doctors.full_name')
                ->where('appointments.status',2)
                ->where('appointments.patient_id',$id)->get();
        return view('patients.medical_history',compact('view'));
    }

    public function viewDetails($id){
        $details = DB::table('appointments')
                ->join('doctors','appointments.doctor_id','doctors.id')
                ->join('initial_tests','appointments.id','initial_tests.appoint_id')
                ->join('problem_descs','appointments.id','problem_descs.appoint_id')
                ->join('treatments','appointments.id','treatments.appoint_id')
                ->select(
                    'appointments.*',
                    'initial_tests.body_temperature','initial_tests.blood_pressure','initial_tests.blood_suger','initial_tests.weight','initial_tests.wbc','initial_tests.rbc','initial_tests.hgb','initial_tests.others',
                    'problem_descs.problem','treatments.new_test_name','treatments.mdc_name_one','treatments.mdc_dose_one','treatments.mdc_dur_one', 'treatments.mdc_name_two','treatments.mdc_dose_two','treatments.mdc_dur_two','treatments.mdc_name_three','treatments.mdc_dose_three','treatments.mdc_dur_three','treatments.mdc_name_four','treatments.mdc_dose_four','treatments.mdc_dur_four','treatments.mdc_name_five','treatments.mdc_dose_five','treatments.mdc_dur_five','treatments.extra_mdc')
                ->where('appointments.id',$id)->first();

        return view('patients.view_details',compact('details'));
    }
}
