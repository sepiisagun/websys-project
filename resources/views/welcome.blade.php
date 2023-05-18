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
	<meta
		content="{{ csrf_token() }}"
		name="_token"
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
	<script src=" https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js">
	</script>

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

<body class="dark:bg-neutral-900">
	<div class="flex flex-col">
		<x-header.header />
		<div
			class="mx-auto max-w-2xl lg:max-w-none"
			id="alert"
		>
			@if (session()->has('status') && session()->get('message'))
				@if (is_array(session()->get('status')))
					@foreach (session()->get('status') as $status)
						@if (count(session()->get('id')) > $loop->index)
							<x-alert :status="$status" :message="session()->get('message')[$loop->index]" :link="session()->get('link')[$loop->index]" :linkname="session()->get('linkName')[$loop->index]" :id="session()->get('id')[$loop->index]"/>
						@else
							<x-alert :status="$status" :message="session()->get('message')[$loop->index]" :link="session()->get('link')[$loop->index]" :linkname="session()->get('linkName')[$loop->index]"/>
						@endif
					@endforeach
				@else
					<x-alert :status="session()->get('status')" :message="session()->get('message')" :link="session()->get('link')" :linkname="session()->get('linkName')" :id="session()->get('id')"/>
				@endif
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
	$(document).ready(function() {
		$.ajax({
			type: 'get',
			url: "/reserve/count",

			success: function(data) {
				$('#requestCount').html(data);
			}
		});
	})
</script>
