@extends('layouts.sidebar')

@section('sidebar')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0">Read Mail</h4>
        </div><!-- /.col --><br>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="">Read</a></li>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->

      <!-- Main content -->


      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <a href="{{ route('inboxMail') }}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Folders</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-0">
                  <ul class="nav nav-pills flex-column">
                    <li class="nav-item active">
                      <a href="{{ route('inboxMail') }}" class="nav-link">
                        <i class="fas fa-inbox"></i> Inbox
                        <span class="badge bg-primary float-right">12</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-envelope"></i> Sent
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-file-alt"></i> Drafts
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fas fa-filter"></i> Junk
                        <span class="badge bg-warning float-right">65</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-trash-alt"></i> Trash
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Labels</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                      <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i> Important</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i> Promotions</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i> Social</a>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Read Mail</h3>

                  <div class="card-tools">
                    <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="mailbox-read-info">
                    <h5>Message Subject Is Placed Here</h5>
                    <h6>From: {{$message->envoyeur->name}}
                      <span class="mailbox-read-time float-right">{{ $message->created_at->diffForHumans() }}</span>
                    </h6>
                  </div>
                  <!-- /.mailbox-read-info -->
                  <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                        <i class="far fa-trash-alt"></i>
                      </button>
                      <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                        <i class="fas fa-reply"></i>
                      </button>
                      <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                        <i class="fas fa-share"></i>
                      </button>
                    </div>
                    <!-- /.btn-group -->
                    <button type="button" class="btn btn-default btn-sm" title="Print">
                      <i class="fas fa-print"></i>
                    </button>
                  </div>
                  <!-- /.mailbox-controls -->
                  <div class="mailbox-read-message">
                    <p> {{$message->contenumessage}}</p>


                  </div>
                  <!-- /.mailbox-read-message -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer bg-white">
                  <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                    <li>
                      <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                      <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> Sep2014-report.pdf</a>
                        <span class="mailbox-attachment-size clearfix mt-1">
                          <span>1,245 KB</span>
                          <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                        </span>
                      </div>

                  </ul>
                </div>
                <!-- /.card-footer -->
                <div class="card-footer">
                  <div class="float-right">
                    <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                    <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                  </div>
                  <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                  <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

      @endsection