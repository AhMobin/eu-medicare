@extends('admin.home')
@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">Blood Request For Emergency</h3>
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
                                    <th>Blood Group</th>
                                    <th>Contact Number</th>
                                    <th>Location</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($emrg as $row)
                                <tr>
                                    <td>{{ strtoupper($row->req_blood_group) }}</td>
                                    <td>{{ $row->req_from_number }}</td>
                                    <td>{{ $row->patient_location }}</td>
                                    <td>
                                        <a href="{{ url('mail/to/donors/'.$row->req_blood_group) }}" class="btn btn-sm btn-danger" title="Call To Donate"><i class="icon icon-drop"></i></a>
                                        <a href="{{ url('remove/request/'.$row->id) }}" class="btn btn-sm btn-warning" id="delete" title="Remove"><i class="fa fa-trash"></i></a>
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
