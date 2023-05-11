@props(['reservation'])
@inject('carbon', 'Carbon\Carbon')

<tr class="border-b dark:border-gray-700" key="{{ $reservation->id }}">
	<th
		class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white"
		scope="row"
	>{{ $reservation->house->name }}</th>
	<td class="px-4 py-3">{{ $reservation->house->address }}</td>
	<td class="px-4 py-3">{{ $carbon::create($reservation->check_in)->toFormattedDateString() }}</td>
	<td class="px-4 py-3">{{ $carbon::create($reservation->check_out)->toFormattedDateString() }}</td>
    <td class="px-4 py-3">
        @if($reservation->status == "PENDING")
            Upcoming
        @elseif ($reservation->status == "ONGOING")
            Ongoing
        @else
            Ended
        @endif
    </td>
	<td class="flex items-center justify-end px-4 py-3 relative">
        <a
            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
            href="{{ route('reserve.show', $reservation->id) }}"
        >
            Show
        </a>
	</td>
</tr>