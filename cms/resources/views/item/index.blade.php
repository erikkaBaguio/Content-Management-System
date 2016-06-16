@extends('layout/template')

@section('content')
 <center><h1>Simple Content-Management-System</h1>
 <a href="{{url('/items/create')}}" class="btn btn-success">Create Category</a>
 <hr></center>

 @if(Session::has('flash_message'))
     <div class="alert alert-success">
         {{ Session::get('flash_message') }}
     </div>
 @endif

 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>ID</th>
         <th>Name</th>
         <th>Description</th>
         <th>Unit Cost</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($items as $item)
         <tr>
             <td>{{ $item->id }}</td>
             <td>{{ $item->name }}</td>
             <td>{{ $item->description}}</td>
             <td>{{ $item->unit_cost}}</td>
             <td><a href="{{ route('items.show', $item->id) }}" class="btn btn-primary">Read</a></td>
             <!-- <td><a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Update</a></td> -->
             <td>
                <form method="POST" action="{{ route('items.destroy', $item->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="form-group">
        				<button type="submit" class="btn btn-danger">Delete</button>
        			</div>
                </form>
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection
