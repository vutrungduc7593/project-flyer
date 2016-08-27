@extends('layout')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<a href="{{ url('/flyers/create') }}" class="btn btn-primary">Create Flyer</a>

			<hr>			

			<table class="table">
			    <thead>
			      <tr>
			        <th>Flyer</th>
			        <th>&nbsp;</th>
			      </tr>
			    </thead>
			    <tbody>
			    	@foreach ($flyers as $flyer)
			    		<tr>
			    			<td>
			    				<a href="{{ route('show_flyer', [$flyer->zip, $flyer->street]) }}">{{ $flyer->street }}</a>
			    			</td>
			    			<td>
			    				<button class="btn btn-warning">Edit</button>
			    				<button class="btn btn-danger">Delete</button>
			    			</td>
			    		</tr>
			    	@endforeach
			    </tbody>
		    </table>

		</div>		
	</div>
@stop
