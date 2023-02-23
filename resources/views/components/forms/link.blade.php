@props([
    'href' => '#',
])

<a
	{{ $attributes->merge([
	    'class' => '
	            text-sm
	            text-blue-700
	            hover:underline
	            dark:text-blue-500
	        ',
	]) }}
	href="{{ $href }}"
>
	{{ $slot }}
</a>
