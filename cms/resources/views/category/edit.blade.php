@extends('layout/template')

@section('content')
	<h1>Update Category</h1>
	<div class="col-md-4">
		@if(Session::has('flash_message'))
	        <div class="alert alert-success">
	            {{ Session::get('flash_message') }}
	        </div>
	    @endif

		<form method="POST" action="{{ route('categories.update', $category->id)}}" >
		{{ method_field('PUT') }}
		{{ csrf_field() }}
		<!-- <input type="hidden" name="method" value="PATCH"> -->
			<div class="form-group">
				Name<input name="name" class="form-control" value="{{$category->name}}" required></input>
			</div>
			<div class="form-group">
				<!-- Description<input name="description" class="form-control" value="{{$category->description}}" required></input> -->
				Description<input name="description" class="form-control" value="{{$category->description}}" required></input>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
	</div>

@stop
