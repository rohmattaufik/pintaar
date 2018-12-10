@extends('template')

@section('title')
  <title>Manage Pertanyaan Topik</title>
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
              <h3 class="box-title">Create New Pertanyaan Topik</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ route('pertanyaan-topik-submit') }}" enctype="multipart/form-data">
              <input type="hidden" name="id" value="{{ $pertanyaanTopik != null ? $pertanyaanTopik->id : null}}">
              <input type="hidden" name="id_topik" value="{{ $topik->id }}">
              {{ csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Judul Pertanyaan</label>
                  <input type="text" class="form-control" name="judul_pertanyaan" id="name" value="{{ $pertanyaanTopik != null ? $pertanyaanTopik->judul_pertanyaan : null }}" placeholder="Enter Topic Question Title">
                </div>
                <div class="form-group">
                  <label for="deskripsi">Pertanyaan</label><br>
                  <textarea class="form-control" name="pertanyaan">{{ $pertanyaanTopik != null ? $pertanyaanTopik->pertanyaan : null}} </textarea>
                </div>
                <div class="form-group">
                  <label for="foto">Gambar</label>
                  <input type="file" id="foto" name="gambar">                
                </div>
                @if($pertanyaanTopik != null and $pertanyaanTopik->gambar != null and $pertanyaanTopik->gambar != "")
                  <img id="preview_image" src="{{ URL::asset('images/gambar_pertanyaan/'.$pertanyaanTopik->gambar)}}" width="128" height="128"></img>
                @else 
                  <img id="preview_image" class="hidden" width="128" height="128"></img>
                @endif
                <div class="form-group">
                  <label for="opsi_1">Opsi 1</label>
                  <input type="text" class="form-control" name="opsi_1" id="opsi_1" value="{{ $pertanyaanTopik != null ? $pertanyaanTopik->opsi_1 : null }}" placeholder="Enter Option 1">
                </div>
                <div class="form-group">
                  <label for="opsi_2">Opsi 2</label>
                  <input type="text" class="form-control" name="opsi_2" id="opsi_2" value="{{ $pertanyaanTopik != null ? $pertanyaanTopik->opsi_2 : null }}" placeholder="Enter Option 2">
                </div>
                <div class="form-group">
                  <label for="opsi_3">Opsi 3</label>
                  <input type="text" class="form-control" name="opsi_3" id="opsi_3" value="{{ $pertanyaanTopik != null ? $pertanyaanTopik->opsi_3 : null }}" placeholder="Enter Option 3">
                </div>
                <div class="form-group">
                  <label for="opsi_4">Opsi 4</label>
                  <input type="text" class="form-control" name="opsi_4" id="opsi_4" value="{{ $pertanyaanTopik != null ? $pertanyaanTopik->opsi_4 : null }}" placeholder="Enter Option 4">
                </div>
                <!-- select -->
                <div class="form-group">
                  <label>Jawaban</label>
                  <select class="form-control" name="jawaban">
                    <option value="1" {{$pertanyaanTopik != null && $pertanyaanTopik['jawaban'] == 1? "selected='true'" : ""}}>Opsi 1</option>
                    <option value="2" {{$pertanyaanTopik != null && $pertanyaanTopik['jawaban'] == 2? "selected='true'" : ""}}>Opsi 2</option>
                    <option value="3" {{$pertanyaanTopik != null && $pertanyaanTopik['jawaban'] == 3? "selected='true'" : ""}}>Opsi 3</option>
                    <option value="4" {{$pertanyaanTopik != null && $pertanyaanTopik['jawaban'] == 4? "selected='true'" : ""}}>Opsi 4</option>
                  </select>
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
</script>
@endsection
