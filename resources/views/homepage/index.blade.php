@extends('welcome')

@section('content')
	<x-hero />
	<x-features.features :items="$houses" />
	<x-stats.stats />
	<x-testimonials.testimonials />
	<x-carousel.listings-cta :items="$houses" />
	<x-team.team-section />
@endsection
