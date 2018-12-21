@extends('template')

@section('title')
  <title>Topik Detail</title>
  <link rel="stylesheet" href="{{URL::asset('css/admin-lte.min.css')}}">
  <link href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="content">
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Topik {{ $topik->judul_topik}}</h3>
        </div>
        <div class="box-body col-md-6 col-md-offset-3">
          <table class="table table-bordered">
            <thead>
            <tr>
              <td>Topik Name</td>
              <td>{{ $topik->judul_topik}}</td>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Penjelasan</td>
              <td>{{ $topik->penjelasan}}</td>
            </tr>
            <tr>
              <td>Video</td>
              <td><video controls
                    muted
                    src="{{ URL::asset('video/video_topik/'.$topik->video)}}"
                    width="300"
                    height="200">
                  Sorry, your browser doesn't support embedded videos.
              </video></td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="box-footer"></div>
  </div>
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
        <a href="{{ route('pertanyaan-topik-create', $topik->id)}}" class="btn btn-success pull-left">Add Pertanyaan Topik</a>
      <h3 class="box-title">Pertanyaan Topik</h3>
      
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
          <th>Id</th>
          <th>Judul Pertanyaan</th>
          <th>Pertanyaan</th>
          <th>Gambar</th>
          <th>Jawaban</th>
          <th>Opsi_1</th>
          <th>Opsi_2</th>
          <th>Opsi_3</th>
          <th>Opsi_4</th>
          <th>Action</th>
        </tr>
        @foreach($topik['pertanyaanTopiks'] as $key => $pertanyaan)
        <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $pertanyaan->judul_pertanyaan}}</td>
          <td>{{ $pertanyaan->pertanyaan}}</td>
          <td>@if($pertanyaan->gambar != null)<img 
                    src="{{ URL::asset('images/gambar_pertanyaan/'.$pertanyaan->gambar)}}"
                    width="128"
                    height="128" alt="Sorry, Fail load image">
              </img>
              @else
                Tidak ada gambar
              @endif  
            </td>
          <td>{{ $pertanyaan->jawaban}}</td>
          <td>{{ $pertanyaan->opsi_1}}</td>
          <td>{{ $pertanyaan->opsi_2}}</td>
          <td>{{ $pertanyaan->opsi_3}}</td>
          <td>{{ $pertanyaan->opsi_4}}</td>
          <td>
            <a href="{{ route('pertanyaan-topik-update', $pertanyaan->id) }}" class="btn btn-info">Update</a>
            <a href="{{ route('pertanyaan-topik-delete',$pertanyaan->id)}}" class="btn btn-danger">Delete</a>
            
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
