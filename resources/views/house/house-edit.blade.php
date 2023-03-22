@extends('welcome')

@section('content')
<section class="bg-white dark:bg-neutral-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-neutral-900 dark:text-white">Edit a property</h2>
        <form action="{{ route('house.update', $house) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-4 sm:grid-cols-1 sm:gap-6">
                <div>
                    <x-forms.input-label for="name" :value="__('Property Name')" />
                    <x-forms.text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $house->name }}" required autofocus />
                </div>
                <div>
                    <x-forms.input-label for="description" :value="__('Property Description')" />
                    <x-forms.textarea-input id="description" class="block mt-1 w-full" name="description"  required autofocus>{{ $house->description }}</x-forms.textarea-input>
                </div>
                <div>
                    <x-forms.input-label for="address" :value="__('Property Address')" />
                    <x-forms.text-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ $house->address }}" required autofocus />
                </div>
                <div>
                    <x-forms.input-label for="capacity" :value="__('Capacity')" />
                    <x-forms.text-input id="capacity" class="block mt-1 w-full" type="number" name="capacity" value="{{ $house->capacity }}" required autofocus />
                </div>
                <div>
                    <x-forms.input-label for="price" :value="__('Price')" />
                    <x-forms.text-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{ $house->price }}" required autofocus />
                </div>

                <div>
                    <x-forms.input-label for="image_path" :value="__('Images')" />
                    <x-forms.text-input id="image_path" class="block mt-1 w-full" type="file" name="image_path" value="{{ $house->image_path }}" autofocus />
                </div>
            </div>
            
            <div class="flex items-center justify-end mt-4">
                <x-forms.primary-button>
                    {{ __('Edit Property') }}
                </x-forms.primary-button>
            
                {{-- <div class="flex items-center justify-end mt-4">
                    <form action="{{ route('house.destroy', $house->id) }}" method="POST">
                        @csrf
                        @method('DELETE') 
                        <x-forms.danger-button
                            >
                            {{ __('Delete Property') }}
                        </x-forms.danger-button>
                     </form> 
                </div> --}}

                <x-forms.cancel-button href="{{ url()->previous() }}">
                    {{ config('constants.BUTTON_LABELS.CANCEL') }}
                </x-forms.cancel-button>
            </div>
        </form>
    </div>
</section>
@endsection
