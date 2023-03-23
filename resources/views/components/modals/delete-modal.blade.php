@props(['id', 'value', 'route'])

<div
	class="fixed top-0 left-0 right-0 z-50 hidden h-[calc(100%-1rem)] overflow-y-auto overflow-x-hidden p-4 md:inset-0 md:h-full"
	id="popup-modal-{{ $id }}"
	tabindex="-1"
>
	<form
		action="{{ route($route, $id) }}"
		method="POST"
	>
		@csrf
		@method('DELETE')
		<div class="relative h-full w-full max-w-md md:h-auto">
			<div class="relative rounded-md bg-white shadow dark:bg-gray-700">
				<button
					class="absolute top-3 right-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
					data-modal-hide="popup-modal-{{ $id }}"
					type="button"
				>
					<svg
						aria-hidden="true"
						class="h-5 w-5"
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
					<span class="sr-only">Close modal</span>
				</button>
				<div class="p-6 text-center">
					<svg
						aria-hidden="true"
						class="mx-auto mb-4 h-14 w-14 text-gray-400 dark:text-gray-200"
						fill="none"
						stroke="currentColor"
						viewBox="0 0 24 24"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
						></path>
					</svg>
					<h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        {{ $slot }}
					</h3>

					<x-forms.danger-button>
						{{ __('Confirm') }}
					</x-forms.danger-button>

					<x-forms.cancel-button data-modal-hide="popup-modal-{{ $id }}">
						{{ config('constants.BUTTON_LABELS.CANCEL') }}
					</x-forms.cancel-button>
				</div>
			</div>
		</div>
	</form>
</div>
