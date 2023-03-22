@props([
'house',
'avgRating'
])

<section class="text-gray-400 bg-white body-font overflow-hidden dark:bg-slate-900">
	<div
		class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 py-8 px-4 sm:px-6 sm:py-10 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
		<div class="max-w-2xl">

			<!--Title Section--->
			<h1 class="text-black font-semibold text-3xl title-font mb-1 mt-5"><span class="text-transparent bg-clip-text bg-gradient-to-r to-neutral-800 from-slate-600 dark:bg-gradient-to-r dark:to-blue-500 dark:from-cyan-200">{{ $house['name'] }}</h1></span>
			<h2 class="text-sm title-font text-black tracking-widest dark:text-slate-400">{{ $house['address'] }}</h2>

			<!--Rating--->
			<div class="flex flex-row justify-between my-10">
				@for ($avgRating = 0; $avgRating < 5; $avgRating++) @if ($avgRating>= ($avgRating + 1))
					<x-icons.rating-star>
						{{ $avgRating + 1 }}
					</x-icons.rating-star>
					@else
					<x-icons.empty-star>
						{{ $avgRating + 1 }}
					</x-icons.empty-star>
					@endif
					@endfor
					<p class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 font-normal text-base leading-4 text-gray-700 hover:underline hover:text-gray-800 dark:text-slate-400
						duration-100 cursor-pointer">
						22 reviews</p>
			</div>

			<div>
				<div class="border-t border-gray-200 pt-4">
					<dt class="font-medium text-gray-900 dark:text-white">Description</dt>
					<dd class="mt-2 text-sm text-gray-500 dark:text-slate-300">{{ $house['description'] }}</dd>
				</div>

				<dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
					<div class="border-t border-gray-200 pt-4">
						<dt class="font-medium text-gray-900 dark:text-white">Capacity</dt>
						<dd class="mt-2 text-sm text-gray-500 dark:text-slate-300"">For {{ $house['capacity'] }}
							persons</dd>
					</div>

					<div class=" border-t border-gray-200 pt-4">
						<dt class="font-medium text-gray-900 dark:text-white">Price</dt>
						<dd class="mt-2 text-sm text-gray-500 dark:text-slate-300">${{ $house['price'] }}</dd>
					</div>

				</dl>
			</div>
			<!--Total Price, Reserve Button, Wishlist--->
			<div class="flex pt-8 ml-auto">
				{{-- <span class="title-font font-semibold text-2xl text-black">$58.00</span> --}}
				<form action="{{ route('reserve.create') }}" method="GET">
					@csrf
					<x-forms.primary-button>
						{{ __('Reserve') }}
					</x-forms.primary-button>
				</form>
				<button
					class="rounded-full w-10 h-10 bg-gray-800 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4 hover:border-gray-300">
					<svg fill="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
						viewBox="0 0 24 24">
						<path
							d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
						</path>
					</svg>
				</button>
			</div>
		</div>
		<!--House Gallery--->
		<div class="grid grid-cols-1 grid-rows-1 gap-4 sm:gap-6 lg:gap-8">
			<div class="grid grid-cols-1 grid-rows-1 gap-2 pt-2">

				<!--Description Tabs--->
				<div class="mb-4  dark:border-gray-700">
					<div class="mb-4  dark:border-gray-700">
						<div class="grid gap-1 house-img">
							<div class="img-container">
								<img class="h-500px w-500px rounded-sm" src="/img/{{ $house['image_path'] }}" alt=""
									id="imageBox">
							</div>

							<div class="house-small-img">
								<div class="grid grid-cols-5 gap-2 px-5 mx-5">
									<div>
										<img class="h-auto max-w-full rounded-sm"
											src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
											alt="" onclick="myFunction(this)">
									</div>
									<div>
										<img class="h-auto max-w-full rounded-sm"
											src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
											alt="" onclick="myFunction(this)">
									</div>
									<div>
										<img class="h-auto max-w-full rounded-sm"
											src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg"
											alt="" onclick="myFunction(this)">
									</div>
									<div>
										<img class="h-auto max-w-full rounded-sm"
											src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg"
											alt="" onclick="myFunction(this)">
									</div>
									<div>
										<img class="h-auto max-w-full rounded-sm"
											src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg"
											alt="" onclick="myFunction(this)">
									</div>
								</div>
							</div>
						</div>
						<script>
							function myFunction(smallImg){
									var fullImg = document.getElementById("imageBox");
									fullImg.src = smallImg.src;
								}
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>