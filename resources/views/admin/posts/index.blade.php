@extends('admin.layout')

@section('header')
    <h1>Lista de posts <small>posts</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Posts</li>
    </ol>
@endsection

@section('content')

<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Posts</h3>
      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#postForm">
        <i class="fa fa-plus"></i> Crear nuevo Post
      </button>
    </div>
    <div class="box-body">
      <table id="posts-table" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Excerpt</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->excerpt }}</td>
                    <td>
                        <a href="#" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function () {
      $("#posts-table").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>
@endpush
