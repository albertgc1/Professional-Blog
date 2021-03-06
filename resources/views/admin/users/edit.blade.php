@extends('admin.layout')

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Formulario de Edición</h3>
            </div>
            <div class="box-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf @method('PATCH')

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Nombres:</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Correo:</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                    </div>

                    <hr>

                    <span class="help-block">Dejar en blanco si no quiere actualizar la contraseña</span>

                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirma Contraseña:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirma contraseña">
                    </div>

                    <button class="btn btn-primary btn-block">Actualizar Usuario</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Roles</h3>
            </div>
            <div class="box-body">
              <form action="{{ route('admin.users.roles.update', $user->id) }}" method="POST">
                @csrf @method('PUT')
                @foreach ($roles as $id => $name)
                    <div class="checkbox">
                        <label>
                            <input name="roles[]" type="checkbox" value="{{ $name }}" {{ $user->roles->contains($id) ? 'checked': '' }}>
                            {{ $name }}
                        </label>
                    </div>
                @endforeach

                <button class="btn btn-primary btn-block">Actualizar Roles</button>
              </form>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Permisos</h3>
            </div>
            <div class="box-body">
              <form action="{{ route('admin.users.permissions.update', $user->id) }}" method="POST">
                @csrf @method('PUT')
                @foreach ($permissions as $id => $name)
                    <div class="checkbox">
                        <label>
                            <input name="permissions[]" type="checkbox" value="{{ $name }}" {{ $user->permissions->contains($id) ? 'checked': '' }}>
                            {{ $name }}
                        </label>
                    </div>
                @endforeach

                <button class="btn btn-primary btn-block">Actualizar Permisos</button>
              </form>
            </div>
        </div>
    </div>
</div>

@endsection
