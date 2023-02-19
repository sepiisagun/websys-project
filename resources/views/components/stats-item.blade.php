@props([
    'item'
])

<div class="mx-auto flex max-w-xs flex-col gap-y-4">
	<dt class="text-base leading-7 text-white">
		{{ $item['label'] }}
	</dt>
	<dd
		class="order-first text-3xl font-semibold tracking-tight text-white sm:text-5xl"
	>
        {{ $item['description'] }}
    </dd>
</div>
