@extends('layout/template')

@section('content')
	<h1>Update category</h1>
	<div class="col-md-4">
		@if(Session::has('flash_message'))
	        <div class="alert alert-success">
	            {{ Session::get('flash_message') }}
	        </div>
	    @endif

		<form method="POST">
		{{ method_field('PATCH') }}
		{{ csrf_field() }}
		<!-- <input type="hidden" name="method" value="PATCH"> -->
			<div class="form-group">
				Name<input name="name" class="form-control" required>{{$category-name>}}</input>
			</div>
			<div class="form-group">
				Description<input name="description" class="form-control" required>{{$category->desription}}<//input>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
	</div>

@stop
