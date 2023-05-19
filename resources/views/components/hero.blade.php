<div class="mx-auto max-w-full">
	<div class="relative h-[500px]">
		<div
			class="absolute flex h-[500px] max-h-[500px] w-full flex-col justify-center bg-black/70 text-center text-gray-200"
		>
			<h1
				class="px-5 text-5xl font-bold text-white sm:text-6xl md:text-7xl lg:text-8xl"
			> LIVE
				<span
					class="bg-gradient-to-r from-sky-300 to-white bg-clip-text text-transparent dark:bg-gradient-to-r dark:from-cyan-300 dark:to-blue-700"
				>THERE
				</span>
			</h1>
			<p class="text-white-800 px-6 text-lg">
				Book unique homes & experience a city like a local.
			</p>

			<div class="mt-8 flex flex-wrap justify-center gap-6 px-6">
				<a
					class="btn btn-sky mx-2 px-5 py-2.5 text-center text-sm font-medium hover:bg-sky-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-white dark:text-black dark:hover:bg-sky-800 dark:hover:text-white dark:focus:ring-sky-800"
					href="{{ route('house.index') }}"
				>
					{{ config('constants.BUTTON_LABELS.BOOK') }}
				</a>
				<a
					class="btn dark:focus:ring-sky-800' mx-2 bg-white px-5 py-2.5 text-center text-sm font-medium text-black hover:bg-sky-800 hover:text-white focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-sky-900 dark:text-white dark:hover:bg-sky-700 dark:hover:text-white"
					href="{{ route('house.index') }}"
				>
					{{ config('constants.BUTTON_LABELS.LEARN_MORE') }}
				</a>
			</div>
		</div>

		<div
			class="h-[500px] w-full bg-cover bg-fixed bg-no-repeat"
			style="background-image: url('/img/cover1.png');"
		>
		</div>
	</div>
</div>
