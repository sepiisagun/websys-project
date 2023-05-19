@extends('welcome')

@section('content')
	@auth
		<section class="bg-white dark:bg-gray-900">
			<div class="mx-auto w-full py-4 px-4 lg:py-8 lg:px-6">
				<div class="mx-auto mb-2 max-w-screen-sm text-center">
					<h2
						class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white lg:text-4xl"
					>Transactions
					</h2>
				</div>

				<div class="mx-auto w-4/5 py-8 px-4 lg:py-8 lg:px-6">
					<div
						class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-md"
					>
						<div
							class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-y-0 md:space-x-4"
						>
							<form
								action="/transaction/filter"
								id="transaction_form"
								method="GET"
							>
								<div class="flex items-center px-4">
									<div class="relative max-w-sm">
										<div class="col-sm-3">
											<input
												class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
												id="start_date"
												name="start_date"
												type="date"
												{{-- value="{{ $start_date }}" --}}
											>
										</div>
									</div>
									<span class="mx-4 text-gray-500">to</span>
									<div class="relative max-w-sm">
										<div class="col-sm-3">
											<input
												class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
												id="end_date"
												name="end_date"
												type="date"
												{{-- value="{{ $end_date }}" --}}
											>
										</div>
									</div>

									<button
										class="my-2 mx-2 mb-2 rounded-full bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
										name="action"
										type="submit"
										value="filterbtn"
									>Filter Report</button>
									<button
										class="my-2 ml-0 mb-2 rounded-full bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
										name="action"
										type="submit"
										value="generatebtn"
									>Generate PDF</button>
								</div>
							</form>
						</div>
						<div class="overflow-x-auto">
							<table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
								<thead
									class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
								>
									<tr>
										@foreach (config('constants.RENTER_TABLE_TRANSACTION_COLUMN_TITLE') as $title)
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
									@forelse ($reservations as $reservation)
										<x-account.renter-transaction-table :reservation="$reservation" />

										<x-modals.delete-modal
											:id="$reservation->id"
											:value="$reservation->name"
											route="house.destroy"
										>
											<h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
												Are you sure you want to remove
												the listing for
												<span class="text-md font-semibold">
													{{ $reservation->name }}
												</span>?
											</h3>

											<div class="mb-6">
												<x-forms.input-label for="deleteProceed">
													<p>Type <span
															class="text-md font-semibold">{{ $reservation->name }}</span> to
														proceed.</p>
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
							{{ $reservations->links() }}
						</nav>
					</div>
				</div>
			</div>
		</section>

		<script type="text/javascript">
			$('#search').on('keyup', function() {
				$value = $(this).val();
				$.ajax({
					type: 'get',
					url: '{{ URL::to('search') }}',
					data: {
						'search': $value
					},
					success: function(data) {
						$('tbody').html(data);
					}
				});
			})
		</script>
		<script type="text/javascript">
			$.ajaxSetup({
				headers: {
					'csrftoken': '{{ csrf_token() }}'
				}
			});
			// $(document).ready(function() {
			// 	// Listen to click event on the submit button
			// 	$('#filterbtn').click(function(e) {

			// 		e.preventDefault();

			// 		var start_date = $("#start_date").val();
			// 		var end_date = $("#end_date").val();

			// 		$.post("/transaction", {
			// 			start_date: start_date,
			// 			end_date: end_date
			// 		}).complete(function() {
			// 			console.log("Success");
			// 		});
			// 	});
			// });
		</script>
	@endauth
@endsection
