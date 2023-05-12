@extends('welcome')

@section('content')
	<section class="bg-white dark:bg-neutral-900">
		<div class="mx-auto max-w-2xl py-8 px-4 lg:py-16">
			<h2 class="mb-4 text-xl font-bold text-neutral-900 dark:text-white">Reserve
				this property</h2>
			<form
				action="{{ route('reserve.store', ['house_id' => $house->id]) }}"
				method="POST"
			>
				@csrf

				<div class="mb-6 grid gap-6 md:grid-cols-2">
					<div>
						<div class="relative max-w-sm">
							<x-forms.input-label
								:value="__('Check In')"
								for="check_in"
							/>
							<x-forms.datepicker
								:value="old('check_in')"
								id="check_in"
								name="check_in"
								required
								type="text"
							/>
							<x-icons.datepicker-icon />
							<x-forms.input-error :messages="$errors->get('check_in')" />
						</div>
					</div>

					<div>
						<div class="relative max-w-sm">
							<x-forms.input-label
								:value="__('Check Out')"
								for="check_out"
							/>
							<x-forms.datepicker
								:value="old('check_out')"
								id="check_out"
								name="check_out"
								required
								type="text"
							/>
							<x-icons.datepicker-icon />
							<x-forms.input-error :messages="$errors->get('check_out')" />
						</div>
					</div>
				</div>
				<div class="mb-6">
					<x-forms.input-label
						:value="__('Guest Count')"
						for="address"
					/>
					<x-forms.text-input
						:class="$errors->get('guest_count')
						    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
						    : 'block mt-1 w-full'"
						:value="old('guest_count')"
						id="guest_count"
						max="{{ $house->capacity }}"
						min=1
						name="guest_count"
						required
						type="number"
						placeholder="Max: {{ $house->capacity }} "
					/>
					<x-forms.input-error :messages="$errors->get('guest_count')" />
				</div>

				<div class="mb-6">
					<x-forms.input-label
						:value="__('Total Amount')"
						for="amount"
					/>
					<x-forms.text-input
						:class="$errors->get('amount')
						    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
						    : 'block mt-1 w-full'"
						type="hidden"
						id="amount"
						name="amount"
						value="{{ $house->price }}"
					/>
					<x-forms.text-input
					:class="$errors->get('amount')
						? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
						: 'block mt-1 w-full'"
					disabled
					id="amountdisabled"
					name="amount"
					value="{{ $house->price }}"
				/>
					<x-forms.input-error :messages="$errors->get('amount')" />
				</div>

				<div class="mt-4 flex items-center justify-end">
					<x-forms.primary-button>
						{{ __('Place Reservation') }}
					</x-forms.primary-button>
				</div>
			</form>

		</div>
	</section>

	<script>
		$('#guest_count').on('keyup', function() {
			var house = {!! json_encode($house) !!};
			var guest_count = $(this).val();
			var total_amount  = guest_count * house['price'];
			$('#amount').val(total_amount);
			$('#amountdisabled').val(total_amount);
		})
	</script>
@endsection
