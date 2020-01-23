@extends('admin.home')
@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">Pending Users/Patients Request List</h3>
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
                                    <th>#ID</th>
                                    <th>Academic ID</th>
                                    <th>Member Name</th>
                                    <th>Phone Number</th>
                                    <th>Email Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pending as $req)
                                <tr>
                                    <th scope="row">{{ $req->id }}</th>
                                    <td>{{ $req->institute_id }}</td>
                                    <td>{{ $req->name }}</td>
                                    <td>{{ $req->phone }}</td>
                                    <td>{{ $req->email }}</td>
                                    <td>
                                    <a href="{{ url('approve/user/request/'.$req->id) }}" class="btn btn-sm btn-success" title="Aproved"><i class="fa fa-thumbs-up"></i></a>
                                        <a href="{{ url('reject/user/request/'.$req->id) }}" class="btn btn-sm btn-danger" title="Reject"><i class="fa fa-thumbs-down"></i></a>
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