@extends('_layout')
@section('title', 'Edit Project')
@section('link')
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/dist/css/adminlte.min.css">
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Project</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Project</li>
                <li class="breadcrumb-item">Edit Project</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>
        <div class="row">
          <!-- left column -->
          @if($project->project_status == 'Done')
          <div class="col-md-5">
                <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Status project sudah selesai</h3>
                        </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="New Project" name="name" value="{{ $project->project_name }}" disabled="">
                                </div>
                                <div class="form-group">
                                    <label>Project start</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" class="form-control" data-target="#reservationdate" name="date_start" value="{{ $project->project_start }}"disabled=""/>
                                    </div>   
                                </div>
                                <div class="form-group">
                                    <label>Project end</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" class="form-control" data-target="#reservationdate" name="date_end" value="{{ $project->project_end }}" disabled="" />
                                    </div>        
                                </div>
                                <div class="form-group">  
                                    <label>Status</label>
                                    <select class="form-control select2" style="width: 100%;" name="status" disabled="" >
                                        <option selected="selected">{{$project->project_status}}</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                </div>
          @else
            <div class="col-md-5">
                <!-- general form elements -->
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Edit Project</h3>
                        </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/project/edit?id={{$project->id}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="New Project" name="name" value="{{ $project->project_name }}">
                                </div>
                                <div class="form-group">
                                    <label>Project start</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" class="form-control" data-target="#reservationdate" name="date_start" value="{{ $project->project_start }}"/>
                                    </div>   
                                </div>
                                <div class="form-group">
                                    <label>Project end</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" class="form-control" data-target="#reservationdate" name="date_end" value="{{ $project->project_end }}"/>
                                    </div>        
                                </div>
                                <div class="form-group">  
                                    <label>Status</label>
                                    <select class="form-control select2" style="width: 100%;" name="status">
                                        <option selected="selected">{{$project->project_status}}</option>
                                        @if($project->project_status == "Doing")
                                            <option>Done</option>
                                            <option>Open</option>
                                        @else
                                            <option>Done</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
            
        </div>
        
    </div>
</div>
@endsection
@section('javascript')
<script src="/AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
        //Initialize Select2 Elements
    $('.select2').select2()

//Initialize Select2 Elements
    $('.select2bs4').select2({
       theme: 'bootstrap4'
    })

  });
  </script>
@endsection