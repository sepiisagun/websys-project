@extends('welcome')

@section('content')
	<section class="bg-white dark:bg-neutral-900">
		<div class="mx-auto max-w-2xl py-8 px-4 lg:py-16">
			<h2 class="mb-4 text-xl font-bold text-neutral-900 dark:text-white">Edit a
				property</h2>
			<form
				action="{{ route('house.update', $house) }}"
				enctype="multipart/form-data"
				method="POST"
			>
				@csrf
				@method('PUT')
				<div class="grid gap-4 sm:grid-cols-1 sm:gap-6">
					<div>
						<x-forms.input-label
							:value="__('Property Name')"
							for="name"
						/>
						<x-forms.input-disabled
							:class="$errors->get('name')
							    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
							    : 'block mt-1 w-full'"
							data-tooltip-placement="bottom"
							data-tooltip-target="tooltip-light"
							disabled
							id="name"
							name="name"
							required
							type="text"
							value="{{ $house->name }}"
						/>
						<x-forms.input-error :messages="$errors->get('name')" />
						<div
							class="tooltip invisible absolute z-10 inline-block rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
							id="tooltip-light"
							role="tooltip"
						>
							House name cannot be edited
							<div
								class="tooltip-arrow"
								data-popper-arrow
							></div>
						</div>
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
							required
						>
							{{ $house->description }}
						</x-forms.textarea-input>
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
							id="address"
							name="address"
							required
							type="text"
							value="{{ $house->address }}"
						/>
						<x-forms.input-error :messages="$errors->get('address')" />
					</div>
					<div>
						<x-forms.input-label
							:value="__('Capacity')"
							for="capacity"
						/>
						<x-forms.text-input
							:class="$errors->get('capacity')
							    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
							    : 'block mt-1 w-full'"
							id="capacity"
							max="15"
							min="1"
							name="capacity"
							required
							type="number"
							value="{{ $house->capacity }}"
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
							id="price"
							min="1"
							name="price"
							required
							type="number"
							value="{{ $house->price }}"
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
						/>
						<x-forms.input-error :messages="$errors->get('image_path')" />
					</div>
				</div>

				<div class="mt-4 flex items-center justify-end">
					<x-forms.primary-button>
						{{ __('Edit Property') }}
					</x-forms.primary-button>

					<x-forms.cancel-button href="{{ url()->previous() }}">
						{{ config('constants.BUTTON_LABELS.CANCEL') }}
					</x-forms.cancel-button>
				</div>
			</form>
		</div>
	</section>
@endsection
