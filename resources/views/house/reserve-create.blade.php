@extends('welcome')

@section('content')
<section class="bg-white dark:bg-neutral-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-neutral-900 dark:text-white">Reserve this property</h2>
        <form action="" method="">
            @csrf
            <div class="grid gap-4 sm:grid-cols-1 sm:gap-6">
                
                <div>
                    <x-forms.input-label for="name" :value="__('Property Name')" />
                    <x-forms.text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Property Name" required autofocus autocomplete="name" />
                </div>
                <div>
                    <x-forms.input-label for="description" :value="__('Property Description')" />
                    <x-forms.textarea-input id="description" class="block mt-1 w-full" name="description" placeholder="Property Description" required autofocus />
                </div>

            <div class="flex items-center justify-end mt-4">
                <x-forms.primary-button>
                    {{ __('Place Reservation') }}
                </x-forms.primary-button>
            </div>
        </form>

    </div>
  </section>
@endsection
