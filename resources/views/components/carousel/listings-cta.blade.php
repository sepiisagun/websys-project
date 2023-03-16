@props([
	"items"
])

<div class="bg-slate-100">
	<div
		class="gap-y-15 mx-auto grid max-w-2xl grid-cols-2 items-center gap-x-8 py-10 px-5 sm:grid-cols-1 sm:gap-y-12 sm:px-7 lg:max-w-7xl lg:grid-cols-2 lg:px-8 lg:py-10"
	>
		<div>
			<h2
				class="mt-5 text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
			>
				{{ config('constants.LISTINGS_CARD.TITLE') }}
			</h2>
			<p class="mt-4 text-center text-gray-500">
				{{ config('constants.LISTINGS_CARD.DESCRIPTION') }}
			</p>
			<div class="mt-8 flex flex-wrap justify-center gap-6 px-6">
				<button
					class="btn btn-teal hover:bg-white hover:text-black"
					type="button"
				>Explore now!</button>
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
					@foreach ($items as $item)
						<x-carousel.carousel-item :item="$item"/>
					@endforeach
				</div>
				<div
					class="absolute bottom-5 left-1/2 z-30 flex -translate-x-1/2 space-x-3">
					@foreach ($items as $item)
						<x-carousel.carousel-button />
					@endforeach
				</div>

				<!-- Slider controls -->
				<button
					class="group absolute top-0 left-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
					data-carousel-prev
					type="button"
				>
					<span
						class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70 sm:h-10 sm:w-10"
					>
						<svg
							aria-hidden="true"
							class="h-5 w-5 text-white dark:text-gray-800 sm:h-6 sm:w-6"
							fill="none"
							stroke="currentColor"
							viewBox="0 0 24 24"
							xmlns="http://www.w3.org/2000/svg"
						>
							<path
								d="M15 19l-7-7 7-7"
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
							></path>
						</svg>
						<span class="sr-only">Previous</span>
					</span>
				</button>
				<button
					class="group absolute top-0 right-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
					data-carousel-next
					type="button"
				>
					<span
						class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70 sm:h-10 sm:w-10"
					>
						<svg
							aria-hidden="true"
							class="h-5 w-5 text-white dark:text-gray-800 sm:h-6 sm:w-6"
							fill="none"
							stroke="currentColor"
							viewBox="0 0 24 24"
							xmlns="http://www.w3.org/2000/svg"
						>
							<path
								d="M9 5l7 7-7 7"
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
							></path>
						</svg>
						<span class="sr-only">Next</span>
					</span>
				</button>
			</div>
		</dl>
	</div>
</div>
