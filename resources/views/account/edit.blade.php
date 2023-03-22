@extends('welcome')

@section('content')
	<section class="bg-white dark:bg-gray-900">
		<div class="mx-auto max-w-screen-lg py-8 px-4 lg:py-16 lg:px-6">
			<div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-16">
				<h2
					class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white lg:text-4xl"
				>
					Account Settings
				</h2>
				<p class="font-light text-gray-500 dark:text-gray-400 sm:text-xl">
					<span class="font-bold">
						{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
					</span>,
					{{ Auth::user()->email }}
				</p>
			</div>
			<div class="grid gap-8 lg:grid-cols-2">
				<article
					class="rounded-md border border-gray-200 bg-white p-6 shadow-md dark:border-gray-700 dark:bg-gray-800"
				>
					<a href="{{ route('account.editCredentials', Auth::user()->id) }}">
						<div>
							<div class="mb-20 flex items-center justify-between text-gray-500">
								<span
									class="bg-primary-100 text-primary-800 dark:bg-primary-200 dark:text-primary-800 inline-flex items-center rounded px-2.5 py-0.5 font-medium"
								>
									<svg
										aria-hidden="true"
										focusable="false"
										role="presentation"
										style="display: block; height: 32px; width: 32px; fill: currentcolor;"
										viewBox="0 0 32 32"
										xmlns="http://www.w3.org/2000/svg"
									>
										<path
											d="m29 5c1.0543618 0 1.9181651.81587779 1.9945143 1.85073766l.0054857.14926234v18c0 1.0543618-.8158778 1.9181651-1.8507377 1.9945143l-.1492623.0054857h-26c-1.0543618 0-1.91816512-.8158778-1.99451426-1.8507377l-.00548574-.1492623v-18c0-1.0543618.81587779-1.91816512 1.85073766-1.99451426l.14926234-.00548574zm0 2h-26v18h26zm-3 12v2h-8v-2zm-16-8c1.6568542 0 3 1.3431458 3 3 0 .6167852-.1861326 1.1900967-.5052911 1.6668281 1.4972342.8624949 2.5052911 2.4801112 2.5052911 4.3331719h-2c0-1.3058822-.8343774-2.4168852-1.9990993-2.8289758l-.0009007-3.1710242c0-.5522847-.4477153-1-1-1-.51283584 0-.93550716.3860402-.99327227.8833789l-.00672773.1166211.00008893 3.1706743c-1.16523883.4118113-2.00008893 1.5230736-2.00008893 2.8293257h-2c0-1.8530607 1.00805693-3.470677 2.50570706-4.3343854-.3195745-.4755179-.50570706-1.0488294-.50570706-1.6656146 0-1.6568542 1.34314575-3 3-3zm16 4v2h-8v-2zm0-4v2h-8v-2z"
										/>
									</svg>
								</span>
							</div>
							<h2
								class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
							>
								<p>Account Security</p>
							</h2>
							<p class="mb-5 font-light text-gray-500 dark:text-gray-400">Edit your
								password and email</p>
						</div>
					</a>
				</article>
				<article
					class="rounded-md border border-gray-200 bg-white p-6 shadow-md dark:border-gray-700 dark:bg-gray-800"
				>
					<a href="{{ route('account.editInfo', Auth::user()->id) }}">
						<div>
							<div class="mb-20 flex items-center justify-between text-gray-500">
								<span
									class="bg-primary-100 text-primary-800 dark:bg-primary-200 dark:text-primary-800 inline-flex items-center rounded px-2.5 py-0.5 font-medium"
								>
									<svg
										aria-hidden="true"
										focusable="false"
										role="presentation"
										style="display: block; height: 32px; width: 32px; fill: currentcolor;"
										viewBox="0 0 32 32"
										xmlns="http://www.w3.org/2000/svg"
									>
										<path
											d="M16 .798l.555.37C20.398 3.73 24.208 5 28 5h1v12.5C29 25.574 23.21 31 16 31S3 25.574 3 17.5V5h1c3.792 0 7.602-1.27 11.445-3.832L16 .798zm-1 3.005c-3.2 1.866-6.418 2.92-9.648 3.149L5 6.972V17.5c0 6.558 4.347 10.991 10 11.459zm2 0V28.96c5.654-.468 10-4.901 10-11.459V6.972l-.352-.02c-3.23-.23-6.448-1.282-9.647-3.148z"
										></path>
									</svg>
								</span>
							</div>
							<h2
								class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
							>
								<p>Personal Info</p>
							</h2>
							<p class="mb-5 font-light text-gray-500 dark:text-gray-400">Update your
								personal info</p>
						</div>
					</a>
				</article>
			</div>
		</div>
	</section>
@endsection
