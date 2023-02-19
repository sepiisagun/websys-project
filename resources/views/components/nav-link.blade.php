@props([
	'active'
])

@php
	$classes = $active ?? false ? 'bg-primary-700 lg:text-primary-700 block rounded py-2 pr-4 pl-3 text-gray-400 dark:text-white lg:bg-transparent lg:p-0' : 'lg:hover:text-primary-700 block border-b border-gray-100 py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white lg:border-0 lg:p-0 lg:hover:bg-transparent lg:dark:hover:bg-transparent lg:dark:hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
	{{ $slot }}
</a>
