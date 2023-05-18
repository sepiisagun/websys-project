@extends('welcome')

@section('content')
    @auth
        <section class="bg-white dark:bg-gray-900">
            <div class="mx-auto w-full py-4 px-4 lg:py-8 lg:px-6">
                <div class="mx-auto mb-2 max-w-screen-sm text-center">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white lg:text-4xl">Your Houses</h2>
                </div>
                <div class="mx-auto w-4/5 py-8 px-4 lg:py-8 lg:px-6">
                    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-md">
                        <div
                            class="flex flex-col items-center justify-between space-y-3 p-4 md:flex-row md:space-y-0 md:space-x-4">
                            <x-search-bar />
                            <div
                                class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-y-0 md:space-x-3">
                                <a class="hover:text-primary-700 flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white py-2 px-4 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto"
                                    href="{{ route('house.create') }}">
                                    <svg aria-hidden="true" class="mr-2 h-3.5 w-3.5" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path clip-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                            fill-rule="evenodd" />
                                    </svg>
                                    Add Listing
                                </a>
                            </div>
                        </div>
                        <div id="tester">
                             @include('account.renter_table', ['houses' => $houses])
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script type="text/javascript">
            $('#search').on('keyup', function() {
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('search') }}',
                    data: {
                        'search': $value
                    },
                    success: function(data) {
                        $('#tester').html(data);
                    }
                });
            })
            var showDropdown = function (value) {
                sample = '#house-'+value+'-dropdown';
                $(sample).css('position', 'absolute');
                $(sample).css('margin', '0px');
                $(sample).css('transform', 'translate(0px, 80px)');
                $(sample).toggleClass("hidden");
                $(sample).on('blur', function() {
                    $(sample).toggleClass("hidden");
                })
            }
        </script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'csrftoken': '{{ csrf_token() }}'
                }
            });
        </script>
    @endauth
@endsection
