@props([
	'items'
])

<div
	class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 px-5 sm:px-7 lg:max-w-7xl lg:grid-cols-1 lg:px-8"
>
	<div class="lg:py-15 mx-auto max-w-2xl lg:max-w-none">
		<h2
			class="lg:mt- pt-8 text-center text-3xl font-bold tracking-tight text-gray-900 sm:pt-8 sm:text-4xl lg:pt-10"
		>
			{{ config('constants.LISTINGS_CARD.TITLE') }}
		</h2>
		<p class="text-white-500 py-5 text-center">
			{{ config('constants.LISTINGS_CARD.DESCRIPTION') }}
		</p>

		<x-listings.listing-search />

		<div
			class="mt-12 grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2 sm:gap-y-8 lg:grid-cols-4 lg:gap-x-8"
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
