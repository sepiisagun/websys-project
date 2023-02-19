{{-- <a {{ $attributes->merge(['class' => 'mr-4 hover:underline md:mr-6']) }}>
	{{ $slot }}
</a> --}}

@props([
	'item'
])

<div>
	<h2 class="mb-6 text-sm font-semibold uppercase text-gray-900 dark:text-white">
		{{ $item['label'] }}
	</h2>
	<ul class="text-gray-600 dark:text-gray-400">
		@foreach (Arr::get($item, 'tabs') as $link)
			@if ($loop->index < 1)
				<li class="mb-4">
			@else
				<li>
			@endif
					<a
						class="hover:underline"
						href="{{ $link['link'] ? route($link['link']) : '#' }}"
					>
						{{ $link['label'] }}
					</a>
				</li>
		@endforeach
	</ul>
</div>
