<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta
		content="width=device-width, initial-scale=1.0"
		name="viewport"
	>
	<meta
		content="ie=edge"
		http-equiv="X-UA-Compatible"
	>
	<title>WebSys Project</title>

	<link
		href="https://fonts.googleapis.com"
		rel="preconnect"
	>
	<link
		crossorigin
		href="https://fonts.gstatic.com"
		rel="preconnect"
	>
	<link
		href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,100;0,200;0,300;0,700;1,300&display=swap"
		rel="stylesheet"
	>
	<link
		href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css"
		rel="stylesheet"
	/>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"
	></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/datepicker.min.js"
	></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"
	></script>

	<script>
		if (
			localStorage.getItem('color-theme') === 'dark' ||
			(!('color-theme' in localStorage) &&
				window.matchMedia('(prefers-color-scheme: dark)').matches)
		) {
			document.documentElement.classList.add('dark');
		} else {
			document.documentElement.classList.remove('dark');
		}
	</script>

	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="dark:bg-neutral-900 ">
	<div class="flex flex-col">
		<x-header.header />
		<div class="mx-auto max-w-2xl lg:max-w-none" id="alert">
			@if (session()->has('status') && session()->get('message'))
				<div
					class=" mt-4 {{ session()->get('status') === 'Attention!'
					    ? 'text-red-800 bg-red-50 dark:text-red-400'
					    : (session()->get('status') === 'Success!'
					        ? 'text-green-800 bg-green-50 dark:text-green-400'
					        : (session()->get('status') === 'Warning!'
					            ? 'text-yellow-800 bg-yellow-50 dark:text-yellow-400'
					            : 'text-blue-800 bg-blue-50 dark:text-blue-400')) }} mb-4 rounded-md p-4 text-sm dark:bg-gray-800"
					role="alert"
				>
					<svg
						aria-hidden="true"
						class="mr-3 inline h-5 w-5 flex-shrink-0"
						fill="currentColor"
						viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							clip-rule="evenodd"
							d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
							fill-rule="evenodd"
						></path>
					</svg>
					<span class="font-medium">{{ session()->get('status') }}</span>
					{{ session()->get('message') }}

					<button
						aria-label="Close"
						data-dismiss-target="#alert"
						type="button"
					>
						<span class="sr-only">Dismiss</span>
						<svg
							aria-hidden="true"
							class="ml-10 inline h-5 w-5 flex-shrink-0"
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
				</div>
			@endif
		</div>

		<div class="h-fit w-full">
			@yield('content')

		</div>

		<x-footer.footer />
	</div>

	<x-modals.login-modal />
	<x-modals.register-modal />

</body>

</html>

<script>
	var $targetEl = document.getElementById('authentication-modal');
	var options = {
		placement: 'center',
		backdrop: 'dynamic',
		backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
		closable: true,
	};

	var loginModal = new Modal($targetEl, options);
</script>
