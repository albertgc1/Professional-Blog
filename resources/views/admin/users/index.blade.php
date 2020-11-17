@extends('admin.layout')

@section('header')
    <h1>Lista de Usuarios <small>Usuarios</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Usuarios</li>
    </ol>
@endsection

@section('content')

<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Usuario</h3>
      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#postForm">
        <i class="fa fa-plus"></i> Crear nuevo Usuario
      </button>
    </div>
    <div class="box-body">
      <table id="posts-table" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                    <td>
                      <a href="{{ route('admin.users.show', $user) }}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i></a>
                      <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
                      <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline">
                        @csrf @method('DELETE')
                        <button 
                          class="btn btn-xs btn-danger"
                          onclick="return confirm('¿Estás seguro de querer eliminar esta publicación?')">
                          <i class="fa fa-trash"></i>
                        </button>
                      </form>
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
