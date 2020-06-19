<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\SendMails;
use Illuminate\Http\Request;
use DB;
use Hash;
use Mail;
use App\Mail\EmergencyBloodMail;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    ///users and patients

    public function pendingUsers(){
        $pending = DB::table('users')->where('status',0)->get();
        return view('admin.pending_user',compact('pending'));
    }

    public function approveUser($id){
        DB::table('users')->where('id',$id)->update(['status' => 1]);

        $notification = array(
                'messege' => 'User Request Approved',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    public function rejectUser($id){
        DB::table('users')->where('id',$id)->update(['status' => 0]);

        $notification = array(
                'messege' => 'User Request Rejected',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
    }

    public function allUsers(){
        $all = DB::table('users')->where('status',1)->get();
        return view('admin.members',compact('all'));
    }




    //doctors

    public function AllSpecialize(){
        $spec = DB::table('specializes')->get();
        return view('admin.specialize',compact('spec'));
    }

    public function AddSpecialize(Request $request){
        $validatedData = $request->validate([
            'specialize_name' => 'required|unique:specializes',
        ]);

        $data = array(
            'specialize_name' => $request->specialize_name
    );

        DB::table('specializes')->insert($data);
        $notification = array(
            'messege' => 'Specialize Added Successfull',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function AddNewDoctor(){
        $spec = DB::table('specializes')->where('status',1)->get();
        return view('admin.add_doctor', compact('spec'));
    }

    public function StoreDoctor(Request $request){
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:doctors',
            'phone' => 'required',
            'specialize_id' => 'required',
            'password' => 'required',
        ]);

        $data = array();
        $data['full_name'] = $request->full_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['specialize_id'] = $request->specialize_id;
        $data['consult_days'] = $request->consult_days;
        $data['consult_start'] = $request->consult_start;
        $data['consult_end'] = $request->consult_end;
        $data['password'] = Hash::make($request->password);

        DB::table('doctors')->insert($data);
        $notification = array(
            'messege' => 'Doctor Added Successfull',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    //all doctors
    public function AllDoctors(){
        $doctors = DB::table('doctors')
                ->join('specializes','doctors.specialize_id','specializes.id')
                ->select('doctors.*','specializes.specialize_name')
                ->where('doctors.status', 1)
                ->get();

        $resign = DB::table('doctors')
                ->join('specializes','doctors.specialize_id','specializes.id')
                ->select('doctors.*','specializes.specialize_name')
                ->where('doctors.status', 0)
                ->get();
        return view('admin.all_doctor',compact('doctors','resign'));
    }

    public function ViewDoctorDetails($id){
        $doctor = DB::table('doctors')
                ->join('specializes','doctors.specialize_id','specializes.id')
                ->select('doctors.*','specializes.specialize_name')
                ->where('doctors.id',$id)
                ->first();
        return view('admin.view_doctor',compact('doctor'));
    }

    public function EditDoctorDetails($id){
        $doctor = DB::table('doctors')
                ->join('specializes','doctors.specialize_id','specializes.id')
                ->select('doctors.*','specializes.specialize_name')
                ->where('doctors.id',$id)
                ->first();
        return view('admin.edit_doctor',compact('doctor'));
    }

    public function updateDoctor(Request $request, $id){
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'consult_days' => 'required',
            'consult_start' => 'required',
            'consult_end' => 'required',
        ]);
        $data = array();
        $data['full_name'] = $request->full_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['consult_days'] = $request->consult_days;
        $data['consult_start'] = $request->consult_start;
        $data['consult_end'] = $request->consult_end;

        DB::table('doctors')->where('id',$id)->update($data);
        $notification = array(
            'messege' => 'Doctor Info Updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function DeleteDoctor($id){
        DB::table('doctors')->where('id',$id)->update(['status'=>0]);
        $notification = array(
            'messege' => 'Doctor Removed',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    public function RejoinDoctor($id){
        DB::table('doctors')->where('id',$id)->update(['status'=>1]);
        $notification = array(
            'messege' => 'Doctor Rejoined Success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function ManageAllAppointments(){
        $doc = DB::table('doctors')->join('specializes','doctors.specialize_id','specializes.id')->select('doctors.*','specializes.specialize_name')
        ->where('doctors.status',1)
        ->get();

        $appoints = DB::table('appointments')
                    ->join('users','appointments.patient_id','users.id')
                    ->join('specializes','appointments.specialize_id','specializes.id')
                    ->join('doctors','appointments.doctor_id','doctors.id')
                    ->select('appointments.*','users.institute_id','specializes.specialize_name','doctors.full_name')
                    ->get();

        return view('admin.appointments',compact('doc','appoints'));
    }

    public function ViewPatientAppoint($id){
        $viewApp = DB::table('appointments')
                    ->join('doctors','appointments.doctor_id','doctors.id')
                    ->join('specializes','appointments.specialize_id','specializes.id')
                    ->join('users','appointments.patient_id','users.id')
                    ->select('appointments.*','doctors.full_name','doctors.email','doctors.phone','doctors.doctor_photo','specializes.specialize_name','users.name','users.institute_id','users.email','users.phone','users.gender','users.blood_group','users.user_photo')
                    ->where('appointments.id',$id)
                    ->first();
        return view('admin.view_patient_appoint',compact('viewApp'));
    }


    public function ViewPatientPrescription($id){
        $details = DB::table('appointments')
                ->join('doctors','appointments.doctor_id','doctors.id')
                ->join('specializes','appointments.specialize_id','specializes.id')
                ->join('users','appointments.patient_id','users.id')
                ->join('initial_tests','appointments.id','initial_tests.appoint_id')
                ->join('problem_descs','appointments.id','problem_descs.appoint_id')
                ->join('treatments','appointments.id','treatments.appoint_id')
                ->select(
                    'appointments.*', 'doctors.full_name','specializes.specialize_name',
                    'users.name','users.institute_id','users.phone','users.email','users.blood_group','users.gender',
                    'initial_tests.body_temperature','initial_tests.blood_pressure','initial_tests.blood_suger','initial_tests.weight','initial_tests.wbc','initial_tests.rbc','initial_tests.hgb','initial_tests.others',
                    'problem_descs.problem','treatments.new_test_name','treatments.mdc_name_one','treatments.mdc_dose_one','treatments.mdc_dur_one', 'treatments.mdc_name_two','treatments.mdc_dose_two','treatments.mdc_dur_two','treatments.mdc_name_three','treatments.mdc_dose_three','treatments.mdc_dur_three','treatments.mdc_name_four','treatments.mdc_dose_four','treatments.mdc_dur_four','treatments.mdc_name_five','treatments.mdc_dose_five','treatments.mdc_dur_five','treatments.extra_mdc')
                ->where('appointments.id',$id)->first();

        return view('admin.view_prescription',compact('details'));
    }

    public function BloodDonorsList(){
        $req = DB::table('blood_donors')->where('status',0)->get();
        $done = DB::table('blood_donors')->where('status',1)->get();

        return view('admin.blood_donors',compact('req','done'));
    }

    public function MailToDonate($id){
        $email = DB::table('blood_donors')->where('id',$id)->first();
        //return view('admin.donation_mail',compact('email'));
        $notification = array(
            'messege' => 'Mail Send To Donor',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function bloodDonated($id){
        DB::table('blood_donors')->where('id',$id)->update(['status'=>1]);
        $notification = array(
            'messege' => 'Moved to Donated List',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeleteDonor($id){
        DB::table('blood_donors')->where('id',$id)->delete();
        $notification = array(
            'messege' => 'Donor Deleted From List',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

    public function EmergencyCheckBlood(){
        $emrg = DB::table('emergency_bloods')->where('status',0)->get();
        return view('admin.emergency_blood',compact('emrg'));
    }

    public function MailForEmergency($blood){
        $blood = DB::table('blood_donors')
        ->join('emergency_bloods','blood_donors.blood_group','emergency_bloods.req_blood_group')
        ->select('blood_donors.*','emergency_bloods.req_from_number')
        ->where('blood_donors.blood_group',$blood)->get();
        //return response()->json($blood);
        $notification = array(
            'messege' => 'Mail Send To Donors',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

        // foreach($blood as $donor){
        //     Mail::to($donor->donor_email)->send(new EmergencyBloodMail($donor));
        // }


    }

    public function RemoveRequest($id){
        DB::table('emergency_bloods')->where('id',$id)->delete();
        $notification = array(
            'messege' => 'Request Removed From List',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }



    public function sendToDonor(){
        {
            $donors = DB::table('blood_donors')->first();
            $SendDonors = [
                'greeting' => 'Hi Artisan',
                'body' => 'This is my first notification from ItSolutionStuff.com',
                'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',
                'actionText' => 'View My Site',
                'actionURL' => url('/'),
            ];
            Notification::send($donors, new SendMails($SendDonors));
            dd('done');
        }
    }
}
