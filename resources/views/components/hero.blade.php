{{-- for cover --}}
<div class="mx-auto max-w-full">
	<div class="relative h-[500px]">
		{{-- overlay --}}
		<div
			class="absolute flex h-[500px] max-h-[500px] w-full flex-col justify-center rounded-t-lg bg-black/50 text-center text-gray-200"
		>
			<h1 class="px-5 text-5xl font-bold sm:text-6xl md:text-7xl lg:text-8xl"> LIVE
				<span class="text-blue-300">THERE </span>
			</h1>
			<p class="text-white-800 px-6 text-lg">
				Book unique homes & experience a city like a local.
			</p>

			{{-- div for buttons --}}
			<div class="mt-8 flex flex-wrap justify-center gap-6 px-6">
				<button
					class="btn btn-blue hover:bg-white hover:text-black"
					type="button"
				>Book Now</button>
				<button
					class="btn btn-white hover:bg-gray-800 hover:text-white"
					type="button"
				>Learn about
					Airbnb</button>
			</div>
		</div>

		{{-- for cover img --}}
		<div
			class="h-[500px] w-full rounded-t-lg bg-cover bg-fixed bg-no-repeat"
			style="background-image: url('./img/cover.png');"
		></div>
	</div>
</div>
