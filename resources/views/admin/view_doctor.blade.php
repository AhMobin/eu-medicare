@extends('admin.home')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">

<div class="page-title">
    <h3 class="breadcrumb-header">Add A Doctor</h3>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-white">
                <div class="panel-body">

                    <div class="form-group">
                        <label for="doctorName">Doctor Name</label>
                        <input type="text" class="form-control m-t-xxs" value="{{ $doctor->full_name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="doctorSpecialization">Specialize</label>
                        <input type="text" class="form-control m-t-xxs" value="{{ $doctor->specialize_name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="doctorEmail">Email</label>
                        <input type="email" class="form-control m-t-xxs"value="{{ $doctor->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="doctorPhone">Phone Number</label>
                        <input type="text" class="form-control m-t-xxs"  value="{{ $doctor->phone }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="doctorConsDays">Consulting Days</label><br>
                        <input type="text" class="form-control m-t-xxs" value="{{ $doctor->consult_days }}" readonly>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="doctorConsDays">Consulting Time</label><br>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="doctorConsDays">Consult Start</label>
                                    <input type="text" class="form-control m-t-xxs" value="{{ $doctor->consult_start }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="doctorConsDays">Consult End</label>
                                <input type="text" class="form-control m-t-xxs" value="{{ $doctor->consult_end }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('all.doctors') }}" class="btn btn-danger m-t-xs m-b-xs">Back</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-white">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="doctorName">Doctor Photo</label><br>
                        <img src="" alt="" style="height: 120px; width: 145px;">
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

@endsection