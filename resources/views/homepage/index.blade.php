@extends('welcome')

@section('content')
    <x-hero />
    <x-features.features :houses="$houses" />
    <x-stats.stats />
    <x-testimonials.testimonials />
    <x-carousel.listings-cta :houses="$houses" />
    <x-team.team-section />
@endsection
