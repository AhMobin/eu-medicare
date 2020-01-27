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
        $patient = DB::table('appointments')
            ->join('users','appointments.patient_id','users.id')
            ->select('appointments.*','users.name','users.phone','users.email','users.institute_id','users.blood_group','users.gender')
            ->where('appointments.id',$id)->first();

        return view('doctor.prescribe_patient',compact('patient'));
    }



    public function PrescriptionStore(Request $request, $id){
        $validatedData = $request->validate([
            'problem' => 'required',
        ]);

        $problem = array();
        $problem['appoint_id'] = $request->appoint_id;
        $problem['problem'] = $request->problem;

        $prb = DB::table('problem_descs')->insert($problem);


        $test = array();
        $test['appoint_id'] = $request->appoint_id;
        $test['weight'] = $request->weight;
        $test['body_temperature'] = $request->body_temperature;
        $test['blood_pressure'] = $request->blood_pressure;
        $test['wbc'] = $request->wbc;
        $test['rbc'] = $request->rbc;
        $test['hgb'] = $request->hgb;
        $test['blood_suger'] = $request->blood_suger;
        $test['others'] = $request->others;

        $int_test = DB::table('initial_tests')->insert($test);


        $treat = array();
        $treat['appoint_id'] = $request->appoint_id;
        $treat['new_test_name'] = $request->new_test_name;
        $treat['mdc_name_one'] = $request->mdc_name_one;
        $treat['mdc_dose_one'] = $request->mdc_dose_one;
        $treat['mdc_dur_one'] = $request->mdc_dur_one;
        $treat['mdc_name_two'] = $request->mdc_name_two;
        $treat['mdc_dose_two'] = $request->mdc_dose_two;
        $treat['mdc_dur_two'] = $request->mdc_dur_two;
        $treat['mdc_name_three'] = $request->mdc_name_three;
        $treat['mdc_dose_three'] = $request->mdc_dose_three;
        $treat['mdc_dur_three'] = $request->mdc_dur_three;
        $treat['mdc_name_four'] = $request->mdc_name_four;
        $treat['mdc_dose_four'] = $request->mdc_dose_four;
        $treat['mdc_dur_four'] = $request->mdc_dur_four;
        $treat['mdc_name_five'] = $request->mdc_name_five;
        $treat['mdc_dose_five'] = $request->mdc_dose_five;
        $treat['mdc_dur_five'] = $request->mdc_dur_five;
        $treat['extra_mdc'] = $request->extra_mdc;

        $trt = DB::table('treatments')->insert($treat);

        $appoint_update = DB::table('appointments')->where('id',$id)->update(['status' => 2]);

        $notification = array(
            'messege' => 'Prescrption Done',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }



    public function DeletePatient($id){
        DB::table('appointments')->where('id',$id)->update(['status'=> 3]);//moved to follow up

        $notification = array(
            'messege' => 'Patient Removed From Appoint List',
            'alert-type' => 'warning',
        );
        return Redirect()->back()->with($notification);
    }

    public function AppointmentHistory(){
        $id = Auth::guard()->id();
        $history = DB::table('appointments')
                ->join('users','appointments.patient_id','users.id')
                ->select('appointments.*','users.institute_id')
                ->where('appointments.status',2)
                ->where('appointments.doctor_id',$id)->get();

        return view('doctor.appoint_history',compact('history'));
    }

    public function appointmentDetails($id){
        $details = DB::table('appointments')
                ->join('users','appointments.patient_id','users.id')
                ->join('initial_tests','appointments.id','initial_tests.appoint_id')
                ->join('problem_descs','appointments.id','problem_descs.appoint_id')
                ->join('treatments','appointments.id','treatments.appoint_id')
                ->select(
                    'appointments.*',
                    'users.name','users.institute_id','users.phone','users.email','users.blood_group','users.gender',
                    'initial_tests.body_temperature','initial_tests.blood_pressure','initial_tests.blood_suger','initial_tests.weight','initial_tests.wbc','initial_tests.rbc','initial_tests.hgb','initial_tests.others',
                    'problem_descs.problem','treatments.new_test_name','treatments.mdc_name_one','treatments.mdc_dose_one','treatments.mdc_dur_one', 'treatments.mdc_name_two','treatments.mdc_dose_two','treatments.mdc_dur_two','treatments.mdc_name_three','treatments.mdc_dose_three','treatments.mdc_dur_three','treatments.mdc_name_four','treatments.mdc_dose_four','treatments.mdc_dur_four','treatments.mdc_name_five','treatments.mdc_dose_five','treatments.mdc_dur_five','treatments.extra_mdc')
                ->where('appointments.id',$id)->first();

                return view('doctor.view_app_details',compact('details'));
    }
}
