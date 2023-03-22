@props(['items'])

<div class="bg-white dark:bg-neutral-900">
	<div
		class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 py-5 px-5 sm:px-7 sm:py-10 lg:max-w-7xl lg:grid-cols-1 lg:px-8">
		<div class="lg:py-15 mx-auto max-w-2xl py-8 sm:py-12 lg:max-w-none">

			{{-- for delete --}}
			{{-- @if (session()->has('message'))
			<div class="flex p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
				role="alert">
				<svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
					viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
						clip-rule="evenodd"></path>
				</svg>
				<span class="sr-only">Info</span>
				<div>
					<span class="font-medium">Success alert!</span> {{ session()->get('message') }}.
				</div>
			</div>
			@endif --}}

			<h1 class="pt-8 text-center text-4xl font-bold tracking-tight text-gray-900 sm:pt-8 sm:text-4xl lg:pt-10">
				<span
					class="text-transparent bg-clip-text bg-gradient-to-r to-sky-800 from-slate-400 dark:bg-gradient-to-r dark:to-blue-500 dark:from-cyan-200">{{
					config('constants.LISTINGS_CARD.TITLE') }} </span>

			</h1>
			<p class="text-white-500 pt-2 pb-8 text-center dark:text-slate-50">
				{{ config('constants.LISTINGS_CARD.DESCRIPTION') }}
			</p>

			<x-listings.listing-search />

			<div
				class="mt-12 grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2 sm:gap-y-8 lg:grid-cols-4 lg:gap-x-8 dark:text-slate-300">
				@foreach ($items as $item)
				<x-listings.listing-item :item="$item" />
				@endforeach
			</div>
		</div>
		<div class="mx-auto w-4/5 pb-10">
			{{ $items->links() }}
		</div>
	</div>
</div>