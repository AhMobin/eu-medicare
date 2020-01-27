@extends('admin.home')
@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">Manage All Appointments</h3>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Patients ID</th>
                                    <th>specialized</th>
                                    <th>Doctor Name</th>
                                    <th>Appointed Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appoints as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->institute_id }}</td>
                                    <td>{{ $row->specialize_name }}</td>
                                    <td>{{ $row->full_name }}</td>
                                    <td>{{ $row->appoint_date }}</td>
                                    <td>
                                        @if($row->status==0)
                                            <span class="badge badge-danger">pending</span>
                                        @elseif($row->status==1)
                                            <span class="badge badge-info">approved</span>
                                        @elseif($row->status==2)
                                            <span class="badge badge-success">visited</span>
                                        @else
                                            <span class="badge badge-warning">followed</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->status==1)
                                            <a href="{{ url('view/patient/query/'.$row->id) }}" class="btn btn-sm btn-primary">View</a>
                                        @elseif($row->status==2)
                                            <a href="{{ url('view/patient/prescribed/info/'.$row->id) }}" class="btn btn-sm btn-primary">View</a>
                                        @elseif($row->status==0)
                                            <a href="{{ url('view/patient/query/'.$row->id) }}" class="btn btn-sm btn-primary">View</a>
                                            <a href="{{ url('appoint/follow/up/'.$row->id) }}" class="btn btn-sm btn-warning">Follow Up</a>
                                        @else
                                            <button type="button" class="btn btn-info">Schedule</button>
                                        @endif

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
