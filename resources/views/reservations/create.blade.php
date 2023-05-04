@extends('welcome')

@section('content')
    <section class="bg-white dark:bg-neutral-900">
        <div class="mx-auto max-w-2xl py-8 px-4 lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-neutral-900 dark:text-white">
                Reserve this property
            </h2>
            <form action="" method="">
                @csrf
                <div class="grid gap-4 sm:grid-cols-1 sm:gap-6">

                    <div>
                        <x-forms.input-label :value="__('Property Name')" for="name" />
                        <x-forms.text-input autocomplete="name" autofocus class="mt-1 block w-full" id="name"
                            name="name" placeholder="Property Name" required type="text" />
                    </div>
                    <div>
                        <x-forms.input-label :value="__('Property Description')" for="description" />
                        <x-forms.textarea-input autofocus class="mt-1 block w-full" id="description" name="description"
                            placeholder="Property Description" required />
                    </div>

                    <div class="mt-4 flex items-center justify-end">
                        <x-forms.primary-button>
                            {{ __('Place Reservation') }}
                        </x-forms.primary-button>
                    </div>
            </form>

        </div>
    </section>
@endsection
