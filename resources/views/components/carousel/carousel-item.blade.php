@props([
    'item',
])

<div
	class="hidden duration-700 ease-in-out"
	data-carousel-item
>
	<span
		class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-2xl font-semibold text-white dark:text-gray-800 sm:text-3xl"
	>
        {{ $item['name'] }}
    </span>
	<img
		alt="..."
		class="absolute top-1/2 left-1/2 block w-full -translate-x-1/2 -translate-y-1/2"
		src="/img/{{ $item['image_path'] }}"
	>
</div>
