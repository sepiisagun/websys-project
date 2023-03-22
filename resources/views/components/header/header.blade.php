<nav
	class="float z-20 w-full border-b px-2 py-2.5 dark:border-gray-600 dark:bg-gray-900 sm:px-4"
>
	<div class="container mx-auto flex flex-wrap items-center justify-between">
		<a
			class="flex items-center"
			href="{{ route('homepage') }}"
		>
			<img
				alt="somelogo"
				class="mr-3 h-6 sm:h-9"
				src="https://ichef.bbci.co.uk/news/976/cpsprodpb/16620/production/_91408619_55df76d5-2245-41c1-8031-07a4da3f313f.jpg"
			/>
			<span
				class="self-center whitespace-nowrap text-xl font-semibold dark:text-white"
			>
				{{ config('app.name') }}
			</span>
		</a>
		<div class="flex md:order-2">
			@auth
				<form
					action="{{ route('logout') }}"
					class="mb-0"
					method="POST"
				>
					@csrf

					<button
						class="flex items-center rounded-full text-sm font-medium text-gray-900 hover:text-blue-600 focus:ring-4 focus:ring-gray-100 dark:text-white dark:hover:text-blue-500 dark:focus:ring-gray-700 md:mr-0"
						data-dropdown-toggle="dropdownAvatarName"
						id="dropdownAvatarNameButton"
						type="button"
					>
						<span class="sr-only">Open user menu</span>
						<img
							alt="user photo"
							class="mr-2 h-8 w-8 rounded-full"
							src="/img/{{ Auth::user()->image_path }}"
						>
						{{ Str::title(Auth::user()->first_name . ' ' . Auth::user()->last_name) }}
						<svg
							aria-hidden="true"
							class="mx-1.5 h-4 w-4"
							fill="currentColor"
							viewBox="0 0 20 20"
							xmlns="http://www.w3.org/2000/svg"
						>
							<path
								clip-rule="evenodd"
								d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
								fill-rule="evenodd"
							></path>
						</svg>
					</button>

					<!-- Dropdown menu -->
					<div
						class="z-20 hidden w-44 divide-y divide-gray-100 rounded-md bg-white shadow dark:divide-gray-600 dark:bg-gray-700"
						id="dropdownAvatarName"
					>
						<div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
							<div class="font-medium">Pro User</div>
							<div class="truncate">{{ Auth::user()->email }}</div>
						</div>
						<ul
							aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton"
							class="py-2 text-sm text-gray-700 dark:text-gray-200"
						>
							@foreach (config('constants.USER_DROPDOWN_LINKS') as $link)
								<li>
									<x-header.profile-link
										href="{{ $link['link'] ? route($link['link'], Auth::user()->id) : '#' }}"
									>
										{{ $link['label'] }}
									</x-header.profile-link>
								</li>
							@endforeach
							<li>
								<x-header.profile-link
									class="rounded-lg px-4 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-800"
									href="{{ route('logout') }}"
									onclick="event.preventDefault(); this.closest('form').submit();"
								>
									{{ config('constants.FORM_LABELS.LOGOUT') }}
								</x-header.profile-link>
							</li>
						</ul>
					</div>

				</form>
			@elseif (Str::contains(Request::segment(1), 'login'))
			@else
				@if (Str::contains(Request::segment(1), 'register'))
					<a
						class="btn btn-teal mr-3 space-x-7 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-teal-800 focus:outline-none focus:ring-4 focus:ring-teal-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 md:mr-0"
						href="{{ route('login') }}"
					>
						{{ config('constants.FORM_LABELS.LOGIN') }}
					</a>
				@else
					<a
						class="btn btn-teal mr-3 space-x-7 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-teal-800 focus:outline-none focus:ring-4 focus:ring-teal-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 md:mr-0"
						data-modal-target="authentication-modal"
						data-modal-toggle="authentication-modal"
						href="#"
					>
						{{ config('constants.FORM_LABELS.LOGIN') }}
					</a>
				@endif
			@endauth
			<button
				aria-controls="mobile-menu-2"
				aria-expanded="false"
				class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
				data-collapse-toggle="mobile-menu-2"
				type="button"
			>
				<span class="sr-only">Open main menu</span>
				<svg
					class="h-6 w-6"
					fill="currentColor"
					viewBox="0 0 20 20"
					xmlns="http://www.w3.org/2000/svg"
				>
					<path
						clip-rule="evenodd"
						d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
						fill-rule="evenodd"
					></path>
				</svg>
				<svg
					class="hidden h-6 w-6"
					fill="currentColor"
					viewBox="0 0 20 20"
					xmlns="http://www.w3.org/2000/svg"
				>
					<path
						clip-rule="evenodd"
						d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
						fill-rule="evenodd"
					></path>
				</svg>
			</button>
			{{-- Light / Dark mode --}}
			<button
				class="rounded-lg p-2.5 text-sm text-gray-500 hover:bg-inherit focus:outline-none focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-inherit dark:focus:ring-gray-700"
				id="theme-toggle"
				type="button"
			>
				<svg
					class="hidden h-5 w-5"
					fill="currentColor"
					id="theme-toggle-dark-icon"
					viewBox="0 0 20 20"
					xmlns="http://www.w3.org/2000/svg"
				>
					<path
						d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
					</path>
				</svg>
				<svg
					class="hidden h-5 w-5"
					fill="currentColor"
					id="theme-toggle-light-icon"
					viewBox="0 0 20 20"
					xmlns="http://www.w3.org/2000/svg"
				>
					<path
						clip-rule="evenodd"
						d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
						fill-rule="evenodd"
					></path>
				</svg>
			</button>
		</div>
		<div
			class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto"
			id="mobile-menu-2"
		>
			<ul
				class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:text-sm md:font-medium md:dark:bg-gray-900"
			>
				@foreach (config('constants.NAV_LINKS') as $link)
					<li>
						<x-header.nav-link
							href="{{ $link['link'] ? route($link['link']) : '#' }}"
						>
							{{ $link['label'] }}
						</x-header.nav-link>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
</nav>
