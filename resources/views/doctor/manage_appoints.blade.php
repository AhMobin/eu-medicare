@extends('doctor.home')
@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">Manage Appointments</h3>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Approved Appointments</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Patients ID</th>
                                    <th>Problem Description</th>
                                    <th>Requested Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($approved as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->institute_id }}</td>
                                    <td>{{ $row->problem_desc }}</td>
                                    <td>{{ $row->appoint_date }}</td>
                                    <td>
                                        <a href="{{ url('prescribe/patient/'.$row->id) }}" class="btn btn-sm btn-info">Prescribe</a>
                                        <a href="{{ url('delete/patient/list/'.$row->id) }}" class="btn btn-sm btn-danger" title="Follow Up"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Follow-up Appointments</h4>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Patients ID</th>
                                    <th>Problem Description</th>
                                    <th>Requested Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($follow as $row)

                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->patient_id }}</td>
                                    <td>{{ $row->problem_desc }}</td>
                                    <td>{{ $row->appoint_date }}</td>
                                    <td>
                                        <a href="{{ url('appoint/approve/'.$row->id) }}" class="btn btn-sm btn-info" title="Approve"><i class="fa fa-thumbs-up"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->

@endsection
