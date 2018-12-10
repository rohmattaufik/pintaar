@extends('template')

@section('title')
  <title>Course Detail</title>
  <link rel="stylesheet" href="{{URL::asset('css/admin-lte.min.css')}}">
  <link href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="content">
<!-- Default box -->
  <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Course {{ $course->nama_course}}</h3>
        </div>
        <div class="box-body col-md-6 col-md-offset-3">
          <table class="table table-bordered">
            <thead>
            <tr>
              <td>Course Name</td>
              <td>{{ $course->nama_course}}</td>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Harga</td>
              <td>{{ $course->harga}}</td>
            </tr>
            <tr>
              <td>Deskripsi</td>
              <td>{{ $course->deskripsi}}</td>
            </tr>
            <tr>
              <td>Video</td>
              <td><video controls
                    muted
                    src="{{ URL::asset('video/video_course/'.$course->video) }}"
                    width="300"
                    height="200">
                  Sorry, your browser doesn't support embedded videos.
              </video>
              </td>
            </tr>
            <tr>
              <td>Foto</td>
              <td><img 
                    src="{{ URL::asset('images/gambar_course/'.$course->foto) }}"
                    width="300"
                    height="200" alt="Sorry, Fail load image">
              </img>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="box-footer"></div>
  </div>
      <!-- /.box -->
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
        <a href="{{ route('topik-create', $course->id)}}" class="btn btn-success pull-left">Add Topik</a>
      <h3 class="box-title">List Topik</h3>
      
      <div class="box-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
          
          <div class="input-group-btn">
            
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tr>
          <th width="10%">Id</th>
          <th width="10%">Judul Topik</th>
          <th width="30%">Penjelasan</th>
          <th width="30%">Video</th>
          <th width="20%">Action</th>
        </tr>
        @foreach($course['topiks'] as $key => $topik)
        <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $topik->judul_topik}}</td>
          <td>{{ $topik->penjelasan}}</td>
          <td><video controls
                    muted
                    src="{{ URL::asset('video/video_topik/'.$topik->video)}}"
                    width="300"
                    height="200">
                  Sorry, your browser doesn't support embedded videos.
              </video></td>
          <td>
            <a href="{{ route('topik-update', $topik->id) }}" class="btn btn-info">Update</a>
            <a href="{{ route('topik-delete',$topik->id)}}" class="btn btn-danger">Delete</a>
            <a href="{{ route('topik-detail',$topik->id)}}" class="btn btn-primary">Detail</a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
</div>
          
 </sction>

<script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('js/dataTables.bootstrap.min.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


@endsection
