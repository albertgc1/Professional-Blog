@extends('admin.layout')

@section('header')
    <h1>Fourmulario de posts <small>posts</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Posts</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <form method="POST" action="{{ route('admin.posts.store') }}">
        @csrf
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" id="title" name="title" placeholder="Título" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Contenido de la Publicación</label>
                        <textarea id="body" name="body" id="body" rows="10" class="form-control" placeholder="Ingresa el contenido completo de la publicación"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label for="published_at">Fecha de Publicación</label>
                        <input type="date" id="published_at" name="published_at" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category">Categoría</label>
                        <select class="form-control" name="category" id="category">
                            <option>Seleccione una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Multiple</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="excerpt">Extracto de la Publicación</label>
                        <textarea id="excerpt" name="excerpt" id="body" class="form-control" placeholder="Ingresa el contenido completo de la publicación"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Crear Publicación</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('adminLTE/bower_components/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminLTE/bower_components/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script src="{{ asset('adminLTE/bower_components/select2/dist/js/select2.min.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
        $('.select2').select2()
    </script>
@endpush
