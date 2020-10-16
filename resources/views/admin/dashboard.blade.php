@extends('admin.layout')

@section('header')
    <h2>{{ auth()->user()->name }}</h2>
@endsection
