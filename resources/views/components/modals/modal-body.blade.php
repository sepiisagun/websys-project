<div
	{{ $attributes->merge([
	    'class' => '
	            px-6
	            pt-2
	            pb-6
	            space-y-6
	        ',
	]) }}
>
	{{ $slot }}
</div>
