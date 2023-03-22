@extends('welcome')
@inject('carbon', 'Carbon\Carbon')

@section('content')
	<section class="flex w-full flex-row justify-evenly bg-white dark:bg-gray-900">
		<div class="mx-5 w-2/5 px-4 py-8 lg:py-16">
			<h1 class="title-font mb-4 text-3xl font-semibold text-black">Rate your
				Experience</h1>
			<form
				action="{{ route('rate.submit', ['houseId' => $house->house_id, 'reservationId' => $house->reservation_id]) }}"
				method="POST"
			>
				@csrf
				<div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
					<div class="grid grid-cols-2">
						<div class="col-span-2 flex flex-row">
							<input
								class="rating rating-1"
								id="rating-1"
								name="rating"
								type="radio"
								value="1"
							/>
							<label
								class="rating rating-1"
								for="rating-1"
							>
								<x-icons.star-no-color />
							</label>
							<input
								class="rating rating-2"
								id="rating-2"
								name="rating"
								type="radio"
								value="2"
							/>
							<label
								class="rating rating-2"
								for="rating-2"
							>
								<x-icons.star-no-color />
							</label>
							<input
								class="rating rating-3"
								id="rating-3"
								name="rating"
								type="radio"
								value="3"
							/>
							<label
								class="rating rating-3"
								for="rating-3"
							>
								<x-icons.star-no-color />
							</label>
							<input
								class="rating rating-4"
								id="rating-4"
								name="rating"
								type="radio"
								value="4"
							/>
							<label
								class="rating rating-4"
								for="rating-4"
							>
								<x-icons.star-no-color />
							</label>
							<input
								class="rating rating-5"
								id="rating-5"
								name="rating"
								type="radio"
								value="5"
							/>
							<label
								class="rating rating-5"
								for="rating-5"
							>
								<x-icons.star-no-color />
							</label>

						</div>
						<div class="col-span-2">
							<x-forms.input-error :messages="$errors->get('rating')" />
						</div>
					</div>
					<div class="sm:col-span-2">
						<x-forms.input-label
							:value="__('Title')"
							for="remark"
						/>
						<x-forms.text-input
							:class="$errors->get('title')
							    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
							    : 'block mt-1 w-full'"
							:value="old('title')"
							id="title"
							name="title"
							placeholder="This house was amazing!"
							type="text"
						/>
						<x-forms.input-error :messages="$errors->get('title')" />
					</div>
					<div class="sm:col-span-2">
						<x-forms.input-label
							:value="__('Comment')"
							for="excerpt"
						/>
						<x-forms.text-input
							:class="$errors->get('comment')
							    ? 'bg-red-50 border border-red-500 focus:ring-red-500 focus:border-red-500  dark:border-red-400'
							    : 'block mt-1 w-full'"
							:value="old('comment')"
							id="comment"
							name="comment"
							placeholder="Our stay was fun and enjoying...."
							type="text"
						/>
						<x-forms.input-error :messages="$errors->get('comment')" />
					</div>
				</div>
				<div class="flex items-center space-x-4">
					<x-forms.primary-button>
						{{ config('constants.BUTTON_LABELS.SUBMIT') }}
					</x-forms.primary-button>
					<x-forms.cancel-button :href="url()->previous()">
						{{ config('constants.BUTTON_LABELS.CANCEL') }}
					</x-forms.cancel-button>
				</div>
			</form>
		</div>
		<div class="mx-5 w-2/5 px-4 py-8 lg:py-16">
			<h1 class="title-font mb-1 text-3xl font-semibold text-black">
				{{ $house->name }}</h1>
			<div class="flex w-full flex-row justify-between">
				<h2 class="title-font text-sm tracking-widest text-black">
					{{ $house->address }}</h2>
				<h3 class="title-font text-xs text-black">
					{{ $carbon::create($house->created_at)->toFormattedDateString() }}</h3>
			</div>
			<div class="grid-rows-8 grid grid-cols-8 gap-2 pt-6">
				<figure class="col-start-1 col-end-3 row-start-1 row-end-3 grid">
					<img
						alt="Gallery image 1"
						class="gallery__img1"
						src="/img/{{ $house->image_path }}"
					>
				</figure>
				<figure class="col-start-3 col-end-5 row-start-1 row-end-3 grid">
					<img
						alt="Gallery image 2"
						class="gallery__img2"
						src="/img/{{ $house->image_path }}"
					>
				</figure>
				<figure class="col-start-5 col-end-9 row-start-1 row-end-6 grid">
					<img
						alt="Gallery image 3"
						class="gallery__img3"
						src="/img/{{ $house->image_path }}"
					>
				</figure>
				<figure class="col-start-1 col-end-5 row-start-3 row-end-6 grid">
					<img
						alt="Gallery image 4"
						class="gallery__img4"
						src="/img/{{ $house->image_path }}"
					>
				</figure>
			</div>
		</div>
	</section>
@endsection
