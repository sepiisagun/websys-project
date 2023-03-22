@extends('welcome')

@section('content')
	<section class="bg-white dark:bg-gray-900">
		<div class="mx-auto max-w-2xl px-4 py-8">
			<h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
				Login Credentials
			</h2>
			<form
				action="{{ route('account.updateCredentials') }}"
				class="space-y-6"
				method="POST"
			>
				@csrf
				@method('PATCH')
				<div>
					<x-forms.input-label
						:value="__('Email')"
						for="email"
					/>
					<x-forms.text-input
						:value="$user->email"
						:class="$errors->get('email')
						    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
						    : 'block mt-1 w-full'"
						autocomplete="email"
						data-tooltip-placement="bottom"
						data-tooltip-target="tooltip-light"
						disabled
						id="email"
						name="email"
						placeholder="name@company.com"
						type="email"
					/>
					<x-forms.input-error :messages="$errors->get('email')" />
					<div
						class="tooltip invisible absolute z-10 inline-block rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
						id="tooltip-light"
						role="tooltip"
					>
						Email address cannot be edited
						<div
							class="tooltip-arrow"
							data-popper-arrow
						></div>
					</div>
				</div>
				<div>
					<x-forms.input-label
						:value="__('Current Password')"
						for="current_password"
					/>
					<x-forms.text-input
						:class="$errors->get('current_password')
						    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500 dark:border-red-400'
						    : 'block mt-1 w-full'"
						autocomplete="current_password"
						id="current_password"
						name="current_password"
						placeholder="••••••••"
						type="password"
					/>
					<x-forms.input-error :messages="$errors->get('current_password')" />
				</div>
				<div>
					<x-forms.input-label
						:value="__('New Password')"
						for="new_password"
					/>
					<x-forms.text-input
						:class="$errors->get('new_password')
						    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500 dark:border-red-400'
						    : 'block mt-1 w-full'"
						autocomplete="new_password"
						id="new_password"
						name="new_password"
						placeholder="••••••••"
						type="password"
					/>
					<x-forms.input-error :messages="$errors->get('new_password')" />
				</div>
				<div>
					<x-forms.input-label
						:value="__('Confirm Password')"
						for="new_password_confirmation"
					/>
					<x-forms.text-input
						:class="$errors->get('new_password_confirmation')
						    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500 dark:border-red-400'
						    : 'block mt-1 w-full'"
						autocomplete="new_password_confirmation"
						id="new_password_confirmation"
						name="new_password_confirmation"
						placeholder="••••••••"
						type="password"
					/>
					<x-forms.input-error :messages="$errors->get('new_password_confirmation')" />
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
