@props(['item'])

<div class="group relative">
	<div
		class="group relative h-100 max-w-sm cursor-pointer items-center justify-center overflow-hidden rounded-t-lg shadow transition-shadow hover:shadow-xl hover:shadow-black/30">
		<img alt="" class="rounded-t-lg transition-transform duration-500 group-hover:scale-90"
			src="/img/{{ $item['image_path'] }}" />
		<div
			class="from-none absolute inset-0 rounded-t-lg bg-gradient-to-b via-transparent to-black group-hover:from-black/60 group-hover:via-black/70 group-hover:to-black/80">
			<div
				class="absolute inset-0 flex translate-y-[60%] flex-col items-center justify-center px-9 text-center transition-all duration-500 group-hover:translate-y-0">
				<a class="btn-teal inline-flex items-center rounded-lg px-3 py-2 text-center text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
					href="{{ route("house.show", $item->id) }}">
					{{ config('constants.FORM_LABELS.READ_MORE') }}
					<svg aria-hidden="true" class="ml-2 -mr-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg">
						<path clip-rule="evenodd"
							d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
							fill-rule="evenodd">
						</path>
					</svg>
				</a>
			</div>
		</div>
		<div class="p-5">
			<a href="{{ route("house.show", $item->id) }}">
				<h6 class="mb-5 block h-10 align-top text-xs font-medium tracking-tight text-teal-400">
					{{ $item['address'] }}
				</h6>
				<h5 class="text-1xl block align-middle font-bold tracking-tight text-gray-900 dark:text-black">
					{{ $item['name'] }}
				</h5>
			</a>
			<p class="text-md inline-block align-bottom font-normal text-gray-700 dark:text-gray-400">
			<div class="mb-1 flex items-center">
				${{ $item['price'] }}/night |
				@for ($i = 0; $i < $item['rating']; $i++) <x-icons.rating-star>
					{{ $i + 1 }}
					</x-icons.rating-star>
					@endfor
			</div>
			</p>
		</div>
	</div>
</div>