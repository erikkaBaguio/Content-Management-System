@extends('layout/template')
@section('content')

    <h1>ID No. {{ $item->id }}</h1>
    <h2> {{ $item->name }}</h2>
    <p class="lead">{{ $item->description }}</p>

    <a href="{{ url('items')}}" class="btn btn-primary">Back</a>
@stop
