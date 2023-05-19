@props(['houses'])

<div class="bg-gray-100 dark:bg-neutral-900">
	<div
		class="gap-y-15 houses-center mx-auto grid max-w-2xl grid-cols-2 gap-x-8 py-10 px-5 sm:grid-cols-1 sm:gap-y-12 sm:px-7 lg:max-w-7xl lg:grid-cols-2 lg:px-8 lg:py-10"
	>
		<div>
			<h2
				class="text-center text-3xl font-bold tracking-tight text-neutral-900 sm:mt-5 sm:text-4xl lg:mt-20"
			>
				<span
					class="bg-gradient-to-r from-neutral-500 to-neutral-900 bg-clip-text text-transparent dark:bg-gradient-to-r dark:from-cyan-200 dark:to-blue-500"
				>{{ config('constants.LISTINGS_CARD.TITLE') }}</span>

			</h2>
			<p class="mt-4 text-center text-neutral-500 dark:text-slate-500">
				{{ config('constants.LISTINGS_CARD.DESCRIPTION') }}
			</p>

			<div class="mt-8 flex flex-wrap justify-center gap-6 px-6">
				<a
					class="btn btn-sky dark:focus:ring-sky-800' mx-2 px-5 py-2.5 text-center text-sm font-medium hover:bg-sky-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-white dark:text-black dark:hover:bg-sky-800 dark:hover:text-white"
					href="{{ route('house.index') }}"
				>
					{{ config('constants.BUTTON_LABELS.EXPLORE') }}
				</a>
			</div>
		</div>
		<dl
			class="mt-2 grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-1 sm:gap-y-4 lg:grid-cols-1 lg:gap-x-8"
		>
			<div
				class="relative z-10"
				data-carousel="slide"
				id="default-carousel"
			>
				<!-- Carousel wrapper -->
				<div class="relative h-56 overflow-hidden rounded-lg md:h-96">
					<!-- Item 1 -->
					@foreach ($houses as $house)
						<x-carousel.carousel-item :house="$house" />
					@endforeach
				</div>
				<div
					class="absolute bottom-5 left-1/2 z-30 flex -translate-x-1/2 space-x-3">
					@foreach ($houses as $house)
						<x-carousel.carousel-button />
					@endforeach
				</div>
			</div>
		</dl>
	</div>
</div>
