@extends('welcome')

@section('content') 
	<x-listings.listings-body :items="$houses" />
@endsection

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