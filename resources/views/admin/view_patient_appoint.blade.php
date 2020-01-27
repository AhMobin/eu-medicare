@extends('admin.home')
@section('content')


<div class="page-title">
    <h3 class="breadcrumb-header">View Appointment Details</h3>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Doctor Information</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Doctor Name</th>
                            <td>{{ $viewApp->full_name }}</td>
                        </tr>
                        <tr>
                            <th>Academic ID</th>
                            <td>{{ $viewApp->specialize_name }}</td>
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
                    <h4 class="panel-title">Patient Information</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Academic ID</th>
                            <td>{{ $viewApp->institute_id }}</td>
                        </tr>
                        <tr>
                            <th>Patient Name</th>
                            <td>{{ $viewApp->name }}</td>
                        </tr>
                        <tr>
                            <th>Patient Phone Number</th>
                            <td>{{ $viewApp->phone }}</td>
                        </tr>
                        <tr>
                            <th>Patient Gender</th>
                            <td>{{ strtoupper($viewApp->gender) }}</td>
                        </tr>
                        <tr>
                            <th>Patient Blood Gr</th>
                            <td>{{ $viewApp->blood_group }}</td>
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
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Patient Problem</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <textarea class="form-control" rows="1" readonly>{{ $viewApp->problem_desc }}</textarea>
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
