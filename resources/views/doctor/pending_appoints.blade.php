@extends('doctor.home')
@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">Pending Appointments</h3>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                {{-- <div class="panel-heading clearfix">
                    <h4 class="panel-title">Responsive table</h4>
                </div> --}}
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
                                @foreach($appoints as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->patient_id }}</td>
                                    <td>{{ $row->problem_desc }}</td>
                                    <td>{{ $row->appoint_date }}</td>
                                    <td>
                                        <a href="{{ url('appoint/approve/'.$row->id) }}" class="btn btn-sm btn-info" title="Approve"><i class="fa fa-thumbs-up"></i></a>
                                        <a href="{{ url('appoint/follow/up/'.$row->id) }}" class="btn btn-sm btn-warning" title="Follow Up"><i class="fa fa-thumbs-down"></i></a>
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