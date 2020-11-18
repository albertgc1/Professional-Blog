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
                        <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                    </div>

                    <button class="btn btn-primary btn-block">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
