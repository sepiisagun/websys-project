@props([
    'item'
])

<img
	alt="{{ $item['alt'] }}"
	class="rounded-lg bg-gray-100"
    src="{{ $item['src'] }}"
>
