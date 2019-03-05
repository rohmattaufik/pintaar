@extends('template')

@section('title')
  <title>Course</title>
  <link rel="stylesheet" href="{{URL::asset('css/admin-lte.min.css')}}">
  <link href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="section-padding">
<div class="container">
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <a href="{{ route('course-create')}}" class="btn btn-success pull-left">Buat Kelas Baru</a>
      <h3 class="box-title">Daftar Kelas</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover text-left">
        <tr>
          <th>Nomor</th>
          <th>Nama Kelas</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
        @foreach($courses as $key => $course)
        <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $course->nama_course}}</td>
          <td>Rp {{ $course->harga}}</td>
          <td>
            <a href="{{ route('course-detail',$course->id)}}" class="btn btn-primary">Lihat</a>
            <a href="{{ route('course-update', $course->id) }}" class="btn btn-info">Ubah</a>
            <a href="{{ route('course',$course->id)}}" class="btn btn-default" target="_blank">Lihat Sebagai Murid</a>
            <a href="{{ route('sales-course',$course->id)}}" class="btn btn-warning">Penjualan Kelas</a>
            <a href="{{ route('publish-course',$course->id)}}" class="btn btn-danger">Rilis</a>
            
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

<script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('js/dataTables.bootstrap.min.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@endsection
