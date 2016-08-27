@extends('layout')

@section('content')
	<h1>Selling Your Home?</h1>

	<hr>

	@include('errors')   

	<form method="POST" action="{{ url('/flyers') }}" enctype="multipart/form-data" >
		@include('flyers.form')
	</form>

@endsection
