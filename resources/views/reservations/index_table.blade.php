<div class="overflow-x-auto">
    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach (config('constants.RESERVATIONS_TABLE_COLUMN_TITLE') as $title)
                    <th class="px-4 py-3" scope="col">
                        {{ $title }}
                    </th>
                @endforeach
                <th class="px-4 py-3" scope="col">
                    <span class="sr-only">Actions</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reservations as $reservation)
                <x-reservations.table-item :reservation="$reservation" />

                <x-modals.delete-modal :id="$reservation->id" :value="$reservation->house->name" route="house.destroy">
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        Are you sure you want to remove
                        the listing for
                        <span class="text-md font-semibold">
                            {{ $reservation->house->name }}
                        </span>?
                    </h3>

                    <div class="mb-6">
                        <x-forms.input-label for="deleteProceed">
                            <p>Type <span class="text-md font-semibold">{{ $reservation->house->name }}</span> to
                                proceed.</p>
                        </x-forms.input-label>
                        <x-forms.text-input :class="$errors->get('deleteProceed')
                            ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
                            : 'block mt-1 w-full'" autocomplete="deleteProceed"
                            data-tooltip-placement="bottom" data-tooltip-target="tooltip-light" id="deleteProceed"
                            name="deleteProceed" placeholder="" type="deleteProceed" />
                    </div>
                </x-modals.delete-modal>
            @empty
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-3 text-center" colspan="5">
                        No house listed
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <nav id="pagination" aria-label="Table navigation" class="justify-between space-y-3 p-4 md:flex-row md:items-center md:space-y-0">
        {{ $reservations->links() }}
    </nav>
</div>