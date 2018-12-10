@extends('template')

@section('title')
  <title>Manage Course</title>
  <link rel="stylesheet" href="{{URL::asset('css/admin-lte.min.css')}}">
  <link href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 col-md-offset-3">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Course</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('course-submit') }}" enctype="multipart/form-data">
              <input type="hidden" name="id" value="{{ $course != null ? $course->id : null}}">
              {{ csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Nama Course</label>
                  <input type="text" class="form-control" name="nama_course" id="name" value="{{ $course != null ? $course->nama_course : null }}" placeholder="Enter Course Name">
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="number" class="form-control" name="harga" id="harga" value="{{ $course != null ? $course->harga : null }}" placeholder="Input Harga">
                </div>
                <div class="form-group">
                  <label for="foto">File Foto</label>
                  <input type="file" id="foto" name="foto">                
                </div>
                @if($course != null and $course->foto != null and $course->foto != "")
                  <img id="preview_image" src="{{ URL::asset('images/gambar_course/'.$course->foto) }}" width="200" height="200"></img>
                @else 
                  <img id="preview_image" class="hidden" width="128" height="128"></img>
                @endif
                <div class="form-group">
                  <label for="video">File Video</label>
                  <input type="file" id="video" name="video">                
                </div>
                @if($course != null and $course->video != null and $course->video != "")
                  <video id="preview_video" controls src="{{ URL::asset('video/video_course/'.$course->video)}}" width="300" height="200"></video>
                @else 
                  <video id="preview_video" controls class="hidden" width="300" height="200"></video>
                @endif
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label><br>
                  <textarea class="form-control" rows="3" name="deskripsi">{{ $course != null ? $course->deskripsi : null}} </textarea>
                </div>
                <!-- select -->
                <!-- <div class="form-group">
                  <label>Tutor</label>
                  <select class="form-control" name="id_tutor">
                    @foreach($tutors as $key => $tutor)
                    @if($course != null and $tutor->id == $course->id_tutor)
                    <option value="{{$tutor->id}}" selected="true">{{ $tutor['users']['nama']}}</option>
                    @else
                    <option value="{{$tutor->id}}">{{ $tutor['users']['nama']}}</option>
                    @endif
                    @endforeach
                  </select>
                </div> -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
</div>
</div>

          
 </sction>

<script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('js/dataTables.bootstrap.min.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
function readURL(input) {

    if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
        $('#preview_image').attr('src', e.target.result);
        $('#preview_image').removeClass('hidden');
    }

    reader.readAsDataURL(input.files[0]);
    }
}

$("#foto").change(function() {
    readURL(this);
});

function readURLVideo(input) {

  if (input.files && input.files[0]) {
  var reader = new FileReader();

  reader.onload = function(e) {
      $('#preview_video').attr('src', e.target.result);
      $('#preview_video').removeClass('hidden');
  }

  reader.readAsDataURL(input.files[0]);
  }
}

$("#video").change(function() {
  readURLVideo(this);
});
</script>
@endsection
