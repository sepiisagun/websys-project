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

<body>

	<section class="bg-white dark:bg-neutral-900">
		<div class="mx-auto max-w-screen-xl py-8 px-4 lg:py-16 lg:px-6">
			<div class="mx-auto max-w-screen-sm text-center">
				<h1
					class="text-primary-600 dark:text-primary-500 mb-4 text-7xl font-extrabold tracking-tight lg:text-9xl"
				>404</h1>
				<p
					class="mb-4 text-3xl font-bold tracking-tight text-neutral-900 dark:text-white md:text-4xl"
				>Something's missing.</p>
				<p class="mb-4 text-lg font-light text-neutral-500 dark:text-neutral-400">
					Sorry, we can't find that page. You'll find lots to explore on the home
					page. </p>
				<a href="{{ route('homepage') }}">
					<x-forms.primary-button>
						Back to Homepage
					</x-forms.primary-button>
				</a>
			</div>
		</div>
	</section>

</body>

</html>
