@props(['house', 'avgRating'])

<section
	class="body-font overflow-hidden bg-white text-gray-400 dark:bg-slate-900"
>
	<div
		class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-y-16 gap-x-8 py-8 px-4 sm:px-6 sm:py-10 lg:max-w-7xl lg:grid-cols-2 lg:px-8"
	>
		<div class="max-w-2xl">

			<!--Title Section--->
			<h1 class="title-font mb-1 mt-5 text-3xl font-semibold text-black"><span
					class="bg-gradient-to-r from-slate-600 to-neutral-800 bg-clip-text text-transparent dark:bg-gradient-to-r dark:from-cyan-200 dark:to-blue-500"
				>{{ $house['name'] }}</h1></span>
			<h2 class="title-font text-sm tracking-widest text-black dark:text-slate-400">
				{{ $house['address'] }}</h2>

			<!--Rating--->
			<div class="my-10 flex flex-row justify-between">
				<div class="flex flex-row">
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
				<p
					class="cursor-pointer text-base font-normal leading-4 text-gray-700 duration-100 hover:text-gray-800 hover:underline focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 dark:text-slate-400"
				>
					22 reviews
				</p>
			</div>

			<div>
				<div class="border-t border-gray-200 pt-4">
					<dt class="font-medium text-gray-900 dark:text-white">Description</dt>
					<dd class="mt-2 text-sm text-gray-500 dark:text-slate-300">
						{{ $house['description'] }}</dd>
				</div>

				<dl
					class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8"
				>
					<div class="border-t border-gray-200 pt-4">
						<dt class="font-medium text-gray-900 dark:text-white">Capacity</dt>
						<dd class="mt-2 text-sm text-gray-500 dark:text-slate-300"">For
							{{ $house['capacity'] }}
							persons</dd>
					</div>

					<div class="border-t border-gray-200 pt-4">
						<dt class="font-medium text-gray-900 dark:text-white">Price</dt>
						<dd class="mt-2 text-sm text-gray-500 dark:text-slate-300">
							${{ $house['price'] }}</dd>
					</div>

				</dl>
			</div>
			<!--Total Price, Reserve Button, Wishlist--->
			<div class="ml-auto flex pt-8">
				{{-- <span class="title-font font-semibold text-2xl text-black">$58.00</span> --}}
				<form
					action="{{ route('reserve.create') }}"
					method="GET"
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
		</div>
		<!--House Gallery--->
		<div class="grid grid-cols-1 grid-rows-1 gap-4 sm:gap-6 lg:gap-8">
			<div class="grid grid-cols-1 grid-rows-1 gap-2 pt-2">

				<!--Description Tabs--->
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

							{{-- <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
					<ul
						class="-mb-px flex flex-wrap text-center text-sm font-medium"
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
				</div>

				<!--Tabs Content--->
				<div id="myTabContent">

					<!--Description--->
					<div
						aria-labelledby="profile-tab"
						class="hidden rounded-sm bg-gray-50 p-4 dark:bg-gray-800"
						id="profile"
						role="tabpanel"
					>
						<p class="mb-4 leading-relaxed text-gray-500 dark:text-gray-200">
							{{ $item['description'] }}</p>
						<div class="flex border-t border-gray-300 py-2">
							<span class="text-gray-500 dark:text-gray-400">House ID</span>
							<span
								class="ml-auto text-gray-500 dark:text-gray-400">{{ $item['id'] }}</span>
						</div>
						<div class="flex border-t border-gray-300 py-2">
							<span class="text-gray-500 dark:text-gray-400">Capacity</span>
							<span class="ml-auto text-gray-500 dark:text-gray-400">For
								{{ $item['capacity'] }}
								persons</span>
						</div>
						<div class="mb-6 flex border-t border-b border-gray-300 py-2">
							<span class="text-gray-500 dark:text-gray-400">Price</span>
							<span
								class="ml-auto text-gray-500 dark:text-gray-400">${{ $item['price'] }}</span>
						</div>
					</div>

					<!--Reviews--->
					<div
						aria-labelledby="reviews-tab"
						class="hidden rounded-sm bg-gray-50 p-4 dark:bg-gray-800"
						id="reviews"
						role="tabpanel"
					>
						<article>
							<div class="mb-4 flex items-center space-x-4">
								<img
									alt=""
									class="h-10 w-10 rounded-full"
									src="https://flowbite.com/docs/images/logo.svg"
								>
								<div class="space-y-1 font-medium dark:text-white">
									<p>Jese Leos <time
											class="block text-sm text-gray-500 dark:text-gray-400"
											datetime="2014-08-16 19:00"
										>Joined on August
											2014</time></p>
								</div>
							</div>
							<div class="mb-1 flex items-center">
								<svg
									aria-hidden="true"
									class="h-5 w-5 text-yellow-400"
									fill="currentColor"
									viewBox="0 0 20 20"
									xmlns="http://www.w3.org/2000/svg"
								>
									<title>First star</title>
									<path
										d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
									>
									</path>
								</svg>
								<svg
									aria-hidden="true"
									class="h-5 w-5 text-yellow-400"
									fill="currentColor"
									viewBox="0 0 20 20"
									xmlns="http://www.w3.org/2000/svg"
								>
									<title>Second star</title>
									<path
										d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
									>
									</path>
								</svg>
								<svg
									aria-hidden="true"
									class="h-5 w-5 text-yellow-400"
									fill="currentColor"
									viewBox="0 0 20 20"
									xmlns="http://www.w3.org/2000/svg"
								>
									<title>Third star</title>
									<path
										d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
									>
									</path>
								</svg>
								<svg
									aria-hidden="true"
									class="h-5 w-5 text-yellow-400"
									fill="currentColor"
									viewBox="0 0 20 20"
									xmlns="http://www.w3.org/2000/svg"
								>
									<title>Fourth star</title>
									<path
										d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
									>
									</path>
								</svg>
								<svg
									aria-hidden="true"
									class="h-5 w-5 text-yellow-400"
									fill="currentColor"
									viewBox="0 0 20 20"
									xmlns="http://www.w3.org/2000/svg"
								>
									<title>Fifth star</title>
									<path
										d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
									>
									</path>
								</svg>
								<h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">
									Thinking to buy
									another one!</h3>
							</div>
							<footer class="mb-5 text-sm text-gray-500 dark:text-gray-200">
								<p>Reviewed in the United Kingdom on <time
										datetime="2017-03-03 19:00">March 3,
										2017</time></p>
							</footer>
							<p class="mb-2 font-light text-gray-500 dark:text-gray-400">This is my
								third Invicta Pro
								Diver. They are just fantastic value for money. This one arrived
								yesterday and the first
								thing I did was set the time, popped on an identical strap from another
								Invicta and went
								in the shower with it to test the waterproofing.... No problems.</p>
							<p class="mb-3 font-light text-gray-500 dark:text-gray-400">It is
								obviously not the same
								build quality as those very expensive watches. But that is like
								comparing a Citroën to a
								Ferrari. This watch was well under £100! An absolute bargain.</p>
							<a
								class="mb-5 block text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"
								href="#"
							>Read
								more</a>
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
					</div>

					<!--Details--->
					<div
						aria-labelledby="settings-tab"
						class="hidden rounded-sm bg-gray-50 p-4 dark:bg-gray-800"
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

				<!--Total Price, Reserve Button, Wishlist--->
				<div class="flex pt-8">
					{{-- <span class="title-font font-semibold text-2xl text-black">$58.00</span> --}}
							{{-- <button
						class="ml-auto flex rounded border-0 bg-gray-900 py-2 px-6 text-white hover:bg-gray-600 focus:outline-none"
					>Reserve</button>
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
			</div>

			<!--House Gallery--->
			<div
				class="sm:w-100 md:w-100 flex w-full flex-col gap-2 sm:gap-4 lg:w-6/12 lg:flex-row lg:gap-4"
			>
				<div class="grid-rows-8 grid grid-cols-8 gap-2 pt-12">
					<figure class="col-start-1 col-end-3 row-start-1 row-end-3 grid">
						<img
							alt="Gallery image 1"
							class="gallery__img1"
							src="/img/{{ $item['image_path'] }}"
						>
					</figure>
					<figure class="col-start-3 col-end-5 row-start-1 row-end-3 grid">
						<img
							alt="Gallery image 2"
							class="gallery__img2"
							src="/img/{{ $item['image_path'] }}"
						>
					</figure>
					<figure class="col-start-5 col-end-9 row-start-1 row-end-6 grid">
						<img
							alt="Gallery image 3"
							class="gallery__img3"
							src="/img/{{ $item['image_path'] }}"
						>
					</figure>
					<figure class="col-start-1 col-end-5 row-start-3 row-end-6 grid">
						<img
							alt="Gallery image 4"
							class="gallery__img4"
							src="/img/{{ $item['image_path'] }}"
						>
					</figure>
				</div>
			</div> --}}
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
</section>
