@extends('layout/template')
@section('content')

    <h1>ID No. {{ $category->id }}</h1>
    <h2> {{ $category->name }}</h2>
    <p class="lead">{{ $category->description }}</p>

    <a href="{{ url('categories')}}" class="btn btn-primary">Back</a>
@stop
