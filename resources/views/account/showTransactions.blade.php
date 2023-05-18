@extends('welcome')

@section('content')
	@auth
		<section class="bg-white dark:bg-gray-900">
			<div class="mx-auto w-full py-4 px-4 lg:py-8 lg:px-6">
				<div class="mx-auto mb-2 max-w-screen-sm text-center">
					<h2
						class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white lg:text-4xl"
					>Transactions</h2>
				</div>
				<div class="mx-auto w-4/5 py-8 px-4 lg:py-8 lg:px-6">
					<div
						class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-md"
					>
						<div
							class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-y-0 md:space-x-4"
						>
							<div
								class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-y-0 md:space-x-3"
							>
						<a
                            class="hover:text-primary-700 flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto"
                            href="{{ route('account.generateTransaction') }}"
                        >
                            Export PDF
                        </a>
							</div>
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
		</script>
	@endauth
@endsection
