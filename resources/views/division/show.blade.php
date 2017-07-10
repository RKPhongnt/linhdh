@extends('layouts.index')
@section('content')
	<p>name: {{$division->name}}</p>
	<p>manager: {{$division->manager->name}}</p>
	<p>staff:</p>
	<ul>
		@foreach($division->staffs as $staff)
			<li>{{$staff->name}}</li>
		@endforeach
	</ul>
@endsection