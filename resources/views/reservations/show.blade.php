@extends('welcome')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="bg-white dark:bg-neutral-900">
    <div
        class="py-30 lg:py-30 mx-auto grid max-w-2xl grid-cols-1 items-center gap-9 px-4 sm:px-6 sm:py-20 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
        <div>
            <h1 class="title-font mb-1 mt-5 text-3xl font-semibold text-black"><span
                    class="bg-gradient-to-r from-slate-600 to-neutral-800 bg-clip-text text-transparent dark:bg-gradient-to-r dark:from-cyan-200 dark:to-blue-500">{{ $house['name'] }}
            </h1></span>
            <h2 class="title-font text-sm tracking-widest text-black dark:text-slate-400">
                {{ $house['address'] }}</h2>
            @if ($reservation->approval_status == "REJECTED")
                <h3 class="text-xs dark:text-white italic">
                    <span class="drop-shadow">
                        Rejected
                    </span>
                </h3>
            @elseif($reservation->status == "PENDING" && $carbon::now()->toDateString() <= $reservation->check_in)
                <h3 class="text-xs dark:text-white">
                    <span class="drop-shadow">
                        {{ $carbon::now()->setTimezone('Asia/Manila')->toDateString() == $reservation->check_in ? 'Awaiting check-in' : 'In ' . $carbon::now()->diffInDays($reservation->check_in) . ' days' }}
                    </span>
                </h3>
            @elseif ($reservation->status == "CANCELLED")
                <h3 class="text-xs dark:text-white italic">
                    <span class="drop-shadow">
                        Cancelled
                    </span>
                </h3>
            @endif
            
            <div class="mt-10 flex flex-row">
                @if ($reservation->approval_status == "APPROVED" && $reservation->status == "ENDED")
                    @if ($reservation->rating != null) 
                        <div class="mt-10 flex flex-row">
                            @for ($i = 0; $i < 5; $i++)
                                @if ($reservation->rating >= $i + 1)
                                    <x-icons.rating-star>
                                        {{ $reservation->rating + 1 }}
                                    </x-icons.rating-star>
                                @else
                                    <x-icons.empty-star>
                                        {{ $reservation->rating + 1 }}
                                    </x-icons.empty-star>
                                @endif
                            @endfor
                        </div>
                    @else
                        <a href="{{ route('house.rate', $reservation->id) }}">
                            <span
                                class="bg-primary-100 text-primary-800 dark:bg-primary-200 dark:text-primary-800 inline-flex items-center rounded px-2.5 text-xs font-light drop-shadow"
                            >
                                <x-icons.rating-star />
                                Rate experience
                            </span>
                        </a>
                    @endif
                @endif
            </div>
            

			<dl
				class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-1 sm:gap-y-16 lg:gap-x-8 {{ $carbon::now()->toDateString() != $reservation->check_in ? "mt-8" : "" }}"
			>
				<ul
					class="flex flex-wrap text-center text-sm font-medium"
					data-tabs-toggle="#myTabContent"
					id="myTab"
					role="tablist"
				>
					<li
						class="mr-2"
						role="presentation"
					>
						<button
							aria-controls="settings"
							aria-selected="false"
							class="inline-block rounded-t-lg border-b-2 p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300"
							data-tabs-target="#settings"
							id="settings-tab"
							role="tab"
							type="button"
						>Details</button>
					</li>
				</ul>
			</dl>

            <div id="myTabContent">
				<!--Details--->
				<div
					aria-labelledby="settings-tab"
					class="hidden h-96 rounded-sm bg-gray-50 p-4 dark:bg-gray-800"
					id="settings"
					role="tabpanel"
				>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Check In
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $carbon::create($reservation->check_in)->toFormattedDateString() }}
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Check Out
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $carbon::create($reservation->check_out)->toFormattedDateString() }}
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Guest Count
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $reservation->guest_count }}
                                    </td>
                                </tr>
                                @if (Auth::user()->role == "RENTEE")
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Hosted by
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $house->user->first_name . ' ' . $house->user->last_name }}
                                        </td>
                                    </tr>
                                @else
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Reserved by
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $reservation->user->first_name . ' ' . $reservation->user->last_name }}
                                        </td>
                                    </tr>
                                @endif
                                
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Total Amount
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $reservation->amount }}
                                    </td>
                                </tr>
                                @if($carbon::now()->setTimezone('Asia/Manila')->toDateString() <= $reservation->check_in && $reservation->approval_status == "APPROVED")
                                    @if (Auth::user()->role == "RENTEE" && $reservation->status == "PENDING")
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4">
                                                @if($carbon::now()->setTimezone('Asia/Manila')->toDateString() < $reservation->check_in)
                                                    <form
                                                        action="{{ route('reserve.cancel', $reservation->id) }}"
                                                        method="POST"
                                                    >
                                                        @csrf
                                                        @method('PATCH')
                                                        <x-forms.danger-button>
                                                            {{ __('Cancel') }}
                                                        </x-forms.danger-button>
                                                        
                                                    </form>
                                                @elseif ($carbon::now()->setTimezone('Asia/Manila')->toDateString() == $reservation->check_in)
                                                    <form
                                                        action="{{ route('reserve.checkin', $reservation->id) }}"
                                                        method="POST"
                                                    >
                                                        @csrf
                                                        @method('PATCH')
                                                        <x-forms.primary-button>
                                                            {{ __('Check In') }}
                                                        </x-forms.primary-button>
                                                    </form>
                                                @endif
                                            </td>
                                            <td></td>
                                        </tr>
                                    @elseif (Auth::user()->role == "RENTER")
                                        @if ($reservation->status == "ONGOING")
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                </th>
                                                <td class="px-6 py-4">
                                                    <form
                                                        action="{{ route('reserve.checkout', $reservation->id) }}"
                                                        method="POST"
                                                    >
                                                        @csrf
                                                        @method('PATCH')
                                                        <x-forms.primary-button>
                                                            {{ __('Check Out') }}
                                                        </x-forms.primary-button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                @endif
                            </tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
		<div>
			<!--House Gallery--->
			<div class="grid grid-cols-1 grid-rows-1">
				<div class="grid grid-cols-1 grid-rows-1 gap-2 pt-2">
					<div class="mb-4 dark:border-gray-700">
						<div class="mb-4 dark:border-gray-700">
							<div class="house-img grid gap-1">
								<div class="img-container">
									<img
										alt=""
										class="h-500px w-500px rounded-sm"
										id="imageBox"
										src="/img/{{ $house['image_path'] }}"
									>
								</div>

                                <div class="house-small-img">
                                    <div class="mx-5 grid grid-cols-5 gap-2 px-5">
                                        <div>
                                            <img alt="" class="h-auto max-w-full rounded-sm"
                                                onclick="myFunction(this)"
                                                src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg">
                                        </div>
                                        <div>
                                            <img alt="" class="h-auto max-w-full rounded-sm"
                                                onclick="myFunction(this)"
                                                src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg">
                                        </div>
                                        <div>
                                            <img alt="" class="h-auto max-w-full rounded-sm"
                                                onclick="myFunction(this)"
                                                src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg">
                                        </div>
                                        <div>
                                            <img alt="" class="h-auto max-w-full rounded-sm"
                                                onclick="myFunction(this)"
                                                src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg">
                                        </div>
                                        <div>
                                            <img alt="" class="h-auto max-w-full rounded-sm"
                                                onclick="myFunction(this)"
                                                src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function myFunction(smallImg) {
                                    var fullImg = document.getElementById("imageBox");
                                    fullImg.src = smallImg.src;
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection