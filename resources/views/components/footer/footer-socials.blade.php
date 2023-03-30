@props(['d', 'href' => '#'])
<a
	class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
	href="{{ $href }}"
>
	<svg
		aria-hidden="true"
		class="h-5 w-5"
		fill="currentColor"
		viewBox="0 0 24 24"
	>
		<path
			clip-rule="evenodd"
			d="{{ $d }}"
			fill-rule="evenodd"
		/>
	</svg>
	<span class="sr-only">
		{{ $slot }}
	</span>
</a>
