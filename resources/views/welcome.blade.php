@extends('layouts.index')

@section('content')
    <section class="px-4 sm:px-16 pt-5">
        <div class="bg-gradient-to-r from-[#4F0487] to-[#130121] font-sans px-6 py-16 rounded-2xl">
            <div class="container mx-auto flex flex-col justify-center items-center text-center">
                <h2 class="text-white sm:text-4xl text-3xl font-bold mb-4">Over 10,000+ jobs to apply</h2>
                <p class="text-white text-base text-center mb-8 sm:w-[60%] w-full">Your Next Big Career Move Starts Right
                    Here -
                    Explore the Best Job Opportunities and Take the First Step Toward Your Future!</p>

                <form action="{{ route('jobs.search') }}" method="GET"
                    class="flex flex-col sm:flex-row items-center bg-white border rounded-lg shadow-md p-2 space-y-3 sm:space-y-0 sm:space-x-2">
                    <input type="text" name="search" placeholder="Search for jobs"
                        class="flex-grow px-4 py-2 text-gray-700 placeholder-gray-400 border border-gray-300 outline-none rounded-lg focus:ring focus:ring-blue-500" />

                    <div class="hidden sm:block w-px h-8 bg-gray-300"></div>

                    <input type="text" name="location" placeholder="Location"
                        class="flex-grow px-4 py-2 text-gray-700 placeholder-gray-400 border border-gray-300 outline-none rounded-lg focus:ring focus:ring-blue-500" />

                    <button type="submit"
                        class="bg-blue-700 text-white px-5 py-2 rounded-lg focus:ring focus:ring-blue-500 w-full sm:w-auto">
                        Search
                    </button>
                </form>


            </div>
        </div>
    </section>

    <section class="px-4 sm:px-16 pt-8">
        <div
            class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-10 shadow-sm border border-[#E1E1E1] py-3 px-8 rounded-md">
            <span class="text-[#7E7396] dark:text-white">Trusted by</span>
            <div class="flex items-center gap-4 sm:gap-10 justify-center sm:justify-start">
                <img src="{{ asset('images/microsoft_logo.svg') }}" alt="Microsoft Logo" class="w-32 sm:w-auto">
                <img src="{{ asset('images/walmart_logo.svg') }}" alt="Walmart Logo" class="w-32 sm:w-auto">
                <img class="mb-2 w-32 sm:w-auto" src="{{ asset('images/accenture_logo.svg') }}" alt="Accenture Logo">
            </div>
        </div>
    </section>


    <section class="px-4 sm:px-16 pt-8">
        <div class="flex flex-col lg:flex-row">
            <!-- Filter Icon visible on desktop and mobile -->
            <div class="flex justify-end items-center p-4 lg:hidden">
                <button id="filterButton" class="text-xl text-gray-800 p-2 rounded-full focus:outline-none">
                    <!-- Custom SVG Filter Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 dark:text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                    </svg>
                </button>
            </div>

            <!-- Sidebar visible on desktop for filters -->
            <div class="lg:w-[20vw] w-full mb-8 lg:mb-0 hidden lg:block">
                <div class="w-full lg:w-80 p-4 space-y-6">

                    <!-- Search by Categories Section -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2 dark:text-white">Search by Categories</h3>
                        <ul class="space-y-5">

                            <li class="flex items-center" data-category="programming">
                                <a href="{{ route('jobs.filter', ['category' => 'programming']) }}"
                                    class="text-sm underline hover:text-blue-800 dark:text-white dark:hover:text-gray-200">
                                    Programming ({{ $jobs->where('category', 'programming')->count() }})
                                </a>
                            </li>


                            <li class="flex items-center" data-category="marketing">
                                <a href="{{ route('jobs.filter', ['category' => 'marketing']) }}"
                                    class="text-sm underline hover:text-blue-800 dark:text-white dark:hover:text-gray-200">
                                    Marketing ({{ $jobs->where('category', 'marketing')->count() }})
                                </a>
                            </li>
                            <li class="flex items-center" data-category="design">
                                <a href="{{ route('jobs.filter', ['category' => 'designing']) }}"
                                    class="text-sm underline hover:text-blue-800 dark:text-white dark:hover:text-gray-200">
                                    Designing ({{ $jobs->where('category', 'design')->count() }})
                                </a>
                            </li>
                            <li class="flex items-center" data-category="accounting">
                                <a href="{{ route('jobs.filter', ['category' => 'accounting']) }}"
                                    class="text-sm underline hover:text-blue-800 dark:text-white dark:hover:text-gray-200">
                                    Accounting ({{ $jobs->where('category', 'accounting')->count() }})
                                </a>
                            </li>
                            <li class="flex items-center" data-category="analytics">
                                <a href="{{ route('jobs.filter', ['category' => 'analytics']) }}"
                                    class="text-sm underline hover:text-blue-800 dark:text-white dark:hover:text-gray-200">
                                    Analytics ({{ $jobs->where('category', 'analytics')->count() }})
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <!-- Popup Filter Section visible only on small screens (mobile) -->
            <div id="filterPopup"
                class="fixed inset-x-0 bottom-0 bg-white shadow-xl transform translate-y-full transition-transform duration-300 ease-in-out p-4 lg:hidden">
                <div class="space-y-6">
                    <!-- Current Search Section -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Current Search</h3>
                        <div class="flex flex-wrap gap-2">
                            <span
                                class="px-4 py-2 bg-blue-100 border border-blue-600 text-blue-600 text-sm rounded-md">Full
                                Stack</span>
                            <span
                                class="px-4 py-2 bg-red-100 border border-red-600 text-red-600 text-sm rounded-md">Bangalore</span>
                        </div>
                    </div>

                    <!-- Search by Categories Section -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Search by Categories</h3>
                        <ul class="space-y-5">
                            <li class="flex items-center">
                                <input type="checkbox" id="programming"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                                <label for="programming" class="ml-2 text-sm text-gray-700">Programming
                                    ({{ count($jobs) }})</label>
                            </li>
                            <li class="flex items-center">
                                <input type="checkbox" id="marketing"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                                <label for="marketing" class="ml-2 text-sm text-gray-700">Marketing
                                    ({{ count($jobs) }})</label>
                            </li>
                            <li class="flex items-center">
                                <input type="checkbox" id="designing"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded" checked>
                                <label for="designing" class="ml-2 text-sm text-gray-700">Designing
                                    ({{ count($jobs) }})</label>
                            </li>
                            <li class="flex items-center">
                                <input type="checkbox" id="accounting"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                                <label for="accounting" class="ml-2 text-sm text-gray-700">Accounting
                                    ({{ count($jobs) }})</label>
                            </li>
                            <li class="flex items-center">
                                <input type="checkbox" id="analytics"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                                <label for="analytics" class="ml-2 text-sm text-gray-700">Analytics
                                    ({{ count($jobs) }})</label>
                            </li>
                        </ul>
                    </div>

                    <!-- Search by Location Section -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2 ">Search by Location</h3>
                        <ul class="space-y-5">
                            <li class="flex items-center">
                                <input type="checkbox" id="bangalore"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                                <label for="bangalore" class="ml-2 text-sm text-gray-700">Bangalore (24)</label>
                            </li>
                            <li class="flex items-center">
                                <input type="checkbox" id="hyderabad"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                                <label for="hyderabad" class="ml-2 text-sm text-gray-700">Hyderabad (41)</label>
                            </li>
                            <li class="flex items-center">
                                <input type="checkbox" id="mumbai"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                                <label for="mumbai" class="ml-2 text-sm text-gray-700">Mumbai (15)</label>
                            </li>
                            <li class="flex items-center">
                                <input type="checkbox" id="chennai"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                                <label for="chennai" class="ml-2 text-sm text-gray-700">Chennai (22)</label>
                            </li>
                        </ul>
                    </div>

                    <!-- Close Button -->
                    <div class="text-center mt-4">
                        <button id="closeFilterPopup"
                            class="bg-red-500 text-white px-4 py-2 rounded-lg focus:outline-none">
                            Close
                        </button>
                    </div>
                </div>
            </div>

            <div class="lg:w-[75vw] w-full">
                <!-- Content for the white div -->
                <div class="p-6">
                    <!-- Section Header -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Latest jobs</h2>
                        <p class="text-gray-600 pt-3 dark:text-white">Get your desired job from top companies</p>
                    </div>

                    <!-- Job Cards Container -->
                    <div class="flex flex-wrap gap-6 justify-center sm:justify-start">
                        <!-- Job Card -->
                        @if ($jobs->isEmpty())
                            <div class="font-bold text-3xl pt-8 flex justify-center w-full text-gray-700 dark:text-white">
                                No jobs found !🙄
                            </div>
                        @else
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($jobs as $job)
                                    <div
                                        class="flex-none w-full sm:w-[260px] bg-white border border-gray-300 rounded-lg shadow-md p-6 hover:border-blue-500 dark:bg-gray-800 h-fit">
                                        <img class="w-40 object-cover " src="{{ asset('storage/' . $job->company_image) }}" alt="">

                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                                            {{ $job->title }}</h3>
                                        <div class="flex items-center space-x-2 mt-2 mb-4">
                                            <span
                                                class="px-3 py-1 bg-blue-100 text-blue-600 text-xs rounded-full">{{ $job->location }}</span>
                                            <span
                                                class="px-3 py-1 bg-red-100 text-red-600 text-xs rounded-full">{{ $job->levels }}</span>
                                        </div>
                                        <p class="text-gray-600 text-sm mb-4 dark:text-white line-clamp-4">
                                            {{ Str::limit($job->description, 100) }}
                                            <!-- Display a shortened description -->
                                        </p>
                                        <div class="flex space-x-4">
                                            @auth
                                                <a href="{{ route('apply', ['jobId' => $job->id]) }}">
                                                    <button
                                                        class="bg-blue-500 text-white px-3 py-2 text-sm rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                        Apply now
                                                    </button>
                                                </a>
                                            @else
                                                <a href="/register">
                                                    <button
                                                        class="bg-gray-300 text-gray-500 px-2 py-2 text-sm rounded-lg cursor-not-allowed">
                                                        Apply (Login Required)
                                                    </button>
                                                </a>
                                            @endauth
                                            <button
                                                class="bg-gray-100 text-gray-600 px-3 py-2 text-sm rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                                <a href="{{ route('job.details', ['jobId' => $job->id]) }}">Learn more</a>
                                            </button>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        @endif


                        <div class="mt-6">
                            {{ $jobs->links() }}
                        </div>



                        <!-- More cards can follow the same structure -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 sm:px-16 pt-8">
        <div
            class="flex flex-col lg:flex-row items-center justify-between p-8 bg-purple-50 rounded-lg shadow-md dark:bg-gray-800 dark:border border-white">
            <div class="mb-6 lg:mb-0 lg:mr-8 text-center lg:text-left">
                <h2 class="text-xl lg:text-3xl font-semibold text-gray-800 mb-4 w-full lg:w-[60%] dark:text-white">Download
                    mobile app for
                    a better experience</h2>
                <div class="flex justify-center lg:justify-start space-x-4">
                    <img src="{{ asset('images/app_store.svg') }}" alt="App Store">
                    <img src="{{ asset('images/play_store.svg') }}" alt="Google Play">
                </div>
            </div>
            <div class="flex-shrink-0">
                <img src="{{ asset('images/excited-young-woman-showing-banner-pointing-fingers-left-smiling-camera-standing-amazed-white-wall 1.png') }}"
                    alt="Smiling Woman" class="w-full lg:w-auto max-w-sm rounded-lg">
            </div>
        </div>
    </section>



    <script>
        // Get popup and button elements
        const filterButton = document.getElementById("filterButton");
        const filterPopup = document.getElementById("filterPopup");
        const closeFilterPopup = document.getElementById("closeFilterPopup");

        // Open popup
        filterButton.addEventListener("click", function() {
            filterPopup.classList.remove("translate-y-full");
            filterPopup.classList.add("translate-y-0");
        });

        // Close popup
        closeFilterPopup.addEventListener("click", function() {
            filterPopup.classList.remove("translate-y-0");
            filterPopup.classList.add("translate-y-full");
        });
    </script>
@endsection
