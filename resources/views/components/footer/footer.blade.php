<footer
	class="pt-20px bottom-0 mt-auto mb-0 w-full bg-white pb-0 dark:bg-neutral-900 sm:p-6 xl:py-20"
>
	<div class="md:flex md:justify-between">
		<div class="mb-6 md:mb-0">
			<a
				class="flex items-center"
				href="{{ route('homepage') }}"
			>
				<img
					alt="somelogo"
					class="mr-3 h-8"
					src="https://ichef.bbci.co.uk/news/976/cpsprodpb/16620/production/_91408619_55df76d5-2245-41c1-8031-07a4da3f313f.jpg"
				/>
				<span
					class="self-center whitespace-nowrap text-2xl font-semibold dark:text-white"
				>
					{{ config('app.name') }}
				</span>
			</a>
		</div>
		<div class="grid grid-cols-2 gap-8 sm:grid-cols-3 sm:gap-6">
			@foreach (config('constants.FOOTER_TABS') as $link)
				<x-footer.footer-link :item="$link" />
			@endforeach
		</div>
	</div>
	<hr
		class="my-6 border-neutral-200 dark:border-neutral-700 sm:mx-auto lg:my-8" />
	<div class="sm:flex sm:items-center sm:justify-between">
		<span
			class="block text-sm text-neutral-500 dark:text-neutral-400 sm:text-center"
		>
			{{ config('constants.FOOTER_COPYRIGHT') }}
		</span>
		<div class="mt-4 flex space-x-6 sm:mt-0 sm:justify-center">
			@foreach (config('constants.FOOTER_SOCIALS') as $link)
				<x-footer.footer-socials
					:d="$link['icon']"
					href="{{ $link['link'] ? route($link['link']) : '#' }}"
				>
					{{ $link['label'] }}
				</x-footer.footer-socials>
			@endforeach
		</div>
	</div>
</footer>
