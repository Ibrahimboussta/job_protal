@extends('layouts.index')
@section('content')
    <section class="bg-white dark:bg-gray-800 px-16 pt-8">

        <div
            class="flex flex-col sm:flex-row items-center justify-between p-8 border border-blue-500 bg-[#F2F7FF] rounded-md">
            <div class="flex items-center gap-x-9 py-8 ">

                <div class="border border-gray-300 py-8 px-3 bg-white shadow">
                    <img class="w-40" src="{{ asset('images/microsoft_logo.svg') }}" alt="">
                </div>

                <div class="flex flex-col gap-y-4">
                    <h1 class="text-3xl font-semibold">{{ $job->title }}</h1> <!-- Job title -->
                    <div class="flex items-center gap-x-6">
                        <div class="flex items-center gap-1">
                            <img src="{{ asset('images/suitcase_icon.svg') }}" alt="Company icon">
                            <span>{{ $job->company_name }}</span> <!-- Dynamic company name -->
                        </div>

                        <div class="flex items-center gap-1">
                            <img src="{{ asset('images/location_icon.svg') }}" alt="Location icon">
                            <span>{{ $job->location }}</span> <!-- Dynamic location -->
                        </div>

                        <div class="flex items-center gap-1">
                            <img src="{{ asset('images/person_icon.svg') }}" alt="Job level icon">
                            <span>{{ $job->levels }}</span> <!-- Dynamic job level -->
                        </div>

                        <div class="flex items-center gap-1">
                            <img src="{{ asset('images/money_icon.svg') }}" alt="Salary icon">
                            <span>CTC: ${{ number_format($job->salary, 0) }}</span> <!-- Dynamic salary -->
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
                </div> <span class="text-sm ">{{ $job->created_at->diffForHumans() }} </span>
            </div>
        </div>
    </section>



    <section class="px-4 sm:px-16 pt-12">

        <div class="flex gap-x-16">
            <!-- Main Job Description Card -->
            <div class="flex-1">
                <h1 class="text-2xl font-semibold mb-4">Job description</h1>
                <p class="text-gray-700 mb-8 text-sm">
                    We are seeking a highly skilled Full Stack Developer to join our dynamic and innovative team. The ideal
                    candidate will
                    have a passion for developing scalable web applications and working across the entire technology stack,
                    from front-end user
                    interfaces to back-end database and server management.
                </p>
                <p class="text-gray-700 mb-8">
                    You will collaborate with cross-functional teams to design, develop, and implement new features,
                    ensuring high performance,
                    responsiveness, and security of the application. If you thrive in fast-paced environments, are
                    detail-oriented, and love to
                    solve complex technical challenges, we'd love to meet you!
                </p>

                <h2 class="text-xl font-semibold mb-3">Key responsibilities</h2>
                <ul class="list-decimal list-inside text-gray-700 space-y-2 mb-6 text-sm">
                    <li>Build, test, and deploy highly responsive web applications using modern front-end and back-end
                        technologies.</li>
                    <li>Design and implement user-friendly interfaces using HTML, CSS, JavaScript (React, Angular, or
                        Vue.js).</li>
                    <li>Develop and maintain APIs, server-side logic, and databases using technologies such as Node.js,
                        Ruby, or Java.</li>
                    <li>Design and maintain databases (SQL, NoSQL) for efficiency and reliability.</li>
                    <li>Write automated tests to ensure the quality of the application (unit, integration, and end-to-end
                        testing).</li>
                    <li>Work closely with designers, product managers, and engineers to understand requirements and
                        implement features.</li>
                </ul>

                <h2 class="text-xl font-semibold mb-3">Skills required</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-2 text-sm">
                    <li>Knowledge of HTML, CSS, and JavaScript, plus experience with frameworks like React, Angular, or
                        Vue.js.</li>
                    <li>Experience working with server-side languages such as Node.js, Python, Ruby, or Java.</li>
                    <li>Familiarity with both relational databases (e.g., MySQL, PostgreSQL) and non-relational databases
                        (e.g., MongoDB).</li>
                    <li>Experience using Git for tracking changes and collaborating on code.</li>
                    <li>Good communication and collaboration skills, able to work effectively with others.</li>
                </ul>

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
                                <img src="{{ asset('images/microsoft_logo.svg') }}" alt="Company Logo" class="mb-4">
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
