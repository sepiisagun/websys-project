@extends('welcome')

@section('content')
	<x-house.house-body
		:house="$house"
		:avgRating="$avgRating"
	/>
@endsection
