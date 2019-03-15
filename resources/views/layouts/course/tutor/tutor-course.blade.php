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
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            
            <h2 class="box-title">Pengajar Kelas</h2>
            
            <form id="form-add-tutor" role="form" method="post" action="{{ route('tutor-course-submit') }}" enctype="multipart/form-data">
              <input type="hidden" name="course_id" value="{{ $course->id }}">
              <input type="hidden" name="tutor_id" value="{{ $tutor != null ? $tutor->id : null }}">
              {{ csrf_field()}}
              
                <div class="form-group">
                  <label for="name">Nama Pengajar</label>
                  <input type="text" class="form-control" name="tutor_name" value="{{ $tutor != null ? $tutor->name : null }}" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="tutor_photo">Foto Pengajar</label>
                  <input type="file" id="tutor_photo" name="tutor_photo">                
                </div>
                @if($tutor != null and $tutor->profile_photo != null and $tutor->profile_photo != "")
                  <img id="preview_image" src="{{ URL::asset('images/gambar_course/'.$tutor->profile_photo) }}" width="200" height="200"></img>
                @else 
                  <img id="preview_image" class="hidden" width="128" height="128"></img>
                @endif
                
                <div class="form-group">
                  <label for="deskripsi">Deskripsi Pengajar</label>
                  <textarea id="description-tutor" class="form-control" rows="7" name="deskripsi" required>{{ $tutor != null ? $tutor->story : null}}</textarea>
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
  $('#description-tutor').summernote({
      height: 300
  });  
    
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

  $("#tutor_photo").change(function() {
      readURL(this);
  });

</script>


@endsection
