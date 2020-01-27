@extends('doctor.home')
@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">Previous Appointment History</h3>
    {{-- <div class="page-breadcrumb">
        <ol class="breadcrumb breadcrumb-with-header">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Responsive Tables</li>
        </ol>
    </div> --}}
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
                                    <th>App - ID</th>
                                    <th>Patient ID</th>
                                    <th>Problem</th>
                                    <th>Visited Date</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $his)
                                <tr>
                                    <th>{{ $his->id }}</th>
                                    <td>{{ $his->institute_id }}</td>
                                    <td>{{ $his->problem_desc }}</td>
                                    <td>{{ $his->created_at }}</td>
                                    <td>
                                        <a href="{{ url('view/appoint/history/'.$his->id) }}" class="btn btn-sm btn-success" title="View"><i class="fa fa-eye"></i></a>
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
