@extends('layouts.sidebar')

@section('sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0"> Toutes les publications</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">News</a></li>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-link ">Partage link</h3>

              <p class="card-text">
                Partagez votre lien d'admission en le copiant et en le partageant avec vos autres amis de BATONGA .
              </p>

              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>


        </div>
        <!-- /.col-md-6 -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-link m-0">Partager mes Aventures</h3>
            </div>
            <div class="card-body">
              <h6 class="card-title">Enfin, vous voilà !</h6>

              <p class="card-text">Envie d'écrire quelque chose de différent aujourd'hui ?</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                A quoi pensiez-vous?
              </button>
            </div>
          </div>

        </div>
        <!-- /.col-md-6 -->
        <div class="row">

          <div class="col-md-12 ml-3">
            <!-- Box Comment -->@foreach ($pub as $pub_home)
            <div class="card card-widget">

              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="{{ asset($pub_home->users ->url_profil) }}" alt="User Image">
                  <span class="username"><a href="detail">{{$pub_home ->users -> name }}.</a></span>
                  <span class="description">Shared publicly - {{$pub_home -> created_at->diffForHumans() }}</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" title="Mark as read">
                    <i class="far fa-circle"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <img class="img-fluid pad" src="{{ asset($pub_home->urlphoto) }}" alt="Photo">

                <p>{{$pub_home -> contenuposts }}</p>
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i> Share</button>
                <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                <span class="float-right text-muted">127 likes - 3 comments</span>
              </div>

              <!-- /.card-body -->
              @foreach ($pub_home->commentaires as $commentaire)
              <div class="card-footer card-comments">
                <div class="card-comment">
                  <!-- User image -->
                  <img class="img-circle img-sm" src="{{ asset($commentaire->user->url_profil) }}" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                    {{ $commentaire->user->name }}
                      <span class="text-muted float-right">{{ $commentaire->created_at->diffForHumans() }}</span>
                    </span><!-- /.username -->
                    {{ $commentaire->contenucomments }}
                  </div>
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
                
                <!-- /.card-comment -->
              </div>
              @endforeach
              <!-- /.card-footer -->
              <div class="card-footer">
    <form action="{{ route('commentaire.store', ['postId' => $pub_home->id]) }}" method="post">
        @csrf
        <img class="img-fluid img-circle img-sm" src="{{ Auth::user()->url_profil }}" alt="Alt Text">
        <div class="row">
          
            <div class="col-md-9">

                <input type="text" class="form-control form-control-sm" name="contenucomments" placeholder="Press enter to post comment">
            </div>
            <div class="col-md-3">
                <input type="hidden" name="publication_id" value="{{ $pub_home->id }}">
                <button type="submit" class="btn btn-success btn-sm toastrDefaultSuccess "><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
    </form>
</div>
              <!-- /.card-footer -->
            </div>
            @endforeach
            <!-- /.card -->
            <!-- Box Comment -->

            <!-- /.card -->
          </div>

          <!-- /.col -->

          <!-- /.col -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ route('publication.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-header">
            <h4 class="modal-title">A quoi pensez-vous ?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-outline card-info">
                  <div class="card-header">
                    <h3 class="card-title">

                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <textarea id="summernote" name="contenuposts">
                Ajoutez <em>uniquement</em> <u>du texte</u> <strong>ici</strong>
                    </textarea>

                    <div class="form-group">
                      <label for="exampleInputFile">Ajouter une image à ma publication</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFie" name="urlphoto">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Abandonner</button>
            <button type="submit" class="btn btn-success toastrDefaultSuccess">Publier</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



  @endsection