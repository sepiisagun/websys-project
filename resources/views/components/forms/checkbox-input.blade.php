@props([
	'id',
	'name',
	'disabled' => false,
	'required' => false
])

<input
	{{ $disabled ? 'disabled' : '' }}
	{{ $required ? 'required' : '' }}
	{!! $attributes->merge([
	    'class' => '
	            w-4
	            h-4
	            border
	            border-neutral-300
	            rounded
	            bg-neutral-50
	            focus:ring-3
	            focus:ring-blue-300
	            dark:bg-neutral-600
	            dark:border-neutral-500
	            dark:focus:ring-blue-600
	            dark:ring-offset-neutral-800
	            dark:focus:ring-offset-neutral-800',
	    'type' => 'checkbox',
	]) !!}
	id="{{ $id }}",
	name="{{ $name }}",
/>
