@props([
    'item'
])

<li>
	<div class="flex items-center gap-x-6">
		<img
			alt="{{ $item['alt'] }}"
			class="h-16 w-16 rounded-full"
			src="{{ $item['image'] }}"
		>
		<div>
			<h3 class="text-base font-semibold leading-7 tracking-tight text-white">
                {{ $item['name'] }}
            </h3>
			<p class="text-sm font-semibold leading-6 text-cyan-500">
                {{ $item['title'] }}
			</p>
		</div>
	</div>
</li>
