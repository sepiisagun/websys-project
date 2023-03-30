@props(['id', 'item'])

<article
	class="rounded-md border border-gray-200 bg-white p-6 shadow-md dark:border-gray-700 dark:bg-gray-800"
>
	<a href="{{ route($item['link'], $id) }}">
		<div>
			<div class="mb-20 flex items-center justify-between text-gray-500">
				<span
					class="bg-primary-100 text-primary-800 dark:bg-primary-200 dark:text-primary-800 inline-flex items-center rounded px-2.5 py-0.5 font-medium"
				>
					<svg
						aria-hidden="true"
						focusable="false"
						role="presentation"
						style="display: block; height: 32px; width: 32px; fill: currentcolor;"
						viewBox="0 0 32 32"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path d="{{ $item['icon'] }}"></path>
					</svg>
				</span>
			</div>
			<h2
				class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
			>
				<p>{{ $item['title'] }}</p>
			</h2>
			<p class="mb-5 font-light text-gray-500 dark:text-gray-400">
				{{ $item['description'] }}
			</p>
		</div>
	</a>
</article>
