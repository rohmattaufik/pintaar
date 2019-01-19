@extends('template')

@section('title')
  <title>Pintaar</title>
@endsection

@section('extra-style')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
@endsection

@section('content')
<section class="section-padding">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 col-md-offset-3">
            
            <h2>Tambah Topik</h2>
            
            
            <form role="form" method="post" action="{{ route('topik-submit') }}" enctype="multipart/form-data">
              <input type="hidden" name="id" value="{{ $topik != null ? $topik->id : null}}">
              <input type="hidden" name="id_course" value="{{ $course->id }}">
              {{ csrf_field()}}
                <div class="form-group">
                  <label for="name">Judul Topik</label>
                  <input type="text" class="form-control" name="judul_topik" id="name" value="{{ $topik != null ? $topik->judul_topik : null }}">
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
                  <textarea id="deskripsi-editor" name="penjelasan" rows="10" class="form-control">{{ $topik != null ? $topik->penjelasan : null}} </textarea>
                </div>
                <div class="form-group">
                  <label for="video">Lampiran</label>
                  <input type="file" id="file_topik" name="file_topik">                
                </div>
                             
            
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
         
    </div>
  </div>      
</section>
@endsection


@section('extra-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>

<script>
    $('#deskripsi-editor').summernote({
        height: 300
    });  
</script>


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
