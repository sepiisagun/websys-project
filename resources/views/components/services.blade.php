<div class="bg-slate-100">
	<div
		class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 py-24 px-4 sm:px-6 sm:py-32 lg:max-w-7xl lg:grid-cols-2 lg:px-8"
	>
		<div>
			<h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
				{{ config('constants.SERVICES_CARD.TITLE') }}
			</h2>
			<p class="mt-4 text-gray-500">
				{{ config('constants.SERVICES_CARD.DESCRIPTION') }}
			</p>

			<dl
				class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8"
			>
				@foreach (config('constants.SERVICES_ITEMS') as $item)
					<x-services-item :item="$item" />
				@endforeach
			</dl>
		</div>
		<div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
			@foreach (config('constants.SERVICES_IMAGE') as $item)
				<x-services-image :item="$item" />
			@endforeach
		</div>
	</div>
</div>
