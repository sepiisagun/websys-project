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
	<x-header />

	@yield('content')

	<x-hero />
	<x-features />
	<x-testimonials />
	<x-listings-cta />
	<x-stats />
	<x-team-section />
	<x-login-modal />
	<x-register-modal />

	<x-footer />
</body>

<script>
	var $targetEl = document.getElementById('authentication-modal');
	var options = {
		placement: 'center',
		backdrop: 'dynamic',
		backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
		closable: true,
	};

	var loginModal = new Modal($targetEl, options);

	function closeLoginModal() {
		loginModal.hide();
	}
	if ({{ $errors->any() }}) {
		loginModal.toggle();
	}
</script>

</html>
