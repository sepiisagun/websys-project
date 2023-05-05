<form class="flex items-center">
    <label class="sr-only" for="voice-search">Search</label>
    <div class="relative w-full">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
            <svg aria-hidden="true" class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    fill-rule="evenodd"></path>
            </svg>
        </div>
        <input
            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-sky-500 focus:ring-sky-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-sky-500 dark:focus:ring-sky-500"
            id="search-house" name="search-house" placeholder="Search House ID, City Address..." required
            type="text">
        <button class="absolute inset-y-0 right-0 flex items-center pr-3" type="button">
            <svg aria-hidden="true"
                class="h-4 w-4 text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd"
                    d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z"
                    fill-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    <div class="flex items-center space-x-3 w-full md:w-auto">
        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
            class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
            type="button">
            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400"
                viewbox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                    clip-rule="evenodd" />
            </svg>
            Filter
            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
            </svg>
        </button>
        <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-md shadow dark:bg-gray-700">
            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Categories</h6>
            <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownHelperRadioButton">
                <li>
                    <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <div class="flex items-center h-5">
                            <input id="helper-radio-1" name="category-radio" type="radio" value="Beach House"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        </div>
                        <div class="ml-2 text-sm">
                            <label for="helper-radio" class="font-medium text-gray-900 dark:text-gray-300">
                                <div>Individual</div>
                                <p id="helper-radio-text-4"
                                    class="text-xs font-normal text-gray-500 dark:text-gray-300">Some helpful
                                    instruction goes over here.</p>
                            </label>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <div class="flex items-center h-5">
                            <input id="helper-radio-2" name="category-radio" type="radio" value="Farm"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        </div>
                        <div class="ml-2 text-sm">
                            <label for="helper-radio-5" class="font-medium text-gray-900 dark:text-gray-300">
                                <div>Company</div>
                                <p id="helper-radio-text-5"
                                    class="text-xs font-normal text-gray-500 dark:text-gray-300">Some helpful
                                    instruction goes over here.</p>
                            </label>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <div class="flex items-center h-5">
                            <input id="helper-radio-3" name="category-radio" type="radio" value="Private Room"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        </div>
                        <div class="ml-2 text-sm">
                            <label for="helper-radio-6" class="font-medium text-gray-900 dark:text-gray-300">
                                <div>Non profit</div>
                                <p id="helper-radio-text-6"
                                    class="text-xs font-normal text-gray-500 dark:text-gray-300">Some helpful
                                    instruction goes over here.</p>
                            </label>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <div class="flex items-center h-5">
                            <input id="helper-radio-4" name="category-radio" type="radio" value="Cabin"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        </div>
                        <div class="ml-2 text-sm">
                            <label for="helper-radio-6" class="font-medium text-gray-900 dark:text-gray-300">
                                <div>Non profit</div>
                                <p id="helper-radio-text-6"
                                    class="text-xs font-normal text-gray-500 dark:text-gray-300">Some helpful
                                    instruction goes over here.</p>
                            </label>
                        </div>
                    </div>
                </li>
            </ul>
            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Ratings</h6>
            <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownHelperRadioButton">
                <li>
                    <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <div class="flex items-center h-5">
                            <input id="helper-radio-1" name="rating-radio" type="radio" value="1"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        </div>
                        <div class="ml-2 text-sm">
                            <label for="helper-radio" class="font-medium text-gray-900 dark:text-gray-300">
                                <div>Individual</div>
                                <p id="helper-radio-text-4"
                                    class="text-xs font-normal text-gray-500 dark:text-gray-300">Some helpful
                                    instruction goes over here.</p>
                            </label>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <div class="flex items-center h-5">
                            <input id="helper-radio-2" name="rating-radio" type="radio" value="2"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        </div>
                        <div class="ml-2 text-sm">
                            <label for="helper-radio-5" class="font-medium text-gray-900 dark:text-gray-300">
                                <div>Company</div>
                            </label>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <div class="flex items-center h-5">
                            <input id="helper-radio-3" name="rating-radio" type="radio" value="3"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        </div>
                        <div class="ml-2 text-sm">
                            <label for="helper-radio-6" class="font-medium text-gray-900 dark:text-gray-300">
                                <div>Non profit</div>
                                <p id="helper-radio-text-6"
                                    class="text-xs font-normal text-gray-500 dark:text-gray-300">Some helpful
                                    instruction goes over here.</p>
                            </label>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="flex p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <div class="flex items-center h-5">
                            <input id="helper-radio-4" name="rating-radio" type="radio" value="4"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        </div>
                        <div class="ml-2 text-sm">
                            <label for="helper-radio-6" class="font-medium text-gray-900 dark:text-gray-300">
                                <div>Non profit</div>
                                <p id="helper-radio-text-6"
                                    class="text-xs font-normal text-gray-500 dark:text-gray-300">Some helpful
                                    instruction goes over here.</p>
                            </label>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <button id="filter-button"
        class="ml-2 inline-flex items-center rounded-lg border border-sky-700 bg-sky-700 py-2.5 px-3 text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-4 focus:ring-sky-300 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800"
        type="button">
        <svg aria-hidden="true" class="mr-2 -ml-1 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2"></path>
        </svg>Search
    </button>
</form>
