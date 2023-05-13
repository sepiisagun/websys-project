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
	            bg-neutral-50
	            border
	            border-neutral-300
	            text-neutral-300
	            text-sm
	            rounded-sm
	            focus:ring-blue-500
	            focus:border-blue-500
	            block
	            w-full
	            p-2.5
	            dark:bg-neutral-700
	            dark:border-neutral-600
	            dark:placeholder-neutral-400
	            dark:text-white
	            dark:focus:ring-blue-500
	            dark:focus:border-blue-500',
	    'type' => 'text',
	]) !!}
	id="{{ $id }}",
	name="{{ $name }}",
	placeholder="{{ $placeholder }}"
/>