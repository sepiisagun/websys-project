@props([
	'id'
])

<div
	{{ $attributes->merge([
	    'class' => '
	            fixed
	            top-0
	            left-0
	            right-0
	            z-50
	            w-full
	            p-4
	            hidden
	            overflow-x-hidden
	            overflow-y-auto
	            md:inset-0
	            h-modal
	            md:h-full
	        ',
	]) }}
	aria-hidden="true"
	id="{{ $id }}"
	tabindex="-1"
>

	{{ $slot }}
</div>
