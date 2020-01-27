@extends('patients.home')
@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">Book Appointment</h3>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-body">
                    <form action="{{ route('book.patient.appoint') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="doctorSpecialization">Select Specialize</label><br>
                                <select name="specialize_id" data-placeholder="Choose Specialize" style="width: 100%; padding: 8px; border: 1px solid #dce1e4; border-radius: 5px;">
                                    <option value="NULL">Choose Specialize</option>
                                    @foreach($specialize as $spe)
                                        <option value="{{ $spe->id }}">{{ $spe->specialize_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="doctorName">Select Doctor</label>
                                <select name="doctor_id" style="width: 100%; padding: 8px; border: 1px solid #dce1e4; border-radius: 5px;">
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="appointDate">Appoint Date</label>
                            <input type="date" name="appoint_date" required autofocus style="width: 100%; padding: 8px; border: 1px solid #dce1e4; border-radius: 5px;">
                        </div>

                        <div class="form-group">
                            <label for="problemDescription">Short Problem Description</label>
                            <textarea name="problem_desc" class="form-control m-t-xxs"></textarea>
                        </div>

                        <input type="hidden" name="patient_id" value="{{ Auth::user()->id }}">

                        <button type="submit" class="btn btn-primary m-t-xs m-b-xs">BOOK APPOINT</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-body">
                    <table class="table table-responsive">
                        <thead>
                            <th>Doctor Name</th>
                            <th>Consulting Days</th>
                            <th>Consulting Start</th>
                            <th>Consulting End</th>
                        </thead>
                        <tbody>
                            @foreach($doc as $row)
                                <tr>
                                    <td>
                                        {{ $row-> full_name }} <br>
                                        <span style="color: gray"><em>{{ $row->specialize_name }}</em></span>
                                    </td>
                                    <td>{{ $row-> consult_days }}</td>
                                    <td>{{ $row-> consult_start }}</td>
                                    <td>{{ $row-> consult_end }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="specialize_id"]').on('change', function(){
            var specialize_id = $(this).val();
            if(specialize_id) {
                $.ajax({
                    url: "{{  url('/get/doctor/name/') }}/"+specialize_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="doctor_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="doctor_id"]').append('<option value="'+ value.id +'">' + value.full_name + '</option>');
                        });



                    },

                });
            } else {
                alert('danger');
            }

        });
    });

</script>

@endsection
