@props([
    'href' => '#',
])

<a
	{{ $attributes->merge([
	    'class' => '
				btn
	            bg-white
				text-black
	            hover:bg-sky-800
				hover:text-white
	            focus:ring-sky-800
	            outline-none
	            ring-blue-300
	            font-medium
	            text-sm
	            px-5
	            py-2.5
	            mx-2
	            text-center
				hover:bg-sky-600
	            dark:bg-sky-800
				dark:text-white
	            dark:hover:bg-sky-700
	            dark:focus:ring-sky-800',
	]) }}
	href="{{ $href }}",
>
	{{ $slot }}
</a>
