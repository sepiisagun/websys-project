@props(['reservation'])

<tr
	class="border-b dark:border-gray-700"
	key="{{ $reservation->id }}"
>
	<th
		class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white"
		scope="row"
	>{{ $reservation->name }}</th>
	<td class="px-4 py-3">{{ $reservation->first_name }}
		{{ $reservation->last_name }}</td>
	</td>
	<td class="px-4 py-3">{{ $reservation->check_in }}</td>
	<td class="px-4 py-3">{{ $reservation->check_out }}</td>
	<td class="px-4 py-3">{{ $reservation->guest_count }}</td>
	<td class="px-4 py-3">{{ $reservation->amount }}</td>
	<td class="flex items-center px-2 py-1">
		<form
			action="{{ route('reserve.approveRequest', $reservation->id) }}"
			method="POST"
		>
			@csrf
			@method('PATCH')
			<x-forms.primary-button>
				{{ __('Approve') }}
			</x-forms.primary-button>
		</form>

		<form
			action="{{ route('reserve.rejectRequest', $reservation->id) }}"
			method="POST"
		>
			@csrf
			@method('PATCH')
			<x-forms.danger-button>
				{{ __('Reject') }}
			</x-forms.danger-button>
		</form>
	</td>
</tr>
