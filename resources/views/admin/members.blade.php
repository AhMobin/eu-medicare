@extends('admin.home')
@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">All Members</h3>
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
                                @foreach($all as $row)
                                <tr>
                                    <th scope="row">{{ $row->id }}</th>
                                    <td>{{ $row->institute_id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" title="View Info"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-sm btn-warning" title="View Info"><i class="fa fa-edit"></i></a>
                                        <a href="" class="btn btn-sm btn-danger" id="delete" title="Reject"><i class="fa fa-trash"></i></a>
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