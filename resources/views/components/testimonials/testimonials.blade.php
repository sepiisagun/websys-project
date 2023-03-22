<div class="bg-slate-50 dark:bg-neutral-900">
	<div
		class="gap-y-15 mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 py-10 px-5 sm:gap-y-12 sm:px-7 lg:max-w-7xl lg:grid-cols-1 lg:px-8 lg:py-10"
	>
		<div>
			<h2
				class="mt-5 text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
			>
				<span
					class="bg-gradient-to-r from-neutral-500 to-neutral-900 bg-clip-text text-transparent dark:bg-gradient-to-r dark:from-cyan-200 dark:to-blue-500"
				>{{ config('constants.TESTIMONIAL_CARD.TITLE') }} </span>
			</h2>
			<p class="mt-4 text-center text-gray-500 dark:text-slate-400">
				{{ config('constants.TESTIMONIAL_CARD.DESCRIPTION') }}
			</p>

		</div>
		<dl
			class="mt-2 grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2 sm:gap-y-4 lg:grid-cols-4 lg:gap-x-8"
		>
			@foreach (config('constants.TESTIMONIAL_ITEMS') as $item)
				<x-testimonials.testimonial-item :item="$item" />
			@endforeach
		</dl>
	</div>
</div>
