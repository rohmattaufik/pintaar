@extends('template')

@section('title')
  <title>Manage Topik</title>
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
              <h3 class="box-title">Create New Topik</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('topik-submit') }}" enctype="multipart/form-data">
              <input type="hidden" name="id" value="{{ $topik != null ? $topik->id : null}}">
              <input type="hidden" name="id_course" value="{{ $course->id }}">
              {{ csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Judul Topik</label>
                  <input type="text" class="form-control" name="judul_topik" id="name" value="{{ $topik != null ? $topik->judul_topik : null }}" placeholder="Enter Topic Title">
                </div>
                <div class="form-group">
                  <label for="video">File Video</label>
                  <input type="file" id="video" name="video">                
                </div>
                @if($topik != null and $topik->video != null and $topik->video != "")
                  <video id="preview_video" controls src="{{ URL::asset('video/video_topik/'.$topik->video) }}" width="300" height="200"></video>
                @else 
                  <video id="preview_video" controls class="hidden" width="300" height="200"></video>
                @endif
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label><br>
                  <textarea name="penjelasan" class="form-control">{{ $topik != null ? $topik->penjelasan : null}} </textarea>
                </div>
                
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
