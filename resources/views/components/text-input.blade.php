@props([
	'id',
	'name',
	'placeholder' => Str::replace('_', ' ', Str::title($name)),
	'disabled' => false,
	'required' => false
])

<input
	{{ $disabled ? 'disabled' : '' }}
	{{ $required ? 'required' : '' }}
	{!! $attributes->merge([
	    'class' => '
	            bg-gray-50
	            border
	            border-gray-300
	            text-gray-900
	            text-sm
	            rounded-sm
	            focus:ring-blue-500
	            focus:border-blue-500
	            block
	            w-full
	            p-2.5
	            dark:bg-gray-700
	            dark:border-gray-600
	            dark:placeholder-gray-400
	            dark:text-white
	            dark:focus:ring-blue-500
	            dark:focus:border-blue-500',
	    'type' => 'text',
	]) !!}
	id="{{ $id }}",
	name="{{ $name }}",
	placeholder="{{ $placeholder }}"
/>
