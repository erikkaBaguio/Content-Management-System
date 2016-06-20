@extends('layout/template')


@section('content')
	<h1>Create category</h1>
	<div class="col-md-4">
		@if(Session::has('flash_message'))
	        <div class="alert alert-success">
	            {{ Session::get('flash_message') }}
	        </div>
	    @endif

		<form method="POST" action="{{ url('categories') }}">
		{{ csrf_field() }}
		<input type="hidden" name="method" value="PATCH">
			<div class="form-group">
				Name<input name="name" class="form-control" required></input>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Save</button>
			</div>
		</form>
	</div>

@stop
