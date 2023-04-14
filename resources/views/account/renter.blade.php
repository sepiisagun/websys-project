@extends('welcome')

@section('content')
	@auth
		<section class="bg-white dark:bg-gray-900">
			<div class="mx-auto w-full py-4 px-4 lg:py-8 lg:px-6">
				<div class="mx-auto mb-2 max-w-screen-sm text-center">
					<h2
						class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white lg:text-4xl"
					>Your Houses</h2>
				</div>
				<div class="mx-auto w-4/5 py-8 px-4 lg:py-8 lg:px-6">
					<div
						class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-md"
					>
						<div
							class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-y-0 md:space-x-4"
						>
							<div class="w-full md:w-1/2">
								<form class="flex items-center">
									<label
										class="sr-only"
										for="simple-search"
									>Search</label>
									<div class="relative w-full">
										<div
											class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
										>
											<svg
												aria-hidden="true"
												class="h-5 w-5 text-gray-500 dark:text-gray-400"
												fill="currentColor"
												viewbox="0 0 20 20"
												xmlns="http://www.w3.org/2000/svg"
											>
												<path
													clip-rule="evenodd"
													d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
													fill-rule="evenodd"
												/>
											</svg>
										</div>
										<input
											class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
											id="simple-search"
											placeholder="Search"
											required=""
											type="text"
										>
									</div>
								</form>
							</div>
							<div
								class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-y-0 md:space-x-3"
							>
								<a
									class="hover:text-primary-700 flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto"
									href="{{ route('house.create') }}"
								>
									<svg
										aria-hidden="true"
										class="mr-2 h-3.5 w-3.5"
										fill="currentColor"
										viewbox="0 0 20 20"
										xmlns="http://www.w3.org/2000/svg"
									>
										<path
											clip-rule="evenodd"
											d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
											fill-rule="evenodd"
										/>
									</svg>
									Add Listing
								</a>
								{{-- <div class="flex w-full items-center space-x-3 md:w-auto">
									<button
										class="hover:text-primary-700 flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto"
										data-dropdown-toggle="actionsDropdown"
										id="actionsDropdownButton"
										type="button"
									>
										<svg
											aria-hidden="true"
											class="-ml-1 mr-1.5 h-5 w-5"
											fill="currentColor"
											viewbox="0 0 20 20"
											xmlns="http://www.w3.org/2000/svg"
										>
											<path
												clip-rule="evenodd"
												d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
												fill-rule="evenodd"
											/>
										</svg>
										Actions
									</button>
									<div
										class="z-10 hidden w-44 divide-y divide-gray-100 rounded bg-white shadow dark:divide-gray-600 dark:bg-gray-700"
										id="actionsDropdown"
									>
										<ul
											aria-labelledby="actionsDropdownButton"
											class="py-1 text-sm text-gray-700 dark:text-gray-200"
										>
											<li>
												<a
													class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
													href="#"
												>Mass Edit</a>
											</li>
										</ul>
										<div class="py-1">
											<a
												class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
												href="#"
											>Delete all</a>
										</div>
									</div>
								</div> --}}
							</div>
						</div>
						<div class="overflow-x-auto">
							<table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
								<thead
									class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
								>
									<tr>
										@foreach (config('constants.RENTER_TABLE_COLUMN_TITLE') as $title)
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
											<span class="sr-only">Actions</span>
										</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($houses as $house)
										<x-account.rentee-table-item :house="$house" />

										<x-modals.delete-modal
											:id="$house->id"
											:value="$house->name"
											route="house.destroy"
										>
											<h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
												Are you sure you want to remove
												the listing for 
												<span
													class="text-md font-semibold"
												>
													{{ $house->name }}
												</span>?
											</h3>
											
											<div class="mb-6">
												<x-forms.input-label
													for="deleteProceed"
												>
													<p>Type <span
													class="text-md font-semibold">{{ $house->name }}</span> to proceed.</p>
												</x-forms.input-label>
												<x-forms.text-input
													:class="$errors->get('deleteProceed')
														? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
														: 'block mt-1 w-full'"
													autocomplete="deleteProceed"
													data-tooltip-placement="bottom"
													data-tooltip-target="tooltip-light"
													id="deleteProceed"
													name="deleteProceed"
													placeholder=""
													type="deleteProceed"
												/>
											</div>
										</x-modals.delete-modal>
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
						</div>
						<nav
							aria-label="Table navigation"
							class="justify-between space-y-3 p-4 md:flex-row md:items-center md:space-y-0"
						>
							{{ $houses->links() }}
						</nav>
					</div>
				</div>
			</div>
		</section>
	@endauth
@endsection
