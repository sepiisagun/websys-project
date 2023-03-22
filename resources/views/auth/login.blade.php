@extends('welcome')

@section('content')
	<div class="flex flex-col items-center pt-6 sm:justify-center sm:pt-0">
		<div>
			<a href="/">
				<x-icons.application-logo class="h-20 w-20 fill-current text-gray-500" />
			</a>
		</div>

		<div
			class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md"
		>
			<form
				action="{{ route('login') }}"
				class="space-y-6"
				method="POST"
			>
				@csrf
				<div>
					<x-forms.input-label
						:value="__('Email')"
						for="email"
					/>
					<x-forms.text-input
						:value="old('email')"
						:class="$errors->get('email')
						    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
						    : 'block mt-1 w-full'"
						autocomplete="username"
						autofocus
						id="email"
						name="email"
						placeholder="name@company.com"
						required
						type="email"
					/>
					<x-forms.input-error :messages="$errors->get('email')" />
				</div>
				<div>
					<x-forms.input-label
						:value="__('Password')"
						for="password"
					/>
					<x-forms.text-input
						:class="$errors->get('email')
						    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500 dark:border-red-400'
						    : 'block mt-1 w-full'"
						autocomplete="current-password"
						id="password"
						name="password"
						placeholder="••••••••"
						required
						type="password"
					/>
					<x-forms.input-error :messages="$errors->get('password')" />
				</div>
				<div class="flex justify-between">
					<div class="flex items-start">
						<div class="flex h-5 items-center">
							<x-forms.checkbox-input
								id="remember"
								name="remember"
								value=""
							/>
						</div>
						<x-forms.input-label
							class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
							for="remember"
						>
							{{ config('constants.FORM_LABELS.REMEMBER_ME') }}
						</x-forms.input-label>
					</div>
					@if (Route::has('password.request'))
						<x-forms.link href="{{ route('password.request') }}">
							{{ config('constants.FORM_LABELS.FORGOT_PASSWORD') }}
						</x-forms.link>
					@endif
				</div>
				<x-forms.primary-button class="w-full">
					{{ config('constants.BUTTON_LABELS.LOGIN') }}
				</x-forms.primary-button>
				<div class="text-sm font-medium text-gray-500 dark:text-gray-300">
					Not registered?
					<x-forms.link href="{{ route('register') }}">
						{{ config('constants.FORM_LABELS.CREATE_ACCOUNT') }}
					</x-forms.link>
				</div>
			</form>
		</div>
	</div>
@endsection
