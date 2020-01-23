<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:doctor');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doctor.index');
    }


    public function pendingAppointment(){
        $appoints = DB::table('appointments')->where('doctor_id',Auth::guard()->id())->where('status',0)->get();
        return view('doctor.pending_appoints',compact('appoints'));
    }

    public function approveAppointment($id){
        DB::table('appointments')->where('id',$id)->update(['status' => 1]);
        $notification = array(
            'messege' => 'Appointment Aproved Successfull',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function followUpAppointment($id){
        DB::table('appointments')->where('id',$id)->update(['status' => 3]);
        $notification = array(
            'messege' => 'Appointment Follow-up',
            'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notification);
    }

    public function ManageAppoints(){
        $approved = DB::table('appointments')->where('doctor_id',Auth::guard()->id())->where('status',1)->get();
        $follow = DB::table('appointments')->where('doctor_id',Auth::guard()->id())->where('status',3)->get();

        return view('doctor.manage_appoints',compact('approved','follow'));
    }

    public function PrescribeNow($id){
        $patient = DB::table('users')
            ->join('appointments','users.institute_id','appointments.patient_id')
            ->select('users.*','appointments.appoint_id')
            ->where('users.id',$id)->first();
        return view('doctor.prescribe_patient',compact('patient'));
    }

    public function InitialTest(Request $request){
        $data = array();
        $data['patient_id'] = $request->patient_id;
        $data['weight'] = $request->weight;
        $data['boody_temperature'] = $request->boody_temperature;
        $data['blood_pressure'] = $request->blood_pressure;
        $data['blood_suger'] = $request->blood_suger;
        $data['other_reports'] = $request->other_reports;

        $inputTest = DB::table('initial_tests')->insert($data);

        $notification = array(
            'messege' => 'Initial Test Reports Inserted',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }

    public function PatientProblem(Request $request){
        $data = array();
        $docID = Auth::guard()->id();
        $data['doctor_id'] = $docID;
        $data['patient_id'] = $request->patient_id;
        $data['patient_problem_desc'] = $request->patient_problem_desc;

        $inputProblem = DB::table('problem_descriptions')->insert($data);

        $notification = array(
            'messege' => 'Patient Problems Inputed',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }

    public function PatientTreatment(Request $request){
        $data = array();
        $data['patient_id'] = $request->patient_id;
        $data['new_test_name'] = $request->new_test_name;
        $data['medicines_name'] = $request->medicines_name;

        $inputTreatment = DB::table('treatments')->insert($data);

        $notification = array(
            'messege' => 'Patient Prescriptions Inputed',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }

    public function DeletePatient($patient_id){
        DB::table('appointments')->where('patient_id',$patient_id)->update(['status'=> 2]);

        $notification = array(
            'messege' => 'Patient Removed From Appoint List',
            'alert-type' => 'warning',
        );
        return Redirect()->back()->with($notification);
    }

    public function AppointmentHistory(){
        return view('doctor.appoint_history');
    }
}
