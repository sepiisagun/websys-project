@props([
	'id',
	'name',
	'disabled' => false,
	'required' => false,
	'value' => ''
])

<x-icons.datepicker-icon />
<input
	class="block w-full rounded-xs border border-neutral-300 bg-neutral-50 p-2.5 pl-10 text-sm text-neutral-900 focus:border-blue-500 focus:ring-blue-500 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white dark:placeholder-neutral-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
	{{ $attributes->merge([
		'type' => 'text'
	]) }}
	datepicker
	datepicker-autohide
	placeholder="Select a date"
	datepicker-format="dd/mm/yyyy"
	id="{{ $id }}"
	name="{{ $name }}"
	value="{{ $value }}"
	{{ $disabled ? 'disabled' : '' }}
	{{ $required ? 'required' : '' }}
>
