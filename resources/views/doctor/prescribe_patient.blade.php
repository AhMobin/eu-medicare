@extends('doctor.home')
@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">Manage Patients And Prescrptions</h3>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Patient Information</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Appoint ID</th>
                            <td>{{ $patient->appoint_id }}</td>
                        </tr>
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
                    <h4 class="panel-title">Basic Test Reports</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ url('patient/initial/test/') }}" method="POST">
                        @csrf
                        <input type="hidden" name="patient_id" value="{{ $patient->institute_id }}">
                        <table class="table table-bordered">
                            <tr>
                                <th>Weight</th>
                                <th>Boody Temperature</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="weight" class="form-control" placeholder="patient weight"></td>
                                <td><input type="text" name="boody_temperature" class="form-control" placeholder="patient boody temperature"></td>
                            </tr>
                            <tr>
                                <th>Blood Pressure</th>
                                <th>Blood Suger</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="blood_pressure" class="form-control"  placeholder="patient blood pressure rate"></td>
                                <td><input type="text" name="blood_suger" class="form-control" placeholder="patient blood suger rate"></td>
                            </tr>
                            <tr>
                                <th>Other Test Report(s)</th>
                                <td><textarea name="other_reports" class="form-control" placeholder="other test reports"></textarea>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Patient Problem Description</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ url('patient/problem/') }}" method="POST">
                        @csrf
                        <input type="hidden" name="patient_id" value="{{ $patient->institute_id }}">
                        <table class="table table-striped">
                            <tr>
                                <textarea name="patient_problem_desc" class="form-control"></textarea>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>

            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Treatments</h4>
                </div>
                <form action="{{ url('patient/treatemt/') }}" method="POST">
                    @csrf
                    <input type="hidden" name="patient_id" value="{{ $patient->institute_id }}">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <tr>
                                <th>New Test(s):</th>
                                <td><textarea name="new_test_name" class="form-control"></textarea></td>
                            </tr>
                        </table>
                    </div>

                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Medicine(s)</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Medicines Name</th>
                                <td><textarea name="medicines_name" class="form-control"></textarea></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div>
            <a href="{{ route('manage.appointment') }}" class="btn btn-primary">Back</a>

        </div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->

@endsection
