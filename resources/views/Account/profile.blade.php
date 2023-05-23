@extends('_layout')
@section('title', 'Profile')
@section('link')
  <link rel="stylesheet" href="/AdminLTE-3.2.0/dist/css/adminlte.min.css">

@endsection
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if( auth()->user()->image == null)
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('images/user.png')  }}"
                        alt="User profile picture" value="{{ auth()->user()->imag }}">
                  @else
                    <img class="profile-user-img img-fluid img-circle"
                        src="/images/{{ auth()->user()->image }}"
                        alt="User profile picture" >
                  @endif
                </div>

                <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                <p class="text-muted text-center">admin</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>{{ auth()->user()->email }}</b>
                  </li>
                  <li class="list-group-item">
                    <b>{{ auth()->user()->role }}</b>
                  </li>
                  <li class="list-group-item">
                    <b>{{ \Carbon\Carbon::parse( auth()->user()->created_at )->format('d F Y') }} </b>
                  </li>
                </ul>

                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#uploadmodal"><b>Upload foto</b></button>
              </div>
              <!-- <form>
                  @csrf
                  <div class="row">
                    <div class="col-md-2">
                      <div id="my_camera"></div>
                      <br>
                      <input type="button" value="take snapshot" onClick="take_snapshot()">
                      <input type="hidden" name="image" class="image-tag">
                    </div>
                    <br>
                    <div class="col-md-3">
                      <div id="results">
                        
                      </div> 
                        
                    </div>
                    
                  </div>
                  <button>Sumbit</button>
              </form> -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">

                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                    <!-- Post -->

                    <!-- /.post -->
                  </div>
                  
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
        </div>
        
        <!-- /.row -->

		
      </div><!-- /.container-fluid -->
      <div class="modal fade" id="uploadmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Foto?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                      <div class="modal-body">Anda ingin "Upload" foto profile?</div>
                      <div class="card">
                    <div class="card-body">
                    <form action="/profile/upload" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="file" id="inputGroupFile02" required="" name="image" class="mb-2">
                        <div  id="my_camera">
                        </div>
                        <br>
                        <hr>
                        <i style="color:red;">Untuk saat ini tidak bisa mengambil foto melalui camera</i>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    
                </div>
            </div>
      </div>    
@endsection
@section('javascript')
<!-- jquery  -->
<script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- bootstrap js  -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <!-- webcamjs  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
    <script language="JavaScript">
       Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        //menampilkan webcam di dalam file html dengan id my_camera
        Webcam.attach('#my_camera');
       
    </script>
    
@endsection