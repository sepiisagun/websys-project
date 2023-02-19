<x-modal-new id="registration-modal">
	<div class="relative h-full w-full max-w-2xl md:h-auto">
		<div class="relative rounded-sm bg-white shadow dark:bg-gray-700">
			<x-modal-header>
				{{ config('constants.HEADER_TITLE.REGISTER') }}
			</x-modal-header>
			<x-close-button data-modal-hide="registration-modal" />
			<x-modal-body>
				<x-auth-session-status
					:status="session('status')"
					class="mb-4"
				/>
				<form
					action="{{ route('register') }}"
					method="POST"
				>
					@csrf
					<div class="mb-6 grid gap-6 md:grid-cols-2">
						<div>
							<x-input-label
								:value="__('First Name')"
								for="firstName"
							/>
							<x-text-input
								:class="$errors->get('firstName')
								    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
								    : 'block mt-1 w-full'"
								:value="old('firstName')"
								id="firstName"
								name="firstName"
								placeholder="John"
								required
								type="text"
							/>
							<x-input-error :messages="$errors->get('firstName')" />
						</div>
						<div>
							<x-input-label
								:value="__('Last Name')"
								for="lastName"
							/>
							<x-text-input
								:class="$errors->get('lastName')
								    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
								    : 'block mt-1 w-full'"
								:value="old('lastName')"
								id="lastName"
								name="lastName"
								placeholder="Doe"
								required
								type="text"
							/>
							<x-input-error :messages="$errors->get('lastName')" />
						</div>
						<div>
							<div class="relative max-w-sm">
								<x-input-label
									:value="__('Birth Date')"
									for="birthdate"
								/>
								<x-datepicker id="birthdate" />
								<x-input-error :messages="$errors->get('birthdate')" />
							</div>
						</div>
						<div>
							<x-input-label
								:value="__('Phone Number')"
								for="phoneNumber"
							/>
							<x-text-input
								:class="$errors->get('phoneNumber')
								    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
								    : 'block mt-1 w-full'"
								:value="old('phoneNumber')"
								id="phoneNumber"
								name="phoneNumber"
								pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}"
								placeholder="0912-345-6789"
								required
								type="tel"
							/>
							<x-input-error :messages="$errors->get('phoneNumber')" />
						</div>
					</div>
					<div class="mb-6">
						<x-input-label
							:value="__('Address')"
							for="address"
						/>
						<x-text-input
							:class="$errors->get('address')
							    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
							    : 'block mt-1 w-full'"
							:value="old('address')"
							id="address"
							name="address"
							required
							type="text"
						/>
						<x-input-error :messages="$errors->get('address')" />
					</div>
					<div class="mb-6 grid gap-6 md:grid-cols-2">
						<div>
							<x-input-label
								:value="__('Email')"
								for="email"
							/>
							<x-text-input
								:class="$errors->get('email')
								    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
								    : 'block mt-1 w-full'"
								:value="old('email')"
								id="email"
								name="email"
								placeholder="john.doe@company.com"
								required
								type="email"
							/>
							<x-input-error :messages="$errors->get('email')" />
						</div>
						<div>
							<x-input-label
								:value="__('Username')"
								for="username"
							/>
							<x-text-input
								:class="$errors->get('username')
								    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
								    : 'block mt-1 w-full'"
								:value="old('username')"
								id="username"
								name="username"
								required
								type="text"
							/>
							<x-input-error :messages="$errors->get('username')" />
						</div>
						<div>
							<x-input-label
								:value="__('Password')"
								for="password"
							/>
							<x-text-input
								:class="$errors->get('password')
								    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
								    : 'block mt-1 w-full'"
								:value="old('password')"
								id="password"
								name="password"
								placeholder="•••••••••"
								required
								type="password"
							/>
							<x-input-error :messages="$errors->get('password')" />
						</div>
						<div>
							<x-input-label
								:value="__('Confirm Password')"
								for="password_confirmation"
							/>
							<x-text-input
								:class="$errors->get('password_confirmation')
								    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
								    : 'block mt-1 w-full'"
								:value="old('password_confirmation')"
								id="password_confirmation"
								name="password_confirmation"
								placeholder="•••••••••"
								required
								type="password"
							/>
							<x-input-error :messages="$errors->get('password_confirmation')" />
						</div>
					</div>
					<div class="mb-6 flex items-start">
						<div class="flex h-5 items-center">
							<input
								class="focus:ring-3 h-4 w-4 rounded border border-gray-300 bg-gray-50 focus:ring-blue-300 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
								id="remember"
								required
								type="checkbox"
								value=""
							>
						</div>
						<x-input-label
							class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
							for="remember"
						>
							{{ config('constants.FORM_LABELS.AGREE_T&C') }}
						</x-input-label>
					</div>
					<div class="mb-6 flex items-end">
						<x-primary-button>
							{{ config('constants.BUTTON_LABELS.SUBMIT') }}
						</x-primary-button>
						<x-cancel-button
							data-modal-hide="registration-modal"
							data-modal-target="authentication-modal"
							data-modal-toggle="authentication-modal"
						>
							{{ config('constants.BUTTON_LABELS.CANCEL') }}
						</x-cancel-button>
					</div>
				</form>
			</x-modal-body>
		</div>
	</div>
</x-modal-new>
