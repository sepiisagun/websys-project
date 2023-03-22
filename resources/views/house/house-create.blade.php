@extends('welcome')

@section('content')
	<section class="bg-white dark:bg-neutral-900">
		<div class="mx-auto max-w-2xl py-8 px-4 lg:py-16">
			<h2 class="mb-4 text-xl font-bold text-neutral-900 dark:text-white">List a new
				property</h2>
			<form
				action="{{ route('house.store') }}"
				method="POST"
			>
				@csrf
				<div class="grid gap-4 sm:grid-cols-1 sm:gap-6">
					<div>
						<x-forms.input-label
							:value="__('Property Name')"
							for="name"
						/>
						<x-forms.text-input
							autocomplete="name"
							class="mt-1 block w-full"
							id="name"
							name="name"
							placeholder="Property Name"
							required
							type="text"
						/>
					</div>
					<div>
						<x-forms.input-label
							:value="__('Property Description')"
							for="description"
						/>
						<x-forms.textarea-input
							class="mt-1 block w-full"
							id="description"
							name="description"
							placeholder="Property Description"
							required
						/>
					</div>
					<div>
						<x-forms.input-label
							:value="__('Property Address')"
							for="address"
						/>
						<x-forms.text-input
							autocomplete="address"
							class="mt-1 block w-full"
							id="address"
							name="address"
							placeholder="Municipality, Address (e.g., Basay, Pangasinan)"
							required
							type="text"
						/>
					</div>
					<div>
						<x-forms.input-label
							:value="__('Property Capacity')"
							for="capacity"
						/>
						<x-forms.text-input
							autocomplete="capacity"
							class="mt-1 block w-full"
							id="capacity"
							name="capacity"
							placeholder="Property Capacity"
							required
							type="number"
						/>
					</div>
					<div>
						<x-forms.input-label
							:value="__('Price')"
							for="price"
						/>
						<x-forms.text-input
							autocomplete="price"
							class="mt-1 block w-full"
							id="price"
							name="price"
							placeholder="P10000"
							required
							type="number"
						/>
					</div>
					<div>
						<x-forms.input-label
							:value="__('Images')"
							for="image_path"
						/>
						<x-forms.text-input
							class="mt-1 block w-full p-0"
							id="image_path"
							name="image_path"
							required
							type="file"
						/>
					</div>
				</div>

				<div class="mt-4 flex items-center justify-end">
					<x-forms.primary-button>
						{{ __('Submit Property') }}
					</x-forms.primary-button>

					<x-forms.cancel-button href="{{ url()->previous() }}">
						{{ config('constants.BUTTON_LABELS.CANCEL') }}
					</x-forms.cancel-button>
				</div>
			</form>
		</div>
	</section>
@endsection
