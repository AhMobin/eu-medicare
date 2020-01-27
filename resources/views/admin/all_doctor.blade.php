@extends('admin.home')
@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">All Doctors</h3>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Present Doctors</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Doctor Name</th>
                                    <th>Specialized</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctors as $row)
                                <tr>
                                    <th scope="row">{{ $row->id }}</th>
                                    <td>{{ $row->full_name }}</td>
                                    <td>{{ $row->specialize_name }}</td>
                                    <td>
                                        <a href="{{ url('view/doctor/details/'.$row->id) }}" class="btn btn-sm btn-info" title="View Info"><i class="fa fa-eye"></i></a>
                                        <a href="{{ url('edit/doctor/details/'.$row->id) }}" class="btn btn-sm btn-warning" title="Edit Info"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('delete/doctor/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Resigned Doctors</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Doctor Name</th>
                                    <th>Specialized</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resign as $row)
                                <tr>
                                    <th scope="row">{{ $row->id }}</th>
                                    <td>{{ $row->full_name }}</td>
                                    <td>{{ $row->specialize_name }}</td>
                                    <td>
                                        <a href="{{ url('view/doctor/details/'.$row->id) }}" class="btn btn-sm btn-info" title="View Info"><i class="fa fa-eye"></i></a>
                                        <a href="{{ url('edit/doctor/details/'.$row->id) }}" class="btn btn-sm btn-warning" title="Edit Info"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('rejoin/doctor/'.$row->id) }}" class="btn btn-sm btn-success" title="Re Join"><i class="fa fa-thumbs-up"></i></a>
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
