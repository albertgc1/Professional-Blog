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
    <form method="POST" action="{{ route('admin.posts.update', $post) }}">
        @csrf @method('PUT')
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group {{ $errors->has('title') ? 'has-error': '' }}">
                        <label for="title">Título</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" placeholder="Título" class="form-control">
                        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('body') ? 'has-error': '' }}"">
                        <label for="body">Contenido de la Publicación</label>
                        <textarea id="body" name="body" id="body" rows="10" class="form-control"
                            placeholder="Ingresa el contenido completo de la publicación">{{ old('body', $post->body) }}</textarea>
                        {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label for="published_at">Fecha de Publicación</label>
                        <input type="date" id="published_at" name="published_at" value="{{ old('published_at', $post->published_at) }}" class="form-control">
                    </div>
                    <div class="form-group {{ $errors->has('category') ? 'has-error': '' }}">
                        <label for="category">Categoría</label>
                        <select class="form-control" name="category" id="category">
                            <option value="">Seleccione una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category', $post->category_id) == $category->id ? 'selected': '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('category', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('tags') ? 'has-error': '' }}">
                        <label for="tags">Etiquetas</label>
                        <select id="tags" name="tags[]" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                            @foreach ($tags as $tag)
                                <option {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected': '' }} value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('excerpt') ? 'has-error': '' }}">
                        <label for="excerpt">Extracto de la Publicación</label>
                        <textarea id="excerpt" name="excerpt" id="body" class="form-control"
                            placeholder="Ingresa el extracto de la publicación">{{ old('excerpt', $post->excerpt) }}</textarea>
                        {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <div class="dropzone">

                        </div>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script src="{{ asset('adminLTE/bower_components/select2/dist/js/select2.min.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
        $('.select2').select2()
        var myDropzone = new Dropzone('.dropzone', {
            url: '/admin/posts/{{ $post->url }}/photos',
            paramName: 'photo',
            acceptedFiles: 'image/*',
            maxFilesize: 2,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            dictDefaultMessage: 'Arrastra las fotos aquí'
        })
        myDropzone.on('error', function(file, res){
            var msg = res.errors.photo[0]
            $('.dz-error-message:last > span').text(msg)
        })
        Dropzone.autoDiscover = false
    </script>
@endpush
