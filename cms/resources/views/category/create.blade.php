@extends('layout/template')


@section('content')
	<h1>Create category</h1>

	<form method="POST">
	<!-- {{ method_field('PATCH') }} -->
	{{ csrf_field() }}
	<input type="hidden" name="method" value="PATCH">

		<div class="form-group">
			<textarea name="name" class="form-control"></textarea>
		</div>

        <div class="form-group">
			<textarea name="description" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Add Category</button>
		</div>


	</form>

@stop
