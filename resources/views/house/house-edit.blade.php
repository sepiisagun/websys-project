@extends('welcome')

@section('content')
	<section class="bg-white dark:bg-gray-900">
		<div class="mx-auto max-w-2xl py-8 px-4 lg:py-16">
			<h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
				Edit {{ $house->name }}
			</h2>
			<form
				action="#"
				method=""
			>
				<div class="mb-6 grid gap-4 sm:grid-cols-1 sm:gap-6">
					<div class="col-span-2">
						<label
							class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="name"
						>Property Name</label>
						<input
							class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-sm border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
							id="name"
							name="name"
							type="text"
							value="{{ $house->name }}"
						>
					</div>
					<div class="col-span-2">
						<label
							class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="description"
						>Property Description</label>
						<textarea
						 class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-sm border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
						 id="text"
						>{{ $house->description }}</textarea>
					</div>
					<div class="row-cols-2">
						<div class="col-1 col-span-1 max-w-xs">
							<label
								class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
								for="brand"
							>Property Address</label>
							<input
								class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-sm border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
								id="address"
								name="address"
								type="text"
								value="{{ $house->address }}"
							>
						</div>
						<div class="col-2 col-span-1 max-w-xs">
							<label
								class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
								for="price"
							>Capacity</label>
							<input
								class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-sm border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
								id="capacity"
								name="capacity"
								type="number"
								value="{{ $house->capacity }}"
							>
						</div>
					</div>
					<div class="row-cols-2">
						<div class="col-1 col-span-1 max-w-xs">
							<label
								class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
								for="price"
							>Price</label>
							<input
								class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-sm border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
								id="price"
								name="price"
								type="number"
								value="{{ $house->price }}"
							>
						</div>

						<div class="col-2 col-span-1 max-w-xs">
							<label
								class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
								for="image_path"
							>Images</label>
							<input
								class="block w-full cursor-pointer rounded-md border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
								id="image_path"
								name="image_path"
								required
								type="file"
							>
						</div>
					</div>

					{{-- <div class="w-full">
						<label
							class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
							for="image_path"
						>Images</label>
						<input
							class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-sm border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
							id="image_path"
							name="image_path"
							type="file"
							value="{{ $house->image_path }}"
						>
					</div> --}}
				</div>

				<button
					class="mr-2 mb-2 rounded-sm bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
					type="submit"
				>Edit</button>
			</form>
		</div>
	</section>
@endsection
