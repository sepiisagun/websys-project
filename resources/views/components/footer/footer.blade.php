<footer class="p-4 bg-white sm:p-6 dark:bg-gray-900">
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
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">
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
