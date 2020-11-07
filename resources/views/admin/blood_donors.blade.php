@extends('admin.home')
@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">All Blood Donors List</h3>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Requested Donors</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Academic ID</th>
                                    <th>Member Name</th>
                                    <th>Phone Number</th>
                                    <th>Email Address</th>
                                    <th>Blood Group</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($req as $row)
                                <tr>
                                    <td>{{ $row->donor_id }}</td>
                                    <td>{{ $row->donor_name }}</td>
                                    <td>{{ $row->donor_phone }}</td>
                                    <td>{{ $row->donor_email }}</td>
                                    <td>{{ strtoupper($row->blood_group) }}</td>
                                    <td>
                                        <a href="{{ url('mail/for/donation/'.$row->id) }}" class="btn btn-danger"> <i class="icon icon-drop"></i></a>
                                        <a href="{{ url('donated/blood/'.$row->id) }}" class="btn btn-sm btn-info" title="Donated"><i class="fa fa-thumbs-up"></i></a>
                                        <a href="{{ url('delete/donor/'.$row->id) }}" class="btn btn-sm btn-warning" id="delete" title="Remove"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <a href="{{ url('invite-donors') }}" class="btn btn-primary">Invite Donors</a>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Donated List</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Academic ID</th>
                                    <th>Member Name</th>
                                    <th>Phone Number</th>
                                    <th>Email Address</th>
                                    <th>Blood Group</th>
                                    <th>Donation Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($done as $row)
                                <tr>
                                    <td>{{ $row->donor_id }}</td>
                                    <td>{{ $row->donor_name }}</td>
                                    <td>{{ $row->donor_phone }}</td>
                                    <td>{{ $row->donor_email }}</td>
                                    <td>{{ strtoupper($row->blood_group) }}</td>
                                    <td>{{ $row->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('mail/for/donation/'.$row->id) }}" class="btn btn-sm btn-danger" title="Call To Donate"><i class="icon icon-drop"></i></a>
                                        <a href="{{ url('delete/donor/'.$row->id) }}" class="btn btn-sm btn-warning" id="delete" title="Remove"><i class="fa fa-trash"></i></a>
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
