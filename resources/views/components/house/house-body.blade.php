@props(['house', 'avgRating', 'ratings'])
<div class="bg-white dark:bg-neutral-900">
	<div
		class="py-30 lg:py-30 mx-auto grid max-w-2xl grid-cols-1 items-center gap-9 px-4 sm:px-6 sm:py-20 lg:max-w-7xl lg:grid-cols-2 lg:px-8"
	>
		<div>
			<h1 class="title-font mb-1 mt-5 text-3xl font-semibold text-black"><span
					class="bg-gradient-to-r from-slate-600 to-neutral-800 bg-clip-text text-transparent dark:bg-gradient-to-r dark:from-cyan-200 dark:to-blue-500"
				>{{ $house['name'] }}</h1></span>
			<h2 class="title-font text-sm tracking-widest text-black dark:text-slate-400">
				{{ $house['address'] }}</h2>

			<div class="mt-10 flex flex-row">
				@for ($i = 0; $i < 5; $i++)
					@if ($avgRating >= $i + 1)
						<x-icons.rating-star>
							{{ $avgRating + 1 }}
						</x-icons.rating-star>
					@else
						<x-icons.empty-star>
							{{ $avgRating + 1 }}
						</x-icons.empty-star>
					@endif
				@endfor
			</div>

			<dl
				class="mt-8 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-1 sm:gap-y-16 lg:gap-x-8"
			>
				<ul
					class="flex flex-wrap text-center text-sm font-medium"
					data-tabs-toggle="#myTabContent"
					id="myTab"
					role="tablist"
				>
					<li
						class="mr-2"
						role="presentation"
					>
						<button
							aria-controls="profile"
							aria-selected="false"
							class="inline-block rounded-t-lg border-b-2 p-4"
							data-tabs-target="#profile"
							id="profile-tab"
							role="tab"
							type="button"
						>Description</button>
					</li>
					<li
						class="mr-2"
						role="presentation"
					>
						<button
							aria-controls="reviews"
							aria-selected="false"
							class="inline-block rounded-t-lg border-b-2 p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300"
							data-tabs-target="#reviews"
							id="reviews-tab"
							role="tab"
							type="button"
						>Reviews</button>
					</li>
					<li
						class="mr-2"
						role="presentation"
					>
						<button
							aria-controls="settings"
							aria-selected="false"
							class="inline-block rounded-t-lg border-b-2 p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300"
							data-tabs-target="#settings"
							id="settings-tab"
							role="tab"
							type="button"
						>Details</button>
					</li>
				</ul>
			</dl>
			<div class="ml-auto flex pt-2">
				{{-- <span class="title-font font-semibold text-2xl text-black">$58.00</span> --}}
				<form
					action="{{ route('reserve.create', ['house_id' => $house->id]) }}"
					method="POST"
				>
					@csrf
					<x-forms.primary-button>
						{{ __('Reserve') }}
					</x-forms.primary-button>
				</form>
				<button
					class="ml-4 inline-flex h-10 w-10 items-center justify-center rounded-full border-0 bg-gray-800 p-0 text-gray-500 hover:border-gray-300"
				>
					<svg
						class="h-5 w-5"
						fill="white"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						viewBox="0 0 24 24"
					>
						<path
							d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"
						>
						</path>
					</svg>
				</button>
			</div>

			<div id="myTabContent">
				<!--Description--->
				<div
					aria-labelledby="profile-tab"
					class="hidden h-96 rounded-sm bg-gray-50 p-4 dark:bg-gray-800"
					id="profile"
					role="tabpanel"
				>
					<p class="mb-2 leading-relaxed text-gray-500 dark:text-gray-200">
						{{ $house['description'] }}</p>
					<div class="flex border-t border-gray-300 py-2">
						<span class="text-gray-500 dark:text-gray-400">House ID</span>
						<span
							class="ml-auto text-gray-500 dark:text-gray-400">{{ $house['id'] }}</span>
					</div>

					<div class="flex border-t border-gray-300 py-2">
						<span class="text-gray-500 dark:text-gray-400">Capacity</span>
						<span class="ml-auto text-gray-500 dark:text-gray-400">For
							{{ $house['capacity'] }} persons</span>
					</div>

					<div class="mb-6 flex border-t border-b border-gray-300 py-2">
						<span class="text-gray-500 dark:text-gray-400">Price</span>
						<span
							class="ml-auto text-gray-500 dark:text-gray-400">${{ $house['price'] }}</span>
					</div>
				</div>

				<!--Reviews--->
				<div
					aria-labelledby="reviews-tab"
					class="hidden h-96 rounded-sm bg-gray-50 p-4 dark:bg-gray-800"
					id="reviews"
					role="tabpanel"
				>
					@foreach ($ratings as $rating)
						<article>
							<div class="mb-4 flex items-center space-x-4">
								<img
									alt=""
									class="h-10 w-10 rounded-full"
									src="https://flowbite.com/docs/images/logo.svg"
								>

								<div class="font-medium dark:text-white">

									<p>{{ $rating->user->first_name . ' ' . $rating->user->last_name }}
										<time
											atetime="2014-08-16 19:00"
											class="block text-sm text-gray-500 dark:text-gray-400"
										>Joined on August 2014</time></p>

								</div>

							</div>
							<div class="mt-10 flex flex-row">
								@for ($i = 0; $i < 5; $i++)
									@if ($avgRating >= $i + 1)
										<x-icons.rating-star>
											{{ $avgRating + 1 }}
										</x-icons.rating-star>
									@else
										<x-icons.empty-star>
											{{ $avgRating + 1 }}
										</x-icons.empty-star>
									@endif
								@endfor
							</div>

							<h3 class="text-sm font-semibold text-gray-900 dark:text-white">
								{{ $rating['excerpt'] }}</h3>
							<p class="mb-3 text-sm font-light text-gray-500 dark:text-gray-400">
								{{ $rating['remark'] }}
							</p>

							<a
								class="mb-5 block text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"
								href="#"
							>Read more</a>
							<aside>
								<p class="mt-1 text-xs text-gray-500 dark:text-gray-400">19 people
									found this helpful
								</p>
								<div
									class="mt-3 flex items-center space-x-3 divide-x divide-gray-200 dark:divide-gray-600"
								>
									<a
										class="rounded-lg border border-gray-300 bg-white px-2 py-1.5 text-xs font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
										href="#"
									>Helpful</a>
									<a
										class="pl-4 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"
										href="#"
									>Report
										abuse</a>
								</div>
							</aside>
						</article>
					@endforeach
				</div>

				<!--Details--->
				<div
					aria-labelledby="settings-tab"
					class="hidden h-96 rounded-sm bg-gray-50 p-4 dark:bg-gray-800"
					id="settings"
					role="tabpanel"
				>
					<p class="text-sm text-gray-500 dark:text-gray-400">This is some
						placeholder content the <strong
							class="font-medium text-gray-800 dark:text-white"
						>Details tab's associated
							content</strong>. Clicking another tab will toggle the visibility of
						this one for the
						next. The tab JavaScript swaps classes to control the content visibility
						and styling.</p>
				</div>
			</div>
		</div>
		<div>
			<!--House Gallery--->
			<div class="grid grid-cols-1 grid-rows-1">
				<div class="grid grid-cols-1 grid-rows-1 gap-2 pt-2">
					<div class="mb-4 dark:border-gray-700">
						<div class="mb-4 dark:border-gray-700">
							<div class="house-img grid gap-1">
								<div class="img-container">
									<img
										alt=""
										class="h-500px w-500px rounded-sm"
										id="imageBox"
										src="/img/{{ $house['image_path'] }}"
									>
								</div>

								<div class="house-small-img">
									<div class="mx-5 grid grid-cols-5 gap-2 px-5">
										<div>
											<img
												alt=""
												class="h-auto max-w-full rounded-sm"
												onclick="myFunction(this)"
												src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
											>
										</div>
										<div>
											<img
												alt=""
												class="h-auto max-w-full rounded-sm"
												onclick="myFunction(this)"
												src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
											>
										</div>
										<div>
											<img
												alt=""
												class="h-auto max-w-full rounded-sm"
												onclick="myFunction(this)"
												src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg"
											>
										</div>
										<div>
											<img
												alt=""
												class="h-auto max-w-full rounded-sm"
												onclick="myFunction(this)"
												src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg"
											>
										</div>
										<div>
											<img
												alt=""
												class="h-auto max-w-full rounded-sm"
												onclick="myFunction(this)"
												src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg"
											>
										</div>
									</div>
								</div>
							</div>
							<script>
								function myFunction(smallImg) {
									var fullImg = document.getElementById("imageBox");
									fullImg.src = smallImg.src;
								}
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
