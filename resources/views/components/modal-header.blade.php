<div
	class="flex items-start justify-between rounded-t border-b p-4 dark:border-gray-600"
>
	<h3
		{{ $attributes->merge([
		    'class' => '
		                text-xl
		                font-semibold
		                text-gray-900
		                dark:text-white
		            ',
		]) }}
	>
		{{ $slot }}
	</h3>
</div>
