@extends('layout/template')

@section('content')
	<h1>Update Item</h1>
	<div class="col-md-4">
		@if(Session::has('flash_message'))
	        <div class="alert alert-success">
	            {{ Session::get('flash_message') }}
	        </div>
	    @endif

		<form method="POST" action="{{ route('items.update', $item->id)}}" >
		{{ method_field('PUT') }}
		{{ csrf_field() }}
		<!-- <input type="hidden" name="method" value="PATCH"> -->
			<div class="form-group">
				Name<input name="name" class="form-control" value="{{$item->name}}" required></input>
			</div>
			<div class="form-group">
                Description<input name="description" class="form-control" value="{{$item->description}}" required></input>
			</div>
            <div class="form-group">
				Unit Cost<input type="number" name="unit_cost" class="form-control" value="{{$item->unit_cost}}" required></input>
			</div>
			<div class="form-group">
				{!! Form::label('categories', 'Categories:') !!}
				{!! Form::select('categories[]', $categories, null, ['class'=>'form-control', 'multiple']) !!}
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
	</div>

@stop
