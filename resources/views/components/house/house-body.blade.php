@props([
	'item'
])

<section class="text-gray-400 bg-white body-font overflow-hidden">
	<div class="container px-5 py-24 mx-auto ">
	  <div class="lg:w-4/5 mx-auto flex flex-wrap">
		<div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
			
			<!--Breadcrumb--->
			<nav class="flex pb-12" aria-label="Breadcrumb">
				<ol class="inline-flex items-center space-x-1 md:space-x-3">
				<li class="inline-flex items-center">
					<a href="{{ route("homepage")  }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-teal-600">
					<svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
					Home
					</a>
				</li>
				<li>
					<div class="flex items-center">
					<svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
					<a href="{{ route("house.index")  }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-teal-600 md:ml-2">Listings</a>
					</div>
				</li>
				<li aria-current="page">
					<div class="flex items-center">
					<svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
					<span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ $item['name'] }}</span>
					</div>
				</li>
				</ol>
			</nav>
  
			<!--Title Section--->
			<h1 class="text-black font-semibold text-3xl title-font mb-1">{{ $item['name'] }}</h1>
			<h2 class="text-sm title-font text-black tracking-widest">{{ $item['address'] }}</h2>
		  

			<!--Rating--->
			<div class="flex flex-row justify-between my-5">
				<img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail4-svg1.svg" alt="stars">
				<img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail4-svg1dark.svg" alt="stars">
				<p class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 font-normal text-base leading-4 text-gray-700 hover:underline hover:text-gray-800 dark:text-black duration-100 cursor-pointer">22 reviews</p>
			</div>

			<!--Description Tabs--->

			<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
				<ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
					<li class="mr-2" role="presentation">
						<button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Description</button>
					</li>
					<li class="mr-2" role="presentation">
						<button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="reviews-tab" data-tabs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
					</li>
					<li class="mr-2" role="presentation">
						<button class="inline-block p-4 border-b-2  rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Details</button>
					</li>
				</ul>
			</div>

			<!--Tabs Content--->
			<div id="myTabContent">

				<!--Description--->
				<div class="hidden p-4 rounded-sm bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<p class="leading-relaxed mb-4 text-gray-500 dark:text-gray-200">{{ $item['description'] }}</p>
					<div class="flex border-t border-gray-300 py-2">
						<span class="text-gray-500 dark:text-gray-400">House ID</span>
						<span class="ml-auto text-gray-500 dark:text-gray-400">{{ $item['id'] }}</span>
					  </div>
					  <div class="flex border-t border-gray-300 py-2">
						<span class="text-gray-500 dark:text-gray-400">Capacity</span>
						<span class="ml-auto text-gray-500 dark:text-gray-400">For {{ $item['capacity'] }} persons</span>
					  </div>
					  <div class="flex border-t border-b mb-6 border-gray-300 py-2">
						<span class="text-gray-500 dark:text-gray-400">Price</span>
						<span class="ml-auto text-gray-500 dark:text-gray-400">${{ $item['price'] }}</span>
					  </div>
				</div>

				<!--Reviews--->
				<div class="hidden p-4 rounded-sm bg-gray-50 dark:bg-gray-800" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
					<article>
						<div class="flex items-center mb-4 space-x-4">
							<img class="w-10 h-10 rounded-full" src="https://flowbite.com/docs/images/logo.svg" alt="">
							<div class="space-y-1 font-medium dark:text-white">
								<p>Jese Leos <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500 dark:text-gray-400">Joined on August 2014</time></p>
							</div>
						</div>
						<div class="flex items-center mb-1">
							<svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
							<svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Second star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
							<svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Third star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
							<svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fourth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
							<svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fifth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
							<h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">Thinking to buy another one!</h3>
						</div>
						<footer class="mb-5 text-sm text-gray-500 dark:text-gray-200"><p>Reviewed in the United Kingdom on <time datetime="2017-03-03 19:00">March 3, 2017</time></p></footer>
						<p class="mb-2 font-light text-gray-500 dark:text-gray-400">This is my third Invicta Pro Diver. They are just fantastic value for money. This one arrived yesterday and the first thing I did was set the time, popped on an identical strap from another Invicta and went in the shower with it to test the waterproofing.... No problems.</p>
						<p class="mb-3 font-light text-gray-500 dark:text-gray-400">It is obviously not the same build quality as those very expensive watches. But that is like comparing a Citroën to a Ferrari. This watch was well under £100! An absolute bargain.</p>
						<a href="#" class="block mb-5 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Read more</a>
						<aside>
							<p class="mt-1 text-xs text-gray-500 dark:text-gray-400">19 people found this helpful</p>
							<div class="flex items-center mt-3 space-x-3 divide-x divide-gray-200 dark:divide-gray-600">
								<a href="#" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-xs px-2 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Helpful</a>
								<a href="#" class="pl-4 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Report abuse</a>
							</div>
						</aside>
					</article>
				</div>

				<!--Details--->
				<div class="hidden p-4 rounded-sm bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
					<p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Details tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
				</div>
			</div>
			
			<!--Total Price, Reserve Button, Wishlist--->
			<div class="flex pt-8">
				{{-- <span class="title-font font-semibold text-2xl text-black">$58.00</span> --}}
				<button class="flex ml-auto text-white bg-gray-900 border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded">Reserve</button>
				<button class="rounded-full w-10 h-10 bg-gray-800 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4 hover:border-gray-300">
			  		<svg fill="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
						<path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
			  		</svg>
					
				</button>
		  	</div>
		</div>

		<!--House Gallery--->
		<div class="w-full sm:w-100 md:w-100 lg:w-6/12 flex lg:flex-row flex-col lg:gap-4 sm:gap-4 gap-2">
			<div class="grid grid-cols-8 grid-rows-8 gap-2 pt-12">
				<figure class=" grid col-start-1 col-end-3 row-start-1 row-end-3">
					<img src="/img/{{ $item['image_path'] }}" alt="Gallery image 1" class="gallery__img1">
				</figure>
				<figure class="grid col-start-3 col-end-5 row-start-1 row-end-3">
					<img src="/img/{{ $item['image_path'] }}" alt="Gallery image 2" class="gallery__img2">
				</figure>
				<figure class="grid col-start-5 col-end-9 row-start-1 row-end-6">
					<img src="/img/{{ $item['image_path'] }}" alt="Gallery image 3" class="gallery__img3">
				</figure>
				<figure class="grid col-start-1 col-end-5 row-start-3 row-end-6">
					<img src="/img/{{ $item['image_path'] }}" alt="Gallery image 4" class="gallery__img4">
				</figure>
			</div>
		</div>

		<!--Additional Info
		<div class="flex justify-center items-center w-full">
			<div class="w-full sm:w-96 md:w-8/12 lg:w-full grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 lg:gap-28 sm:gap-x-6 sm:gap-y-12 gap-y-12 sm:mt-14 mt-10">
				<div>
					<img class="dark:hidden"  src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail4-svg2.svg" alt="drink">
					<img class="hidden dark:block"  src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail4-svg2dark.svg" alt="drink">
					<p class="font-semibold text-xl leading-5 text-gray-800 dark:text-white lg:mt-10 mt-9">Great for drinks</p>
					<p class="text-normal text-base leading-6 text-gray-600  mt-4">Here are all the great cocktail recipes you should know how to make, from the margarita to the whiskey sour. Cheers!</p>
				</div>
				<div>
					<img class="dark:hidden"  src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail4-svg3.svg" alt="hardware">
					<img class="hidden dark:block"  src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail4-svg3dark.svg" alt="hardware">
					<p class="font-semibold text-xl leading-5 text-gray-800 dark:text-white lg:mt-10 mt-9">Durable hardware</p>
					<p class="text-normal text-base leading-6 text-gray-600  mt-4">Product durability is a key aspect of achieving a circular economy. ... Moreover, enhancing the durability of individual hardware components</p>
				</div>
				<div>
					<img class="dark:hidden"  src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail4-svg5.svg" alt="Eco-friendly">
					<img class="hidden dark:block"  src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail4-svg5dark.svg" alt="Eco-friendly">
					<p class="font-semibold text-xl leading-5 text-gray-800 dark:text-white lg:mt-10 mt-9">Eco-friendly</p>
					<p class="text-normal text-base leading-6 text-gray-600  mt-4">They re-use, recycle and reduce waste disposal in their lives. They conserve energy and natural resources</p>
				</div>
				<div>
					<img class="dark:hidden"  src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail4-svg6.svg" alt="drink">
					<img class="hidden dark:block"  src="https://tuk-cdn.s3.amazonaws.com/can-uploader/productDetail4-svg6dark.svg
					" alt="drink">
					<p class="font-semibold text-xl leading-5 text-gray-800 dark:text-white lg:mt-10 mt-9">Minimal Design</p>
					<p class="text-normal text-base leading-6 text-gray-600  mt-4">Minimalist interior design is very similar to modern interior design and involves using the bare essentials</p>
				</div>
			</div>
		</div>--->
		</div>
	</div>
</section>
  
