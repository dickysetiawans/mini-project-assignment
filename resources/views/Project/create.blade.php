@extends('_layout')
@section('title', 'Project')
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
                <h1>New Project</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Project</li>
                <li class="breadcrumb-item">New Project</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>
        <div class="row">
          <!-- left column -->
          <div class="col-md-5">
            <!-- general form elements -->
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">New Project</h3>
                    </div>
                <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/project/new" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="New Project" name="name">
                            </div>
                            <div class="form-group">  
                                <label>Client</label>
                                <select class="form-control select2" style="width: 100%;" name="client">
                                    @foreach($client as $cl)
                                    <option>{{ $cl->client_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                           
                                <label>Date project end</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="date" class="form-control" data-target="#reservationdate" name="date_end"/>
                                </div>
                                @if(session()->has('ErorTanggal'))
                                    <i style="color:red;">{{session('ErorTanggal')}}</i>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>
                    </form>


                </div>
            </div>

            <div class="col-md-6">
            <!-- general form elements -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">New Client</h3>
                    </div>
                <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/project/new/client" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Client Name</label>
                                <input type="text" class="form-control" placeholder="New Client" name="client_name">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Address" name="client_address">
                            </div>
                            <button type="submit" class="btn btn-dark">Submit</button>
                        </div>
                    </form>

                    
                </div>
            </div>
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