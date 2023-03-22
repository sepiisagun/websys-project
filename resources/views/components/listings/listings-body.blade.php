@props(['items'])

<div class="bg-white dark:bg-neutral-900">
	<div
		class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 py-5 px-5 sm:px-7 sm:py-10 lg:max-w-7xl lg:grid-cols-1 lg:px-8"
	>
		<div class="lg:py-15 mx-auto max-w-2xl py-8 sm:py-12 lg:max-w-none">

			{{-- for delete --}}
			@if (session()->has('message'))
				<div
					class="mb-4 flex rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
					role="alert"
				>
					<svg
						aria-hidden="true"
						class="mr-3 inline h-5 w-5 flex-shrink-0"
						fill="currentColor"
						viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							clip-rule="evenodd"
							d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
							fill-rule="evenodd"
						></path>
					</svg>
					<span class="sr-only">Info</span>
					<div>
						<span class="font-medium">Success alert!</span>
						{{ session()->get('message') }}.
					</div>
				</div>
			@endif

			<h1
				class="pt-8 text-center text-4xl font-bold tracking-tight text-gray-900 sm:pt-8 sm:text-4xl lg:pt-10"
			>
				<span
					class="bg-gradient-to-r from-slate-400 to-sky-800 bg-clip-text text-transparent dark:bg-gradient-to-r dark:from-cyan-200 dark:to-blue-500"
				>{{ config('constants.LISTINGS_CARD.TITLE') }} </span>

			</h1>
			<p class="text-white-500 pt-2 pb-8 text-center dark:text-slate-50">
				{{ config('constants.LISTINGS_CARD.DESCRIPTION') }}
			</p>

			<x-listings.listing-search />

			<div
				class="mt-12 grid grid-cols-1 gap-x-6 gap-y-5 dark:text-slate-300 sm:grid-cols-2 sm:gap-y-8 lg:grid-cols-4 lg:gap-x-8"
			>
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
