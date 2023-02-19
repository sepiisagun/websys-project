<footer
	class="fixed bottom-0 w-full bg-white p-2 shadow dark:bg-gray-900 md:px-6 md:py-6"
>
	<div class="sm:flex sm:items-center sm:justify-between">
		<a
			class="mb-4 flex items-center sm:mb-0"
			href="https://flowbite.com/"
		>
			<img
				alt="somelogo"
				class="mr-3 h-8"
				src="https://flowbite.com/docs/images/logo.svg"
			/>
			<span
				class="self-center whitespace-nowrap text-2xl font-semibold dark:text-white"
			>{{ config('app.name') }}</span>
		</a>
		<ul
			class="mb-6 flex flex-wrap items-center text-sm text-gray-500 dark:text-gray-400 sm:mb-0"
		>
			@foreach (config('constants.FOOTER_LINKS') as $link)
				<x-footer-link
					href="{{ $link['link'] ? route(Arr::get($link, 'link')) : '#' }}"
				>
					{{ Arr::get($link, 'label') }}
				</x-footer-link>
			@endforeach
		</ul>
	</div>
	<hr class="my-4 border-gray-200 dark:border-gray-700 sm:mx-auto lg:my-6" />
	<span class="block text-sm text-gray-500 dark:text-gray-400 sm:text-center">
		{{ config('constants.FOOTER_COPYRIGHT') }}
	</span>
</footer>
