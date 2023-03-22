<div class="sm:py-25 bg-neutral-900 dark:bg-sky-900 py-24">
	<div
		class="mx-auto grid max-w-7xl gap-y-20 gap-x-8 px-6 lg:px-8 xl:grid-cols-3">
		<div class="max-w-2xl">
			<h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
				{{ config('constants.TEAM_CARD.TITLE') }}
			</h2>
			<p class="mt-6 text-lg leading-8 text-gray-200">
				{{ config('constants.TEAM_CARD.DESCRIPTION') }}
			</p>
		</div>
		<ul
			class="ml-20 grid gap-x-5 gap-y-8 sm:grid-cols-2 sm:gap-y-12 xl:col-span-2"
			role="list"
		>
			@foreach (config('constants.TEAM_ITEMS') as $item)
				<x-team.team-item :item="$item" />
			@endforeach
		</ul>
	</div>
</div>
