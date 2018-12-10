@extends('template')

@section('title')
  <title>Course</title>
  <link rel="stylesheet" href="{{URL::asset('css/admin-lte.min.css')}}">
  <link href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="content">
<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
        <a href="{{ route('course-create')}}" class="btn btn-success pull-left">Create</a>
      <h3 class="box-title">Daftar Courses</h3>

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
          <th>Course Name</th>
          <th>Harga</th>
          <th>Foto</th>
          <th width="30%">Action</th>
        </tr>
        @foreach($courses as $key => $course)
        <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $course->nama_course}}</td>
          <td>Rp. {{ $course->harga}}</td>
          <td><img style="width:200px; height:200px;" src='{{URL::asset("images/gambar_course/".$course->foto)}}'></td>
          <td>
            <a href="{{ route('course-update', $course->id) }}" class="btn btn-info">Update</a>
            <a href="{{ route('course-delete',$course->id)}}" class="btn btn-danger">Delete</a>
            <a href="{{ route('course-detail',$course->id)}}" class="btn btn-primary">Detail</a>
            <a href="{{ route('course',$course->id)}}" class="btn btn-default">Preview</a>
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
