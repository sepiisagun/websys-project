@props(['reservation'])
<tr class="border-b dark:border-gray-700">
    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white" scope="row">
        {{ $reservation->first_name }} {{ $reservation->last_name }}
	</th>
    <td class="px-4 py-3">{{ $reservation->name }}</td>
    <td class="px-4 py-3">{{ $reservation->check_in }}</td>
    <td class="px-4 py-3">₱{{ $reservation->amount }}</td>
    <td class="px-4 py-3">{{ $reservation->status }}</td>
    <td class="px-4 py-3">
		<a 
			class="block py-2 px-4 dark:hover:text-white"
            href="{{ route('reserve.show', $reservation->id) }}"
		>
			Show
		</a>
	</td>
</tr>
