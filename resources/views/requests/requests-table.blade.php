<div class="overflow-x-auto">
	<table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
		<thead
			class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
		>
			<tr>
				@foreach (config('constants.RENTER_APPROVAL_TABLE_COLUMN_TITLE') as $title)
					<th
						class="px-4 py-3"
						scope="col"
					>
						{{ $title }}
					</th>
				@endforeach
				<th
					class="px-4 py-3"
					scope="col"
				>
					Actions
				</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($reservations as $reservation)
				<x-requests.approval-rentee-table-item :reservation="$reservation" />
			@empty
				<tr class="border-b dark:border-gray-700">
					<td
						class="px-4 py-3 text-center"
						colspan="5"
					>
						No house listed
					</td>
				</tr>
			@endforelse
		</tbody>
	</table>
	<nav
		aria-label="Table navigation"
		class="justify-between space-y-3 p-4 md:flex-row md:items-center md:space-y-0"
		id="pagination"
	>
		{{ $reservations->links() }}
	</nav>
</div>
