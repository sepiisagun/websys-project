@props([
	'id',
	'name',
	'disabled' => false,
	'required' => false,
])

<x-icons.datepicker-icon />
<input
	class="block w-full rounded-xs border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
	{{ $attributes->merge([
		'type' => 'text'
	]) }}
	datepicker
	datepicker-autohide
	placeholder="Select a date"
	datepicker-format="dd/mm/yyyy"
	id="{{ $id }}"
	name="{{ $name }}"
	{{ $disabled ? 'disabled' : '' }}
	{{ $required ? 'required' : '' }}
>
