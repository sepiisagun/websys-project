<footer class="mt-auto xl:py-20 pt-20px pb-0 mb-0 bottom-0 w-full bg-white sm:p-6 dark:bg-neutral-900">
    <div class="md:flex md:justify-between">
        <div class="mb-6 md:mb-0">
            <a href="https://flowbite.com/" class="flex items-center">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="somelogo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                    {{ config('app.name') }}
                </span>
            </a>
        </div>
        <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
            @foreach (config('constants.FOOTER_TABS') as $link)
				<x-footer.footer-link :item="$link" />
			@endforeach
        </div>
    </div>
    <hr class="my-6 border-neutral-200 sm:mx-auto dark:border-neutral-700 lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
        <span class="block text-sm text-neutral-500 sm:text-center dark:text-neutral-400">
            {{ config('constants.FOOTER_COPYRIGHT') }}
        </span>
        <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
            @foreach (config('constants.FOOTER_SOCIALS') as $link)
                <x-footer.footer-socials :d="$link['icon']" href="{{ $link['link'] ? route($link['link']) : '#' }}">
                    {{ $link['label'] }}
                </x-footer.footer-socials>
            @endforeach
        </div>
    </div>
</footer>
