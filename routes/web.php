<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.template');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

///for admin
Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\Admin\AdminLoginController@login')->name('admin.login.submit');
    Route::post('logout/', 'Auth\Admin\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
}) ;

//for doctor
Route::prefix('doctor')->group(function() {
    Route::get('/login','Auth\Doctor\DoctorLoginController@showLoginForm')->name('doctor.login');
    Route::post('/login', 'Auth\Doctor\DoctorLoginController@login')->name('doctor.login.submit');
    Route::post('logout/', 'Auth\Doctor\DoctorLoginController@logout')->name('doctor.logout');
    Route::get('/', 'Doctor\DoctorController@index')->name('doctor.dashboard');
}) ;



//send sms
Route::get('sms/form','SMSController@SMSForm');
Route::post('sms','SMSController@SendSMS')->name('send.sms');



///********
/// Front-end
///****************

//emergency blood request
Route::post('emergency/blood','FrontendController@EmergencyBlood')->name('emergency.blood');
//blood donation
Route::post('blood/donation/registration','FrontendController@BloodDonation')->name('blood.donation');


///**********************
/// Admin Panel - Backend
///**************************

///users & patients

//pending user
Route::get('manage/new/users/','Admin\AdminController@pendingUsers')->name('pending.users');
//approve pending user
Route::get('approve/user/request/{id}','Admin\AdminController@approveUser');
//reject pending user
Route::get('reject/user/request/{id}','Admin\AdminController@rejectUser');
//all approved members
Route::get('members/','Admin\AdminController@allUsers')->name('approved.users');


///doctors

//all specialize
Route::get('all/specialize','Admin\AdminController@AllSpecialize')->name('all.specialize');
//add specialize
Route::post('add/new/specialize','Admin\AdminController@AddSpecialize')->name('add.specialize');


//add doctor
Route::get('add/new/doctor','Admin\AdminController@AddNewDoctor')->name('add.doctor');
//add specialize
Route::post('doctor/added','Admin\AdminController@StoreDoctor')->name('store.doctor');
//all doctors
Route::get('all/doctors','Admin\AdminController@AllDoctors')->name('all.doctors');
//view doctor infos
Route::get('view/doctor/details/{id}','Admin\AdminController@ViewDoctorDetails');
//edit doctor infos
Route::get('edit/doctor/details/{id}','Admin\AdminController@EditDoctorDetails');
//update doctor infos
Route::post('update/doctor/info/{id}','Admin\AdminController@updateDoctor');
//delete doctor
Route::get('delete/doctor/{id}','Admin\AdminController@DeleteDoctor');
//rejoining doctor
Route::get('rejoin/doctor/{id}','Admin\AdminController@RejoinDoctor');

//manage appointments
Route::get('manage/all/appointments','Admin\AdminController@ManageAllAppointments')->name('admin.manage.appointments');
//view appoint
Route::get('view/patient/query/{id}','Admin\AdminController@ViewPatientAppoint');
//view visited patient infos
Route::get('view/patient/prescribed/info/{id}','Admin\AdminController@ViewPatientPrescription');


//blood donors
Route::get('blood/donors','Admin\AdminController@BloodDonorsList')->name('requested.donors');
//emergency requests
Route::get('requested/emergency/blood/','Admin\AdminController@EmergencyCheckBlood')->name('emergency.requests');
//mail to donors
Route::get('mail/to/donors/{req_blood_group}','Admin\AdminController@MailForEmergency');
//Remove Requst From List
Route::get('remove/request/{id}','Admin\AdminController@RemoveRequest');
//mail to donor
Route::get('mail/for/donation/{id}','Admin\AdminController@MailToDonate');


//donation completed
Route::get('donated/blood/{id}','Admin\AdminController@bloodDonated');
//donor deleted
Route::get('delete/donor/{id}','Admin\AdminController@DeleteDonor');


//send mail
//mail to donor
Route::get('send', 'Admin\AdminController@sendToDonor');


//**********
//* Patients & Users Panel
////*************************

Route::get('book/new/appointment','HomeController@bookAppoint')->name('book.appointment');
//get doctor name for specialized by ajax
Route::get('get/doctor/name/{specialize_id}','HomeController@getDoctorName');
//book appointment
Route::post('book/appointment','HomeController@bookAppointment')->name('book.patient.appoint');
//medical history
Route::get('patient/medical/history/','HomeController@medicalHistory')->name('patient.medical.history');
//view appointment details
Route::get('view/appointment/details/{id}','HomeController@viewDetails');


//**********
//* Doctor Panel
////*************************

//pending appointments
Route::get('pending/appointments','Doctor\DoctorController@pendingAppointment')->name('pending.appointment');
//pending appointment approve
Route::get('appoint/approve/{id}','Doctor\DoctorController@approveAppointment');
//pending appointment follow-up
//**when doctor do follow up an appointment then admin will confirm to patient for further appointment date
Route::get('appoint/follow/up/{id}','Doctor\DoctorController@followUpAppointment');
//manage appointment
Route::get('manage/doctor/appointments','Doctor\DoctorController@ManageAppoints')->name('manage.appointment');
///prescribe patients
Route::get('prescribe/patient/{id}','Doctor\DoctorController@PrescribeNow');
//prescription stored
Route::post('prescribe/patient/{id}','Doctor\DoctorController@PrescriptionStore');

Route::get('delete/patient/list/{id}','Doctor\DoctorController@DeletePatient');

///appointment history
Route::get('appointment/history/list','Doctor\DoctorController@AppointmentHistory')->name('appointment.history');
//view appointment details
Route::get('view/appoint/history/{id}','Doctor\DoctorController@appointmentDetails');
