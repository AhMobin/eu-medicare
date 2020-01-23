<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;

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
}
