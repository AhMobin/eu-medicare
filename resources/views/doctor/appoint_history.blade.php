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
                    <h4 class="panel-title">Appointments History</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Patients ID</th>
                                    <th>Problem Description</th>
                                    <th>Visited Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->

@endsection
