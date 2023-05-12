@extends('welcome')

@section('content')
	<section class="bg-white dark:bg-gray-900">
		<div class="mx-auto w-full py-4 px-4 lg:py-16 lg:px-6">
			<div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-16">
				<h2
					class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white lg:text-4xl"
				>Hello, {{ Auth::user()->first_name .' '. Auth::user()->last_name }}</h2>
			</div>
			<p class="font-light text-gray-500 dark:text-gray-400 sm:text-xl">Upcoming
				Reservations</p>
			<div
				class="my-5 grid justify-start gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5"
			>
				@forelse ($upcomingReservations as $upcomingReservation)
					<x-house.reservation :reservation="$upcomingReservation" />
				@empty
					<p class="font-light text-gray-500 dark:text-gray-400 sm:text-xl">No Upcoming
						Reservations</p>
				@endforelse
			</div>
			<p class="font-light text-gray-500 dark:text-gray-400 sm:text-xl">Past
				Reservations</p>
			<div
				class="my-5 grid justify-start gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5"
			>
				@forelse ($pastReservations as $pastReservation)
					<x-house.reservation
						:reservation="$pastReservation"
						hasRating="{{ $pastReservation->rating ? true : false }}"
						past=true
					/>
				@empty
					<p class="font-light text-gray-500 dark:text-gray-400 sm:text-xl">No
						Reservations</p>
				@endforelse
			</div>
		</div>
	</section>
@endsection
