@extends('_layout')
@section('title', 'Cari')
@section('link')
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
     <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
     <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/AdminLTE-3.2.0/dist/css/adminlte.min.css">
@endsection
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Project</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Project</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="card-title">Filter</h3>
          </div>
          <div class="card-body" style="display: inline;">
           
            <form role="search" action="/project/s" method="get" enctype="multipart/form-data">            
              <div class="row"> 
                <div class="col-md-2">
                    <label>New Data</label>
                    <a class="btn bg-dark" href="/project/new">New Data</a>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label>Project Nama</label>
                      <input type="text" class="form-control" name="search">
                    </div>
                  </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <label>CLIENT</label>
                      <select class="form-control select2" style="width: 100%;" name="client">
                        <option selected="selected">All Client</option>
                        @foreach($clientdata as $c)
                          <option>{{ $c->client_name }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control select2" style="width: 100%;" name="status">
                        <option selected="selected">All Status</option>
                        <option>Doing</option>
                        <option>Open</option>
                        <option>Doing</option>
                      </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <label>Seacrh</label>
                    <button class="btn bg-dark">Seacrh</button>
                </div>
                <div class="col-md-1">
                    <label>Delete</label>
                    <button class="btn btn-danger">Delete</button>
                </div>
              </div>
              
            </div>
          </form>
        </div>
        
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Table Project</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap table-striped">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Action</th>
                        <th>Project Name</th>
                        <th>Client</th>
                        <th>Project Start</th>
                        <th>Project End</th>
                        <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $i = 1; @endphp
                    @foreach($viewtable as $p)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                          <a class="btn btn-info btn-sm" href="/project/edit?id={{ $p->id }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="/" data-toggle="modal" data-target="#deleteModal">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                        </td>
                        <td>{{ $p->project_name}}</td>
                        <td> {{ $p->client_name}}</td>
                        <td>{{ \Carbon\Carbon::parse($p->project_start)->format('d F Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->project_end)->format('d F Y') }}</td>
                        <td>{{ $p->project_status}}</td>
                      </tr>
                    @endforeach
                  

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('javascript')
<script src="/Ad/plugins/jquery/jquery.min.js"></script>
<!-- Select2 -->
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
@foreach($viewtable as $p)
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Anda ingin "Hapus" data tersebut?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form action="/project/delete?id={{ $p->id }}" method="post">
                          @csrf
                          <button type="submit" class="btn btn-primary">Hapus</button>
                        </form>
                        <!-- <a class="" href="/logout">Logout</a> -->
                    </div>
                </div>
            </div>
        </div>
@endforeach