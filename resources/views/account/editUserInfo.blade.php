@extends('welcome')
@inject('carbon', 'Carbon\Carbon')

@section('content')
	<section class="bg-white dark:bg-gray-900">
		<div class="mx-auto max-w-2xl px-4 py-8">
			<h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
				User Info
			</h2>
			<form
				action="{{ route('account.updateInfo') }}"
				enctype="multipart/form-data"
				method="POST"
			>
				@csrf
				@method('PATCH')
				<div class="mb-6">
					<x-forms.input-label
						:value="__('First Name')"
						for="firstName"
					/>
					<x-forms.text-input
						:class="$errors->get('first_name')
						    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
						    : 'block mt-1 w-full'"
						:value="$user->first_name"
						id="first_name"
						name="first_name"
						placeholder="John"
						type="text"
					/>
					<x-forms.input-error :messages="$errors->get('first_name')" />
				</div>
				<div class="mb-6">
					<x-forms.input-label
						:value="__('Last Name')"
						for="last_name"
					/>
					<x-forms.text-input
						:class="$errors->get('last_name')
						    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
						    : 'block mt-1 w-full'"
						:value="$user->last_name"
						id="last_name"
						name="last_name"
						placeholder="Doe"
						type="text"
					/>
					<x-forms.input-error :messages="$errors->get('last_name')" />
				</div>
				<div class="mb-6">
					<x-forms.input-label
						:value="__('Phone Number')"
						for="phone_number"
					/>
					<x-forms.text-input
						:value="$user->phone_number"
						:class="$errors->get('phone_number')
						    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
						    : 'block mt-1 w-full'"
						id="phone_number"
						name="phone_number"
						pattern="[0-9]{11}"
						placeholder="09123456789"
						type="tel"
					/>
					<x-forms.input-error :messages="$errors->get('phone_number')" />
				</div>
				<div class="mb-6">
					<x-forms.input-label
						:value="__('Address')"
						for="address"
					/>
					<x-forms.text-input
						:class="$errors->get('address')
						    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
						    : 'block mt-1 w-full'"
						:value="$user->address"
						id="address"
						name="address"
						type="text"
					/>
					<x-forms.input-error :messages="$errors->get('address')" />
				</div>
				<div class="mb-6">
					<x-forms.input-label
						:value="__('Profile Picture')"
						for="image_path"
					/>

					<x-forms.file-input
						id="image_path"
						name="image_path"
					/>
					<x-forms.input-error :messages="$errors->get('image_path')" />
				</div>
				<div class="mb-6 flex items-end">
					<x-forms.primary-button>
						{{ config('constants.BUTTON_LABELS.SUBMIT') }}
					</x-forms.primary-button>
					<x-forms.cancel-button href="{{ url()->previous() }}">
						{{ config('constants.BUTTON_LABELS.CANCEL') }}
					</x-forms.cancel-button>
				</div>
			</form>
		</div>
	</section>
@endsection
