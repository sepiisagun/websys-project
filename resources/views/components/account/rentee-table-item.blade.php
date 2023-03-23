@props([ 'house' ])

<tr class="border-b dark:border-gray-700">
	<th
		class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white"
		scope="row"
	>{{ $house->name }}</th>
	<td class="px-4 py-3">{{ $house->address }}</td>
	</td>
	<td class="px-4 py-3">{{ $house->capacity }}</td>
	<td class="px-4 py-3">₱{{ $house->price }}</td>
	<td class="flex items-center justify-end px-4 py-3">
		<button
			class="inline-flex items-center rounded-lg p-0.5 text-center text-sm font-medium text-gray-500 hover:text-gray-800 focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
			data-dropdown-toggle="house-{{ $house->id }}-dropdown"
			id="house-{{ $house->id }}-dropdown-button"
			type="button"
		>
			<svg
				aria-hidden="true"
				class="h-5 w-5"
				fill="currentColor"
				viewbox="0 0 20 20"
				xmlns="http://www.w3.org/2000/svg"
			>
				<path
					d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"
				/>
			</svg>
		</button>
		<div
			class="z-10 hidden w-44 divide-y divide-gray-100 rounded bg-white shadow dark:divide-gray-600 dark:bg-gray-700"
			id="house-{{ $house->id }}-dropdown"
		>
			<ul
				aria-labelledby="house-{{ $house->id }}-dropdown-button"
				class="py-1 text-sm text-gray-700 dark:text-gray-200"
			>
				<li>
					<a
						class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
						href="{{ route('house.show', $house->id) }}"
					>Show</a>
				</li>
				<li>
					<a
						class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
						href="{{ route('house.edit', $house->id) }}"
					>Edit</a>
				</li>
			</ul>
			<div class="py-1">
				<a
					class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
					data-modal-target="popup-modal-{{ $house->id }}"
					data-modal-toggle="popup-modal-{{ $house->id }}"
					type="button"
				>
					Delete
				</a>
			</div>
		</div>
	</td>
</tr>
