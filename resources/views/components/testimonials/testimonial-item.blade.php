@props([
    'item'
])

<figure
	class="flex flex-col items-center justify-center rounded-t-lg border-b border-gray-200 bg-white p-8 text-center dark:border-gray-700 dark:bg-gray-800 md:rounded-t-none md:rounded-tl-lg md:border-r"
>
	<blockquote
		class="mx-auto mb-4 max-w-2xl text-gray-500 dark:text-gray-400 lg:mb-8"
	>
		<h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            {{ $item['excerpt'] }}
        </h3>
		<p class="my-4 font-light">
            {{ $item['comment'] }}
        </p>
	</blockquote>
	<figcaption class="flex items-center justify-center space-x-3">
		<img
			alt="{{ $item['alt'] }}"
			class="h-9 w-9 rounded-full"
			src="{{ $item['image'] }}"
		>
		<div class="space-y-0.5 text-left font-medium dark:text-white">
			<div>
                {{ $item['name'] }}
            </div>
			<div class="text-sm font-light text-gray-500 dark:text-gray-400">
                {{ $item['title'] }}
            </div>
		</div>
	</figcaption>
</figure>
