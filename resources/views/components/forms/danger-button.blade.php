@props([
    'onclick' => '',
])

<button
	{{ $attributes->merge([
	    'type' => 'submit',
	    'class' => '
				btn
				bg-red-700
                text-white
	            focus:ring-4
	            focus:outline-none
	            focus:ring-red-300
                hover:bg-red-800
	            font-medium
	            text-sm
	            px-5
	            py-2.5
	            mx-2
	            text-center
				hover:bg-sky-600
	            dark:bg-red-600
				dark:text-white
	            dark:hover:bg-red-800
	            dark:focus:ring-red-900'
	]) }}
	onclick="{{ $onclick }}"
>
	{{ $slot }}
</button>
