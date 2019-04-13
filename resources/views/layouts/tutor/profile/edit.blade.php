@extends('template')

@section('title')
    <title>Pengajar | Edit</title>
@endsection

@section('extra-style')

@endsection

@section('content')
<section class="section-padding">
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                
                <form action="{{ route('tutor-update') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <img id="preview" class="profile-user-img img-responsive img-circle " src="{{ $user->foto ? URL::asset($user->foto) : URL::asset('images/user-default.png')}}" alt="User profile picture"><br>
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Foto Profil</label>
                        <div class="col-sm-10">
                            <div class="form-line">
                                <input type="file" id="exampleFormControlFile1" name="foto" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <div class="form-line">
                                <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required="true">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-line">
                            <h4>Informasi rekening bank untuk penarikan pendapatan.</h4>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="mapel" class="col-sm-2 control-label">Nama Bank</label>
                        <div class="col-sm-10">
                            <div class="form-line">
                                <input type="text" name="nama_bank" class="form-control" placeholder="Misal: BNI" value="{{ $tutor->nama_bank }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mapel" class="col-sm-2 control-label">Nomor Rekening</label>
                        <div class="col-sm-10">
                            <div class="form-line">
                                <input type="number" placeholder="Misal: 12345678" name="no_rekening" class="form-control" value="{{ $tutor->no_rekening }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mapel" class="col-sm-2 control-label">Nama Pemegang Rekening</label>
                        <div class="col-sm-10">
                            <div class="form-line">
                                <input type="text" placeholder="Misal: Karim S." name="nama_rekening" class="form-control" value="{{ $tutor->nama_rekening }}">
                            </div>
                        </div>
                    </div>
                                            
                    <div class="form-group">
                        <div class="col-sm-10">
                            <div class="form-line">
                                <input type="submit" class="btn btn-lg btn-primary" value="Simpan">
                                <a href="{{ route('tutor-dashboard') }}" class="btn btn-lg btn-danger">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
@endsection

@section('extra-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
        }
    }

    $("#exampleFormControlFile1").change(function() {
        readURL(this);
    });
</script>
@endsection