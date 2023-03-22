<x-modals.modal-new id="authentication-modal">
	<div class="relative h-full w-full max-w-md md:h-auto">
		<div class="backd relative rounded-sm bg-white shadow dark:bg-gray-700">
			<x-modals.modal-header>
				{{ config('constants.HEADER_TITLE.LOGIN') }}
			</x-modals.modal-header>
			<x-forms.close-button
				click="closeLoginModal()"
				data-modal-hide="authentication-modal"
			/>
			<x-modals.modal-body class="lg:px-8">
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
						<x-forms.link
							data-modal-hide="authentication-modal"
							data-modal-target="registration-modal"
							data-modal-toggle="registration-modal"
						>
							{{ config('constants.FORM_LABELS.CREATE_ACCOUNT') }}
						</x-forms.link>
					</div>
				</form>
			</x-modals.modal-body>
		</div>
	</div>
</x-modals.modal-new>
