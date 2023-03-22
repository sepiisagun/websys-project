@props(['items'])

<div class="bg-white dark:bg-neutral-900">
	<div
		class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 py-5 px-5 sm:px-7 sm:py-10 lg:max-w-7xl lg:grid-cols-1 lg:px-8"
	>
		<div class="lg:py-15 mx-auto max-w-2xl py-8 sm:py-12 lg:max-w-none">
			<h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
				<span
					class="bg-gradient-to-r from-neutral-500 to-neutral-900 bg-clip-text text-transparent dark:bg-gradient-to-r dark:from-cyan-200 dark:to-blue-500"
				>{{ config('constants.FEATURE_CARD.TITLE') }} </span>
			</h2>
			<p class="text-white-500 py-5 dark:text-slate-300">
				{{ config('constants.FEATURE_CARD.DESCRIPTION') }}
			</p>

			<div
				class="mt-3 grid grid-cols-1 gap-x-6 gap-y-5 dark:text-slate-300 sm:grid-cols-2 sm:gap-y-8 lg:grid-cols-4 lg:gap-x-8"
			>
				@foreach ($items as $item)
					<x-listings.listing-item :item="$item" />
				@endforeach
			</div>
		</div>
	</div>
</div>
