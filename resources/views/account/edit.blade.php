@extends('welcome')

@section('content')
	<section class="bg-white dark:bg-gray-900">
		<div class="mx-auto max-w-screen-lg py-8 px-4 lg:py-16 lg:px-6">
			<div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-16">
				<h2
					class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white lg:text-4xl"
				>
					Account Settings
				</h2>
				<p class="font-light text-gray-500 dark:text-gray-400 sm:text-xl">
					<span class="font-bold">
						{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
					</span>,
					{{ Auth::user()->email }}
				</p>
			</div>
			<div class="grid gap-8 lg:grid-cols-2">
				@foreach (config('constants.ACCOUNT_SETTINGS_CARD') as $item)
					<x-account.settings-card
						:id="Auth::user()->id"
						:item="$item"
					/>
				@endforeach
			</div>
		</div>
	</section>
@endsection
