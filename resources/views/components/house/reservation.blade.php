@inject('carbon', 'Carbon\Carbon')
@props([
	'reservation',
	'past' => false,
	'hasRating' => false
])

<article
	class="min-w-20 h-64 w-auto rounded-md border border-gray-200 bg-gray-400 bg-opacity-90 bg-cover bg-center bg-blend-darken shadow-md dark:border-gray-700"
	style="background-image: url(/img/{{ $reservation->image_path }});"
>
	<div
		class="m-0 flex h-full w-full flex-col justify-between p-6 backdrop-blur-sm"
	>
		<div
			class="text my-0 flex h-5 items-center justify-between py-0 font-bold text-white"
		>
			<span class="text-sm drop-shadow">
				{{ $past ? $carbon::now()->diffInDays($reservation->check_out) . ' days ago' : 'In ' . $carbon::now()->diffInDays($reservation->check_in) . ' days' }}
			</span>
			@if (!$hasRating && $past)
				<a href="{{ route('house.rate', $reservation->reservation_id) }}">
					<span
						class="bg-primary-100 text-primary-800 dark:bg-primary-200 dark:text-primary-800 inline-flex items-center rounded px-2.5 text-xs font-semibold drop-shadow"
					>
						<x-icons.rating-star />
						Rate experience
					</span>
				</a>
			@endif
		</div>
		<a href="{{ route('house.show', $reservation->house_id) }}">
			<div class="flex h-full flex-col justify-between">
				<h2 class="mb-2 text-2xl font-bold tracking-tight text-white drop-shadow">
					{{ $reservation->name }}
				</h2>
				<div class="flex items-center space-x-4">
					<img
						alt="Bonnie Green avatar"
						class="h-7 w-7 rounded-full"
						src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
					/>
					<span class="font-medium text-white drop-shadow">
						{{ $reservation->address }}
					</span>
				</div>
			</div>
		</a>
	</div>
</article>
