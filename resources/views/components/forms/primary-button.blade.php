@props([
    'onclick' => '',
])

<button
	{{ $attributes->merge([
	    'type' => 'submit',
	    'class' => '
				btn
	            text-white
	            bg-blue-700
	            hover:bg-blue-800
	            focus:ring-4
	            focus:outline-none
	            focus:ring-blue-300
	            font-medium
	            text-sm
	            px-5
	            py-2.5
	            mx-2
	            text-center
	            dark:bg-blue-600
	            dark:hover:bg-blue-700
	            dark:focus:ring-blue-8000',
	]) }}
	onclick="{{ $onclick }}"
>
	{{ $slot }}
</button>
