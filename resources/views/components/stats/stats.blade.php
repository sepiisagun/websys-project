<div class="bg-neutral-900 dark:bg-sky-700 py-24 sm:py-32">
	<div class="mx-auto max-w-7xl px-6 lg:px-8">
		<dl class="grid grid-cols-1 gap-y-16 gap-x-8 text-center lg:grid-cols-3">
			@foreach (config('constants.STATS_ITEMS') as $item)
			<x-stats.stats-item :item="$item" />
			@endforeach
		</dl>
	</div>
</div>