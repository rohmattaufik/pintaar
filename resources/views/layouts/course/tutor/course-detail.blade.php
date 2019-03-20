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
          <a href="{{ route('course-update', $course->id) }}" class="btn btn-success">Ubah Informasi Kelas</a>
          <a href="{{ route('course', $course->id)}}" target="_blank" class="btn btn-default">Preview</a>
          <br><br>
          <table class="table table-bordered">
            <thead>
            <tr>
              <td>Nama Kelas</td>
              <td>{{ $course->nama_course}}</td>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Harga Kelas</td>
              <td>Rp {{ $course->harga}}</td>
            </tr>
            <tr>
              <td>Diskon Kelas</td>
              <td>{{ $course->diskon }} %</td>
            </tr>
            <tr>
              <td>Deskripsi Kelas</td>
              <td>{!! html_entity_decode($course->deskripsi) !!}</td>
            </tr>
            <tr>
              <td>Video Pengenalan Kelas</td>
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
              <td>Gambar Kelas</td>
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
    </div>
     
    <!-- DAFTAR TOPIK -->
    <div class="row">
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{ route('topik-create', $course->id)}}" class="btn btn-success pull-left">Tambah Topik</a>
              <h3 class="box-title">Daftar Topik</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover text-left">
                <tr>
                  <th>Nama Topik</th>
                  <th width="30%">Aksi</th>
                </tr>
                @if (count($course->topiks) > 0)
                  @foreach($course->topiks as $key => $topik)
                    <tr>
                      <td>{{ $topik->judul_topik}}</td>
                      <td>
                        <a href="{{ route('topik-detail',$topik->id)}}" class="btn btn-primary">Detail</a>
                        <a href="{{ route('topik-update', $topik->id) }}" class="btn btn-info">Ubah</a>
                        <a href="{{ route('topik-delete',$topik->id)}}" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                  @endforeach
                @endif
              </table>
            </div>
          </div>
        
          </div>
        </div>

        <!-- Daftar Pengajar -->
    <div class="row">
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{ route('add-tutor-course', $course->id)}}" class="btn btn-success pull-left">Tambah Pengajar</a>
              <h3 class="box-title">Pengajar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover text-left">
                <tr>
                  <th>Nama</th>
                  <th>Foto</th>
                  <th>Deskripsi</th>
                  <th width="20%">Aksi</th>
                </tr>
                @if (count($course->tutors) > 0)
                  @foreach($course->tutors as $key => $tutorCourse)
                    <tr>
                      <td>{{ $tutorCourse->tutor->name }}</td>
                      <td>
                        <img src="{{ URL::asset('images/gambar_course/'.$tutorCourse->tutor->profile_photo) }}" width="500" height="500" alt="Sorry, Fail load image"></img>
                      </td>
                      <td>{!! html_entity_decode($tutorCourse->tutor->story) !!} </td>
                      <td>
                        <a href="{{ route('edit-tutor-course', [$course->id, $tutorCourse->tutor->id]) }}" class="btn btn-info">Ubah</a>
                        <a href="{{ route('delete-tutor-course', [$course->id, $tutorCourse->tutor->id]) }}" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                  @endforeach
                @endif
               
              </table>
            </div>
          </div>
        
          </div>
        </div>


  </div>       
</section>
@endsection

@section('extra-script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection
