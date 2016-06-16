@extends('layout/template')
@section('content')

    <h1>ID No. {{ $item->id }}</h1>
    <h2> {{ $item->name }}</h2>
    <p class="lead">{{ $item->description }}</p>

    @unless ($item->categories->isEmpty())
        <h3>Categories :</h3>
        @foreach ($item->categories as $category)
        <li>{{ $category->name }}</li>
        @endforeach
    @endunless

    <a href="{{ url('items')}}" class="btn btn-primary">Back</a>
@stop
