@props([
    'status' => '',
    'message' => '',
    'link' => '',
    'linkname' => '',
    'id' => ''
])

<div
    class="{{ $status === 'Attention!'
        ? 'text-red-800 bg-red-50 dark:text-red-400'
        : ($status === 'Success!'
            ? 'text-green-800 bg-green-50 dark:text-green-400'
            : ($status === 'Warning:'
                ? 'text-yellow-800 bg-yellow-50 dark:text-yellow-400'
                : 'text-blue-800 bg-blue-50 dark:text-blue-400')) }} mt-4 mb-4 rounded-md p-4 text-sm dark:bg-gray-800"
    role="alert"
>
    <svg
        aria-hidden="true"
        class="mr-3 inline h-5 w-5 flex-shrink-0"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
            clip-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
            fill-rule="evenodd"
        ></path>
    </svg>
    <span class="font-medium">{{ $status }}</span>
    {{ $message }}
    @if ($link)
        @if($id)
            <a href="{{ route($link, $id) }}" class="underline">{{ $linkname }}</a>
        @elseif(!empty($link))
            <a href="{{ route($link) }}" class="underline">{{ $linkname }}</a>
        @endif
    @endif
    <button
        aria-label="Close"
        data-dismiss-target="#alert"
        type="button"
    >
        <span class="sr-only">Dismiss</span>
        <svg
            aria-hidden="true"
            class="ml-10 inline h-5 w-5 flex-shrink-0"
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
    </button>
</div>