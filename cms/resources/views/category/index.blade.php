@extends('layout/template')

@section('content')
 <center><h1>Simple Content-Management-System</h1>
 <a href="{{url('/categories/create')}}" class="btn btn-success">Create Category</a>
 <hr></center>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>ID</th>
         <th>Name</th>
         <th>Description</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($categories as $category)
         <tr>
             <td>{{ $category->id }}</td>
             <td>{{ $category->name }}</td>
             <td>{{ $category->description}}</td>
             <td><a href="{{$category->id}}" class="btn btn-primary">Read</a></td>
             <td><a href="{{  url($category->id/edit) }}" class="btn btn-warning">Update</a></td>
             <td><a href="#" class="btn btn-danger">Delete</a></td>
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection
