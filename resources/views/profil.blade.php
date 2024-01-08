@extends('layouts.sidebar')

@section('sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0">Modifier mon profil</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('profil')}}">Mon Profil</a></li>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <section class="content">


        <div class="container-fluid">

          <div class="row">
            @foreach ($det_profil as $list_p)
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle " src="{{ asset($list_p->url_profil) }} " alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center text-success">{{$list_p -> name }}</h3>

                  <p class="text-muted text-center">{{$list_p -> skils }}</p>

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Followers</b> <a class="float-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Following</b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Friends</b> <a class="float-right">13,287</a>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- About Me Box -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">


                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                  <p class="text-muted">{{$list_p -> location }}</p>

                  <hr>

                  <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                  <p class="text-muted">
                    <span class="tag tag-danger">{{$list_p -> skils }}</span>

                  </p>

                  <hr>

                  <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                  <p class="text-muted">{{$list_p -> notes }}.</p>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
           @endforeach
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>

                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <!-- Post -->
                      @foreach ($publi as $pub_prof)
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="{{ asset($pub_prof->users ->url_profil) }}" alt="user image">
                          <span class="username">
                            <a href="#">{{$pub_prof ->users -> name }}.</a>
                            <!-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> -->
                          </span>
                          <span class="description">Shared publicly - {{$pub_prof -> created_at->diffForHumans() }}</span>
                        </div>
                        <!-- /.user-block -->
                        
                        <p>
                        {{$pub_prof -> contenuposts }}
                        </p>
                        <img class="img-fluid pad" src="{{ asset($pub_prof->urlphoto) }}" alt="Photo">
                       

                        <p>
                          <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                          <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                          <span class="float-right">
                            <a href="#" class="link-black text-sm">
                              <i class="far fa-comments mr-1"></i> Comments (5)
                            </a>
                          </span>
                        </p>

                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                      </div>
                      @endforeach
                      <!-- /.post -->

                    
                      <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->

                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                      <form action="{{ route('modifier_profil') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Location</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="location" value="{{ Auth::user()->location }}">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputText">Skils</label>
                            <input type="text" class="form-control" id="exampleInputText" name="skils" value="{{ Auth::user()->skils }}">
                          </div>
                          <div class="form-group">
                          <label>Notes</label>
                        <textarea class="form-control"  placeholder="Enter ..." name="notes"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Photo de Profile</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="url_profil" value="{{ Auth::user()->url_profil }}">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                              </div>
                            </div>
                          </div>
                        
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <center>  <button type="submit" class="btn btn-success swalDefaultSuccess">
                  Modifier
                </button></center> 
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

      </section>
    </div><!-- /.container-fluid -->

  </div>
  <!-- /.content-header -->

  @endsection