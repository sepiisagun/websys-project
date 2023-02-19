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
	            border-gray-300
	            rounded
	            bg-gray-50
	            focus:ring-3
	            focus:ring-blue-300
	            dark:bg-gray-600
	            dark:border-gray-500
	            dark:focus:ring-blue-600
	            dark:ring-offset-gray-800
	            dark:focus:ring-offset-gray-800',
	    'type' => 'checkbox',
	]) !!}
	id="{{ $id }}",
	name="{{ $name }}",
/>
