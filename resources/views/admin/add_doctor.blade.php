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
                    <form action="{{ route('store.doctor') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="doctorName">Doctor Name</label>
                            <input type="text" name="full_name" class="form-control m-t-xxs @error('full_name') is-invalid @enderror" placeholder="Enter Doctor Name" value="{{ old('full_name') }}" required autocomplete="full_name" autofocus>
                            @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="doctorSpecialization">Select Specialize</label>
                            <select name="specialize_id" class="form-control m-t-xxs">
                                @foreach($spec as $rw)
                                    <option value="{{ $rw->id }}">{{ $rw->specialize_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="doctorEmail">Email</label>
                            <input type="email" name="email" class="password form-control m-t-xxs @error('email') is-invalid @enderror" placeholder="Write Doctors Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="doctorPhone">Phone Number</label>
                            <input type="text" name="phone" class="password form-control m-t-xxs @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" placeholder="Write Doctor Phone Number" required autocomplete="phone" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="doctorPhone">Doctor Password</label>
                            <input type="password" name="password" class="password form-control m-t-xxs" value="123456789">
                            <small>Default Password is 123456789</small>
                        </div>
                        <div class="form-group">
                            <label for="doctorConsDays">Consulting Days</label><br>
                            <input type="text" name="consult_days" class="form-control m-t-xxs" data-role="tagsinput">
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="doctorConsDays">Consulting Time</label><br>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="doctorConsDays">Consult Start</label>
                                        <input type="time" name="consult_start">
                                    </div>    
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="doctorConsDays">Consult Start</label>
                                    <input type="time" name="consult_end">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary m-t-xs m-b-xs">ADD DOCTOR</button>
                    </form>
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