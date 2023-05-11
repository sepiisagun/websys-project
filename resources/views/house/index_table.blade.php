<div
    class="mt-12 grid grid-cols-1 gap-x-6 gap-y-5 dark:text-slate-300 sm:grid-cols-2 sm:gap-y-8 lg:grid-cols-4 lg:gap-x-8"
>
    @foreach ($houses as $house)
        <x-listings.listing-item :house="$house" />
    @endforeach
</div>
<div 
    class="mx-auto mt-8 w-4/5 pb-10"
    id="pagination"
>
    {{ $houses->links() }}
</div>