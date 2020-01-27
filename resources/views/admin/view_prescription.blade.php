@extends('admin.home')
@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">View Appointment And Prescription Details</h3>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Doctor's Information</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Doctor Name</th>
                            <td>{{ $details->full_name }}</td>
                        </tr>
                        <tr>
                            <th>Academic ID</th>
                            <td>{{ $details->specialize_name }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-white">
                <div class="panel-body">
                    <img src="" alt="" height="125" width="145">
                </div>
            </div>
        </div>

    </div><!-- Row -->

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Patient's Information</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Academic ID</th>
                            <td>{{ $details->institute_id }}</td>
                        </tr>
                        <tr>
                            <th>Patient Name</th>
                            <td>{{ $details->name }}</td>
                        </tr>
                        <tr>
                            <th>Patient Phone Number</th>
                            <td>{{ $details->phone }}</td>
                        </tr>
                        <tr>
                            <th>Patient Gender</th>
                            <td>{{ strtoupper($details->gender) }}</td>
                        </tr>
                        <tr>
                            <th>Patient Blood Gr</th>
                            <td>{{ $details->blood_group }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-white">
                <div class="panel-body">
                    <img src="" alt="" height="125" width="145">
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-white">
        <div class="row">
            <div class="col-md-6">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Patient Problem Query</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <textarea class="form-control" rows="1" readonly>{{ $details->problem_desc }}</textarea>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Problem Identified By Doctor</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <tr>
                            <textarea class="form-control" rows="1" readonly>{{ $details->problem }}</textarea>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Patient's Initial Treatment</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <tr>
                            <th>Weight</th>
                            <th>Body Temperature</th>
                            <th>Blood Pressure</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" value="{{ $details->weight }}" readonly></td>
                            <td><input type="text" class="form-control" value="{{ $details->body_temperature }}" readonly></td>
                            <td><input type="text" class="form-control" value="{{ $details->blood_pressure }}" readonly></td>
                        </tr>
                        <tr>
                            <th>WBC</th>
                            <th>RBC</th>
                            <th>HGB</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" value="{{ $details->wbc }}" readonly></td>
                            <td><input type="text" class="form-control" value="{{ $details->rbc }}" readonly></td>
                            <td><input type="text" class="form-control" value="{{ $details->hgb }}" readonly></td>
                        </tr>
                        <tr>
                            <th>Blood Suger</th>
                            <th colspan="2">Other Test Report(s)</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" value="{{ $details->blood_suger }}" readonly></td>
                            <td colspan="2"><textarea class="form-control" readonly>{{ $details->others }}</textarea>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Pending Test(s):</th>
                            <td><textarea class="form-control" readonly>{{ $details->new_test_name }}</textarea></td>
                        </tr>
                    </table>
                </div>
            </div>
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
                                <td> <input type="text" value="{{ $details->mdc_name_one }}" class="form-control" readonly> </td>
                                <td><input type="text" class="form-control" value="{{ $details->mdc_dose_one }}" data-role="tagsinput" readonly></td>
                                <td><input type="text" class="form-control" value="{{ $details->mdc_dur_one }}" data-role="tagsinput" readonly></td>
                            </tr>
                            <tr>
                                <td> <h4>Two:</h4> </td>
                                <td> <input type="text" class="form-control" value="{{ $details->mdc_name_two }}" readonly> </td>
                                <td><input type="text" class="form-control" value="{{ $details->mdc_dose_two }}" data-role="tagsinput" readonly></td>
                                <td><input type="text" class="form-control" value="{{ $details->mdc_dur_two }}" data-role="tagsinput" readonly></td>
                            </tr>
                            <tr>
                                <td> <h4>Three:</h4> </td>
                                <td> <input type="text" class="form-control" value="{{ $details->mdc_name_three }}" readonly> </td>
                                <td><input type="text" class="form-control" value="{{ $details->mdc_dose_three }}" data-role="tagsinput" readonly></td>
                                <td><input type="text" class="form-control" value="{{ $details->mdc_dur_three }}" data-role="tagsinput" readonly></td>
                            </tr>
                            <tr>
                                <td> <h4>Four:</h4> </td>
                                <td> <input type="text" class="form-control" value="{{ $details->mdc_name_four }}" readonly> </td>
                                <td><input type="text" class="form-control" value="{{ $details->mdc_dose_four }}" data-role="tagsinput" readonly></td>
                                <td><input type="text" class="form-control" value="{{ $details->mdc_dur_four }}" data-role="tagsinput" readonly></td>
                            </tr>
                            <tr>
                                <td> <h4>Five:</h4> </td>
                                <td> <input type="text" class="form-control" value="{{ $details->mdc_name_five }}" readonly> </td>
                                <td><input type="text" class="form-control" value="{{ $details->mdc_dose_five }}" data-role="tagsinput" readonly></td>
                                <td><input type="text"  class="form-control" value="{{ $details->mdc_dur_five }}" data-role="tagsinput" readonly></td>
                            </tr>
                            <tr>
                                <td> <h4>Extra(s):</h4> </td>
                                <td colspan="3"> <textarea rows="1" class="form-control" readonly>{{ $details->extra_mdc }}</textarea> </td>
                            </tr>
                        </table>

                    </div>
            </div>
        </div>
    </div>

</div><!-- Main Wrapper -->



<div>
    <a href="{{ route('admin.manage.appointments') }}" style="float: right; margin: 0 30px 30px 0;" class="btn btn-primary">Back To List</a>
</div>

@endsection
