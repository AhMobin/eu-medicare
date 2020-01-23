@extends('admin.home')
@section('content')

<div class="page-title">
    <h3 class="breadcrumb-header">Medical Specializes List</h3>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                {{-- <div class="panel-heading clearfix">
                    <h4 class="panel-title"></h4>
                </div> --}}
                
                    <div class="panel-body">
                        <form action="{{ route('add.specialize') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add Specialize</label>
                                <input type="text" class="form-control m-t-xxs" name="specialize_name" placeholder="Write Specialize Name">
                            </div>
                            
                            <button type="submit" class="btn btn-primary m-t-xs m-b-xs">Submit</button>
                        </form>
                    </div>

                    <br>

                    <div class="panel-body">
                        <h3 style="margin-bottom: 15px;">All Specializes</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Speicalize Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>    
                                @foreach($spec as $row)  
                                    <tr>
                                        <th scope="row">{{ $row->id }}</th>
                                        <td>{{ $row->specialize_name }}</td>
                                        <td>
                                            @if($row->status == 0)
                                            <a href="" class="btn btn-sm btn-success" title="Aproved"><i class="fa fa-thumbs-up"></i></a>
                                            @else
                                            <a href="" class="btn btn-sm btn-warning" title="Reject"><i class="fa fa-thumbs-down"></i></a>
                                            @endif
                                            <a href="" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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