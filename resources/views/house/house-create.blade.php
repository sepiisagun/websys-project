@extends('welcome')

@section('content')
	<section class="bg-white dark:bg-neutral-900">
		<div class="mx-auto max-w-2xl py-8 px-4 lg:py-16">
			<h2 class="mb-4 text-xl font-bold text-neutral-900 dark:text-white">List a new
				property</h2>
			<form
				action="{{ route('house.store') }}"
				enctype="multipart/form-data"
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
							:class="$errors->get('name')
							    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
							    : 'block mt-1 w-full'"
							autocomplete="name"
							id="name"
							name="name"
							placeholder="Property Name"
							required
							type="text"
						/>
						<x-forms.input-error :messages="$errors->get('name')" />
					</div>
					<div>
						<x-forms.input-label
							:value="__('Property Description')"
							for="description"
						/>
						<x-forms.textarea-input
							:class="$errors->get('description')
							    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
							    : 'block mt-1 w-full'"
							id="description"
							name="description"
							placeholder="Property Description"
							required
						/>
						<x-forms.input-error :messages="$errors->get('description')" />
					</div>
					<div>
						<x-forms.input-label
							:value="__('Property Address')"
							for="address"
						/>
						<x-forms.text-input
							:class="$errors->get('address')
							    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
							    : 'block mt-1 w-full'"
							autocomplete="address"
							id="address"
							name="address"
							placeholder="Municipality, Address (e.g., Basay, Pangasinan)"
							required
							type="text"
						/>
						<x-forms.input-error :messages="$errors->get('address')" />
					</div>
					<div>
						<x-forms.input-label
							:value="__('Property Capacity')"
							for="capacity"
						/>
						<x-forms.text-input
							:class="$errors->get('capacity')
							    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
							    : 'block mt-1 w-full'"
							autocomplete="capacity"
							id="capacity"
							max="15"
							min="1"
							name="capacity"
							placeholder="Property Capacity"
							required
							type="number"
						/>
						<x-forms.input-error :messages="$errors->get('capacity')" />
					</div>
					<div>
						<x-forms.input-label
							:value="__('Price')"
							for="price"
						/>
						<x-forms.text-input
							:class="$errors->get('price')
							    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
							    : 'block mt-1 w-full'"
							autocomplete="price"
							id="price"
							min="1"
							name="price"
							placeholder="P10000"
							required
							type="number"
						/>
						<x-forms.input-error :messages="$errors->get('price')" />
					</div>
					<div>
						<x-forms.input-label
							:value="__('Images')"
							for="image_path"
						/>
						<x-forms.file-input
							id="image_path"
							name="image_path"
							required
						/>
						<x-forms.input-error :messages="$errors->get('image_path')" />
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
