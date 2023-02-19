{{-- Di ko po muna in-add mas lalong pumapangit yung drafts hahaha --}}
<div
	class="my-8 grid rounded-lg border border-gray-200 shadow-sm dark:border-gray-700 md:mb-12 md:grid-cols-2"
>
	@foreach (config('constants.TESTIMONIAL_ITEMS') as $item)
		<x-testimonial-item :item="$item" />
	@endforeach
</div>
