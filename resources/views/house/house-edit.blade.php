@extends('welcome')

@section('content')
	<section class="bg-white dark:bg-neutral-900">
		<div class="mx-auto max-w-2xl py-8 px-4 lg:py-16">
			<h2 class="mb-4 text-xl font-bold text-neutral-900 dark:text-white">Edit a
				property</h2>
			<form
				action="{{ route('house.update', $house) }}"
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
						<x-forms.text-input
							class="mt-1 block w-full"
							id="name"
							name="name"
							required
							type="text"
							value="{{ $house->name }}"
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
							required
						>{{ $house->description }}</x-forms.textarea-input>
					</div>
					<div>
						<x-forms.input-label
							:value="__('Property Address')"
							for="address"
						/>
						<x-forms.text-input
							class="mt-1 block w-full"
							id="address"
							name="address"
							required
							type="text"
							value="{{ $house->address }}"
						/>
					</div>
					<div>
						<x-forms.input-label
							:value="__('Capacity')"
							for="capacity"
						/>
						<x-forms.text-input
							class="mt-1 block w-full"
							id="capacity"
							name="capacity"
							required
							type="number"
							value="{{ $house->capacity }}"
						/>
					</div>
					<div>
						<x-forms.input-label
							:value="__('Price')"
							for="price"
						/>
						<x-forms.text-input
							class="mt-1 block w-full"
							id="price"
							name="price"
							required
							type="number"
							value="{{ $house->price }}"
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
							type="file"
							value="{{ $house->image_path }}"
						/>
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
