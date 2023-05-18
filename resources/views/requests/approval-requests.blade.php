@extends('welcome')

@section('content')
	@auth
		<section class="bg-white dark:bg-gray-900">
			<div class="mx-auto w-full py-4 px-4 lg:py-8 lg:px-6">
				<div class="mx-auto mb-2 max-w-screen-sm text-center">
					<h2
						class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white lg:text-4xl"
					>Reservation Requests</h2>
				</div>
				<div class="mx-auto w-4/5 py-8 px-4 lg:py-8 lg:px-6">
					<div
						class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-md"
					>
						<div
							class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-y-0 md:space-x-4"
						>
							<x-search-bar />
						</div>
						<div id="tester">
							@include('requests.requests-table', [
								'reservations' => $reservations,
							])
						</div>
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
						$('#tester').html(data);
						// $('#pagination').html(data);
					}
				});
			})
			var showDropdown = function(value) {
				sample = '#house-' + value + '-dropdown';
				$(sample).css('position', 'absolute');
				$(sample).css('margin', '0px');
				$(sample).css('transform', 'translate(0px, 80px)');
				$(sample).toggleClass("hidden");
				$(sample).on('blur', function() {
					$(sample).toggleClass("hidden");
				})
			}
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
