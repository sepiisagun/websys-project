@extends('welcome')

@section('content')
	<x-listings.listings-body :items="$houses" />
@endsection
