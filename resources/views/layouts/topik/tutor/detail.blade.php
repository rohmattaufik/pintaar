@extends('template')

@section('title')
  <title>Pintaar</title>
@endsection

@section('extra-style')

@endsection

@section('content')
<section class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
          <a href="{{ route('topik-create', $course->id) }}" class="btn btn-success">Tambah Topik</a>
          <br>
          <br>
          <table class="table table-bordered">
            <thead>
            <tr>
              <td>Nama Topik</td>
              <td>{{ $topik->judul_topik}}</td>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Penjelasan</td>
              <td>{!! html_entity_decode($topik->penjelasan) !!}</td>
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
        
  </div>


<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <a href="{{ route('pertanyaan-topik-create', $topik->id)}}" class="btn btn-success pull-left">Tambah Pertanyaan</a>
      <h3 class="box-title">Kuis</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding text-left">
      <table class="table table-hover">
        <tr>
          <th>Judul Pertanyaan</th>
          <th>Pertanyaan</th>
          <th>Gambar</th>
          <th>Jawaban</th>
          <th>Opsi 1</th>
          <th>Opsi 2</th>
          <th>Opsi 3</th>
          <th>Opsi 4</th>
          <th>Aksi</th>
        </tr>
        @foreach($topik['pertanyaanTopiks'] as $key => $pertanyaan)
        <tr>
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
          <td>Opsi {{ $pertanyaan->jawaban}}</td>
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
  </div>       
</section>
@endsection

@section('extra-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@endsection
