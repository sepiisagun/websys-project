@props([
    'onclick' => '',
	// 'disabled' => false,
])

<button
	{{ $attributes->merge([
	    'type' => 'submit',
	    'class' => '
				btn
				btn-sky
	            focus:ring-4
	            focus:outline-none
	            focus:ring-blue-300
	            font-medium
	            text-sm
	            px-5
	            py-2.5
	            mx-2
	            text-center
				hover:bg-sky-700
				hover:text-white
	            dark:bg-white
				dark:text-black
	            dark:hover:bg-sky-800
				dark:hover:text-white
	            dark:focus:ring-sky-800',
	]) }}
	onclick="{{ $onclick }}"
	{{-- {{ $disabled ? 'disabled' : '' }} --}}
>
	{{ $slot }}
</button>
