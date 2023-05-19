@props([
    'item'
])

<div class="mx-auto flex max-w-xs flex-col gap-y-4">
	<dt class="bg-gradient-to-r from-neutral-500 to-neutral-900 bg-clip-text text-transparent dark:bg-gradient-to-r dark:from-cyan-200 dark:to-white">
		{{ $item['label'] }}
	</dt>
	<dd
		class="order-first text-3xl font-semibold tracking-tight bg-gradient-to-r from-neutral-500 to-neutral-900 bg-clip-text text-transparent dark:text-white sm:text-5xl"
	>
        {{ $item['description'] }}
    </dd>
</div>
