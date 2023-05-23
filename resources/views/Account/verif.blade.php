@extends('_layout')
@section('title', 'Project')
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
            <h1 class="m-0">Account Verified</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Account unverified</li>
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
        
        
        <div class="card">
              <div class="card-header ">
                <h3 class="card-title">Data User yang belum di verifikasi</h3>
              </div>
              
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table  table-striped">
                  <thead class="table-dark">
                  <tr>
                    <th>No</th>
                    <th>Action</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Created</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php $i = 1; @endphp
                    @foreach($verif as $v)
                        <tr>
                            @php $id_user = $v->id @endphp
                            <td>{{ $i++ }}</td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="/" data-toggle="modal" data-target="#deleteModal">
                                    Unverified
                                </a>
                            </td>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->role }}</td>
                            <td>{{ \Carbon\Carbon::parse($v->pcreated_at)->format('d F Y') }}</td>
                            
                        </tr>
                        
                    @endforeach
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- /.row -->        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
@section('javascript')
<script src="/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/jszip/jszip.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="./AdminLTE-3.2.0/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
        //Initialize Select2 Elements
    $('.select2').select2()

//Initialize Select2 Elements
    $('.select2bs4').select2({
       theme: 'bootstrap4'
    })

  });
  </script>
@endsection
@foreach($verif as $v)
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
                    <form action="/account-unverified/edit?id={{ $id_user }}" method="post">
                        @csrf
                        <div class="modal-body">Anda ingin "verif" account tersebut?
                        <select class="form-control select2" style="width: 100%;" name="verif">
                            <option selected="selected">{{ $v->verif }}</option>
                            <option>verified</option>
                        </select>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <!-- <a class="" href="/logout">Logout</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endforeach
