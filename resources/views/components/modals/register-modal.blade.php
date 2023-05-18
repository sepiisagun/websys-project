<x-modals.modal-new id="registration-modal">
	<div class="relative h-full w-full max-w-2xl md:h-auto">
		<div class="relative rounded-sm bg-white shadow dark:bg-neutral-700">
			<x-modals.modal-header>
				{{ config('constants.HEADER_TITLE.REGISTER') }}
			</x-modals.modal-header>
			<x-forms.close-button data-modal-hide="registration-modal" />
			<x-modals.modal-body>
				<form
					action="{{ route('register') }}"
					enctype="multipart/form-data"
					method="POST"
				>
					@csrf

					<div class="mb-6 grid gap-6 md:grid-cols-2">
						<div>
							<x-forms.input-label
								:value="__('First Name')"
								for="firstName"
							/>
							<x-forms.text-input
								:class="$errors->get('first_name')
								    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
								    : 'block mt-1 w-full'"
								:value="old('first_name')"
								id="first_name"
								name="first_name"
								placeholder="John"
								required
								type="text"
							/>
							<x-forms.input-error :messages="$errors->get('first_name')" />
						</div>
						<div>
							<x-forms.input-label
								:value="__('Last Name')"
								for="last_name"
							/>
							<x-forms.text-input
								:class="$errors->get('last_name')
								    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
								    : 'block mt-1 w-full'"
								:value="old('last_name')"
								id="last_name"
								name="last_name"
								placeholder="Doe"
								required
								type="text"
							/>
							<x-forms.input-error :messages="$errors->get('last_name')" />
						</div>
						<div>
							<div class="relative max-w-sm">
								<x-forms.input-label
									:value="__('Birth Date')"
									for="birth_date"
								/>
								<x-forms.datepicker
									:value="old('birth_date')"
									id="birth_date"
									name="birth_date"
									required
									type="text"
								/>
								<x-icons.datepicker-icon />
								<x-forms.input-error :messages="$errors->get('birth_date')" />
							</div>
						</div>
						<div>
							<x-forms.input-label
								:value="__('Phone Number')"
								for="phone_number"
							/>
							<x-forms.text-input
								:class="$errors->get('phone_number')
								    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
								    : 'block mt-1 w-full'"
								:value="old('phone_number')"
								id="phone_number"
								name="phone_number"
								pattern="[0-9]{11}"
								placeholder="09123456789"
								required
								type="tel"
							/>
							<x-forms.input-error :messages="$errors->get('phone_number')" />
						</div>
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
							:value="old('address')"
							id="address"
							name="address"
							required
							type="text"
						/>
						<x-forms.input-error :messages="$errors->get('address')" />
					</div>

					<div class="mb-6 grid gap-6 md:grid-cols-2">
						<div>
							<x-forms.input-label
								:value="__('Select account type')"
								for="role"
							/>
							<select
								class="mb-4 block w-full rounded-sm border border-neutral-300 bg-neutral-50 p-2.5 text-sm text-neutral-900 focus:border-blue-500 focus:ring-blue-500 dark:border-neutral-600 dark:bg-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
								id="role"
								name="role"
							>
								<option
									disabled
									selected
								>Choose your role</option>
								<option
									name="role"
									value="RENTEE"
								>Rentee</option>
								<option
									name="role"
									value="RENTER"
								>Renter</option>
							</select>
							<x-forms.input-error :messages="$errors->get('role')" />
						</div>
						<div>
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
					</div>

					<div class="mb-6 grid gap-6 md:grid-cols-2">
						<div>
							<x-forms.input-label
								:value="__('Email')"
								for="email"
							/>
							<x-forms.text-input
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
							<x-forms.input-error :messages="$errors->get('email')" />
						</div>
						<div>
							<x-forms.input-label
								:value="__('Username')"
								for="username"
							/>
							<x-forms.text-input
								:class="$errors->get('username')
								    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
								    : 'block mt-1 w-full'"
								:value="old('username')"
								id="username"
								name="username"
								required
								type="text"
							/>
							<x-forms.input-error :messages="$errors->get('username')" />
						</div>
						<div>
							<x-forms.input-label
								:value="__('Password')"
								for="password"
							/>
							<x-forms.text-input
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
							<x-forms.input-error :messages="$errors->get('password')" />
						</div>
						<div>
							<x-forms.input-label
								:value="__('Confirm Password')"
								for="password_confirmation"
							/>
							<x-forms.text-input
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
							<x-forms.input-error :messages="$errors->get('password_confirmation')" />
						</div>
					</div>
					<div class="mb-6 flex items-start">
						<div class="flex h-5 items-center">
							<input
								class="focus:ring-3 h-4 w-4 rounded border border-neutral-300 bg-neutral-50 focus:ring-blue-300 dark:border-neutral-600 dark:bg-neutral-700 dark:ring-offset-neutral-800 dark:focus:ring-blue-600"
								id="remember"
								required
								type="checkbox"
								value=""
							>
						</div>
						<x-forms.input-label
							class="ml-2 text-sm font-medium text-neutral-900 dark:text-neutral-300"
							for="remember"
						>
							{{ config('constants.FORM_LABELS.AGREE_T&C') }}
						</x-forms.input-label>
					</div>
					<div class="mb-6 flex items-end">
						<x-forms.primary-button>
							{{ config('constants.BUTTON_LABELS.SUBMIT') }}
						</x-forms.primary-button>
						<x-forms.cancel-button
							data-modal-hide="registration-modal"
							data-modal-target="authentication-modal"
							data-modal-toggle="authentication-modal"
						>
							{{ config('constants.BUTTON_LABELS.CANCEL') }}
						</x-forms.cancel-button>
					</div>
				</form>
			</x-modals.modal-body>
		</div>
	</div>
</x-modals.modal-new>
