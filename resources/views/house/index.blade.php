@extends('welcome')

@section('content')
    <x-listings.listings-body :houses="$houses" />
@endsection
