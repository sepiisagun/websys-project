<div class="bg-white">
	<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
		<div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
			<h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
				{{ config('constants.FEATURE_CARD.TITLE') }}
			</h2>
			<p class="text-white-500 mt-4">
				{{ config('constants.FEATURE_CARD.DESCRIPTION') }}
			</p>

			<div class="mt-6 space-y-12 lg:grid lg:grid-cols-4 lg:gap-x-5 lg:space-y-0">
				@foreach (config('constants.FEATURE_ITEMS') as $item)
					<x-feature-item :item="$item" />
				@endforeach
			</div>
		</div>
	</div>
</div>
