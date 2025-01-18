@extends('layouts.index')
@section('content')
    <section class="bg-white dark:bg-gray-800 px-16 pt-8">

        <div
            class="flex flex-col sm:flex-row items-center justify-between p-8 border border-blue-500 bg-[#F2F7FF] rounded-md dark:bg-gray-800 dark:border-gray-300">
            <div class="flex items-center gap-x-9 py-8 ">

                <div class="border border-gray-300 py-8 px-3 bg-white shadow">
                    <img class="w-40" src="{{ asset('storage/' . $job->company_image) }}" alt="">
                </div>

                <div class="flex flex-col gap-y-4">
                    <h1 class="text-3xl font-semibold dark:text-white">{{ $job->title }}</h1> <!-- Job title -->
                    <div class="flex items-center gap-x-6">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5 dark:text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>

                            <span class="dark:text-white">{{ $job->location }}</span> <!-- Dynamic location -->
                        </div>

                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5 dark:text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>

                            <span class="dark:text-white">{{ $job->levels }}</span> <!-- Dynamic job level -->
                        </div>

                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5 dark:text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                            </svg>
                            <span class="dark:text-white">CTC: ${{ number_format($job->salary, 0) }}</span>
                            <!-- Dynamic salary -->
                        </div>
                    </div>
                </div>

            </div>


            <div class="flex flex-col gap-y-3 items-end">
                <div class="pt-10">
                    @auth
                        <a href="{{ route('apply', ['jobId' => $job->id]) }}">
                            <button class="bg-[#0260FF] px-16 py-3 rounded-lg text-white hover:bg-blue-600">
                                Apply now
                            </button>
                        </a>
                    @else
                        <a href="{{ route('register') }}">
                            <button class="bg-gray-300 px-16 py-3 rounded-lg text-gray-500 cursor-not-allowed">
                                Apply (Login Required)
                            </button>
                        </a>
                    @endauth
                </div> <span class="text-sm dark:text-white">{{ $job->created_at->diffForHumans() }} </span>
            </div>
        </div>
    </section>



    <section class="px-4 sm:px-16 pt-12">

        <div class="flex gap-x-16">
            <!-- Main Job Description Card -->
            <div class="flex-1">
                <h1 class="text-2xl font-semibold mb-4 dark:text-white">Job description</h1>
                <p class="text-gray-700 mb-8 text-sm dark:text-white">
                    {{ $job->description }}
                </p>



                <div class="pt-10">
                    @auth
                        <a href="{{ route('apply', ['jobId' => $job->id]) }}">
                            <button
                                class="bg-blue-500 text-white px-3 py-2 text-sm rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Apply now
                            </button>
                        </a>
                    @else
                        <a href="{{ route('register') }}">
                            <button class="bg-gray-300 px-16 py-3 rounded-lg text-gray-500 cursor-not-allowed">
                                Apply (Login Required)
                            </button>
                        </a>
                    @endauth
                </div>


            </div>

            <!-- Sidebar -->
            <div class="w-1/4 flex flex-col gap-y-8">
                <div class="flex flex-colgap-6 justify-center sm:justify-start">
                    <!-- Job Card -->
                    <div class="flex flex-col gap-4">
                        @foreach ($jobs as $job)
                            <div
                                class="flex-none w-full sm:w-[260px] bg-white border border-gray-300 rounded-lg shadow-md p-6 hover:border-blue-500 dark:bg-gray-800">
                                <img class="w-40" src="{{ asset('storage/' . $job->company_image) }}" alt="">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $job->title }}</h3>
                                <div class="flex items-center space-x-2 mt-2 mb-4">
                                    <span
                                        class="px-3 py-1 bg-blue-100 text-blue-600 text-xs rounded-full">{{ $job->location }}</span>
                                    <span
                                        class="px-3 py-1 bg-red-100 text-red-600 text-xs rounded-full">{{ $job->levels }}</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-4 dark:text-white line-clamp-4">
                                    {{ Str::limit($job->description, 100) }} <!-- Display a shortened description -->
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
                                        <button
                                            class="bg-gray-300 text-gray-500 px-2 py-2 text-sm rounded-lg cursor-not-allowed">
                                            Apply (Login Required)
                                        </button>
                                    @endauth
                                    <button
                                        class="bg-gray-100 text-gray-600 px-3 py-2 text-sm rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                        <a href="{{ route('job.details', ['jobId' => $job->id]) }}">Learn More</a>
                                    </button>

                                </div>
                            </div>
                        @endforeach
                    </div>




                    <!-- More cards can follow the same structure -->
                </div>



                {{-- <div class="flex flex-wrap gap-6 justify-center sm:justify-start">
                    <!-- Job Card -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($jobs as $job)
                            <div
                                class="flex-none w-full sm:w-[260px] bg-white border border-gray-300 rounded-lg shadow-md p-6 hover:border-blue-500 dark:bg-gray-800">
                                <img src="{{ asset('images/microsoft_logo.svg') }}" alt="Company Logo" class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $job->title }}</h3>
                                <div class="flex items-center space-x-2 mt-2 mb-4">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-600 text-xs rounded-full">{{ $job->location }}</span>
                                    <span class="px-3 py-1 bg-red-100 text-red-600 text-xs rounded-full">{{ $job->levels }}</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-4 dark:text-white line-clamp-4">
                                    {{ Str::limit($job->description, 100) }} <!-- Display a shortened description -->
                                </p>
                                <div class="flex space-x-4">
                                    @auth
                                        <a href="{{ route('apply') }}">
                                            <button
                                                class="bg-blue-500 text-white px-3 py-2 text-sm rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                Apply now
                                            </button>
                                        </a>
                                    @else
                                        <button class="bg-gray-300 text-gray-500 px-2 py-2 text-sm rounded-lg cursor-not-allowed">
                                            Apply (Login Required)
                                        </button>
                                    @endauth
                                    <button
                                    class="bg-gray-100 text-gray-600 px-3 py-2 text-sm rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                    <a href="{{ route('job.details', ['jobId' => $job->id]) }}">Learn more</a>
                                </button>

                                </div>
                            </div>
                        @endforeach
                    </div>




                    <!-- More cards can follow the same structure -->
                </div> --}}



                {{-- <div class="flex flex-wrap gap-6 justify-center sm:justify-start">
                    <!-- Job Card -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($jobs as $job)
                            <div
                                class="flex-none w-full sm:w-[260px] bg-white border border-gray-300 rounded-lg shadow-md p-6 hover:border-blue-500 dark:bg-gray-800">
                                <img src="{{ asset('images/microsoft_logo.svg') }}" alt="Company Logo" class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $job->title }}</h3>
                                <div class="flex items-center space-x-2 mt-2 mb-4">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-600 text-xs rounded-full">{{ $job->location }}</span>
                                    <span class="px-3 py-1 bg-red-100 text-red-600 text-xs rounded-full">{{ $job->levels }}</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-4 dark:text-white line-clamp-4">
                                    {{ Str::limit($job->description, 100) }} <!-- Display a shortened description -->
                                </p>
                                <div class="flex space-x-4">
                                    @auth
                                        <a href="{{ route('apply') }}">
                                            <button
                                                class="bg-blue-500 text-white px-3 py-2 text-sm rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                Apply now
                                            </button>
                                        </a>
                                    @else
                                        <button class="bg-gray-300 text-gray-500 px-2 py-2 text-sm rounded-lg cursor-not-allowed">
                                            Apply (Login Required)
                                        </button>
                                    @endauth
                                    <button
                                    class="bg-gray-100 text-gray-600 px-3 py-2 text-sm rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                    <a href="{{ route('job.details', ['jobId' => $job->id]) }}">Learn more</a>
                                </button>

                                </div>
                            </div>
                        @endforeach
                    </div>




                    <!-- More cards can follow the same structure -->
                </div> --}}

            </div>
        </div>



    </section>
@endsection
