@extends('doctor.home')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

<style media="screen">
    .btn_mdle{
        margin-left: 40%;
    }
</style>


<div class="page-title">
    <h3 class="breadcrumb-header">Manage Patients And Prescrptions</h3>
</div>
<div id="main-wrapper">
    <form action="{{ url('prescribe/patient/'.$patient->id) }}" method="post">
        @csrf
        <input type="hidden" name="appoint_id" value="{{ $patient->id }}">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Patient Information</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Academic ID</th>
                                <td>{{ $patient->institute_id }}</td>
                            </tr>
                            <tr>
                                <th>Patient Name</th>
                                <td>{{ $patient->name }}</td>
                            </tr>
                            <tr>
                                <th>Patient Phone Number</th>
                                <td>{{ $patient->phone }}</td>
                            </tr>
                            <tr>
                                <th>Patient Gender</th>
                                <td>{{ strtoupper($patient->gender) }}</td>
                            </tr>
                            <tr>
                                <th>Patient Blood Gr</th>
                                <td>{{ $patient->blood_group }}</td>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Patient Problem</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <textarea class="form-control" rows="1" readonly disabled>{{ $patient->problem_desc }}</textarea>
                            </tr>
                        </table>

                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Doctor's Input</h4>
                        </div>
                            <table class="table table-striped">
                                <tr>
                                    <textarea name="problem" class="form-control"></textarea>
                                </tr>
                            </table>

                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Basic Test Reports</h4>
                    </div>
                    <div class="panel-body">

                            <table class="table table-bordered">
                                <tr>
                                    <th>Weight</th>
                                    <th>Body Temperature</th>
                                    <th>Blood Pressure</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="weight" class="form-control" placeholder="patient weight"></td>
                                    <td><input type="text" name="body_temperature" class="form-control" placeholder="patient boody temperature"></td>
                                    <td><input type="text" name="blood_pressure" class="form-control"  placeholder="patient blood pressure rate"></td>
                                </tr>
                                <tr>
                                    <th>WBC</th>
                                    <th>RBC</th>
                                    <th>HGB</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="wbc" class="form-control"  placeholder="patient wbc range"></td>
                                    <td><input type="text" name="rbc" class="form-control" placeholder="patient rbc range"></td>
                                    <td><input type="text" name="hgb" class="form-control" placeholder="patient hgb range"></td>
                                </tr>
                                <tr>
                                    <th>Blood Suger</th>
                                    <th colspan="2">Other Test Report(s)</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="blood_suger" class="form-control" placeholder="patient blood suger rate"></td>
                                    <td colspan="2"><textarea name="others" class="form-control" placeholder="other test reports"></textarea>
                                </tr>
                            </table>

                    </div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <tr>
                                <th>New Test(s):</th>
                                <td><textarea name="new_test_name" class="form-control"></textarea></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="panel panel-white">
                            <div class="panel-heading clearfix">
                                <h4 class="panel-title">Medicine(s)</h4>
                            </div>
                            <div class="panel-body">

                                <table class="table table-responsive table-stripped">

                                    <tr>
                                        <td>#MD</td>
                                        <td>Name</td>
                                        <td>Doses</td>
                                        <td>Durations</td>
                                    </tr>
                                    <tr>
                                        <td> <h4>One:</h4> </td>
                                        <td> <input type="text" name="mdc_name_one" class="form-control"> </td>
                                        <td><input type="text" name="mdc_dose_one" class="form-control" data-role="tagsinput"></td>
                                        <td><input type="text" name="mdc_dur_one" class="form-control" data-role="tagsinput"></td>
                                    </tr>
                                    <tr>
                                        <td> <h4>Two:</h4> </td>
                                        <td> <input type="text" name="mdc_name_two" class="form-control"> </td>
                                        <td><input type="text" name="mdc_dose_two" class="form-control" data-role="tagsinput"></td>
                                        <td><input type="text" name="mdc_dur_two" class="form-control" data-role="tagsinput"></td>
                                    </tr>
                                    <tr>
                                        <td> <h4>Three:</h4> </td>
                                        <td> <input type="text" name="mdc_name_three" class="form-control"> </td>
                                        <td><input type="text" name="mdc_dose_three" class="form-control" data-role="tagsinput"></td>
                                        <td><input type="text" name="mdc_dur_three" class="form-control" data-role="tagsinput"></td>
                                    </tr>
                                    <tr>
                                        <td> <h4>Four:</h4> </td>
                                        <td> <input type="text" name="mdc_name_four" class="form-control"> </td>
                                        <td><input type="text" name="mdc_dose_four" class="form-control" data-role="tagsinput"></td>
                                        <td><input type="text" name="mdc_dur_four" class="form-control" data-role="tagsinput"></td>
                                    </tr>
                                    <tr>
                                        <td> <h4>Five:</h4> </td>
                                        <td> <input type="text" name="mdc_name_five" class="form-control"> </td>
                                        <td><input type="text" name="mdc_dose_five" class="form-control" data-role="tagsinput"></td>
                                        <td><input type="text" name="mdc_dur_five" class="form-control" data-role="tagsinput"></td>
                                    </tr>
                                    <tr>
                                        <td> <h4>Extra(s):</h4> </td>
                                        <td colspan="3"> <textarea name="extra_mdc" rows="1" class="form-control"></textarea> </td>
                                    </tr>
                                </table>

                                <div class="btn_mdle">
                                    <button type="submit" class="btn btn-success">Submit Prescrption</button>
                                </div>


                            </div>
                    </div>
                </div>
            </div>

            <div>
                <a href="{{ route('manage.appointment') }}" class="btn btn-primary">Back</a>
            </div>
        </div><!-- Row -->
    </form>
</div><!-- Main Wrapper -->


<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

@endsection
