@extends('layouts.index')
@section('content')
    <section class="bg-white dark:bg-gray-800 px-16 pt-8">

        <!-- component -->
            <div class="">

                    <div class=" rounded shadow-lg p-4 md:p-8">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Personal Details</p>
                                <p>Please fill out all the fields.</p>
                            </div>

                            <div class="lg:col-span-2">
                                <form method="POST" action="{{ route('apply.store', ['jobId' => $job->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">

                                        <!-- Full Name -->
                                        <div class="md:col-span-5">
                                            <label for="full_name" class="block text-gray-700 font-medium">Full Name</label>
                                            <input type="text" name="full_name" id="full_name" required
                                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                                                placeholder="John Doe" />
                                        </div>

                                        <!-- Email Address -->
                                        <div class="md:col-span-5">
                                            <label for="email" class="block text-gray-700 font-medium">Email Address</label>
                                            <input type="email" name="email" id="email" required
                                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                                                placeholder="email@domain.com" />
                                        </div>

                                        <!-- Address -->
                                        <div class="md:col-span-5">
                                            <label for="address" class="block text-gray-700 font-medium">Address</label>
                                            <input type="text" name="address" id="address" required
                                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                                                placeholder="Enter your address" />
                                        </div>

                                        <!-- City -->
                                        <div class="md:col-span-3">
                                            <label for="city" class="block text-gray-700 font-medium">City</label>
                                            <input type="text" name="city" id="city" required
                                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                                                placeholder="Enter your city" />
                                        </div>

                                        <!-- Job Selection -->
                                        <div class="md:col-span-2">
                                            <label class="block text-gray-700 font-medium">Applying for:</label>
                                            <input type="text" value="{{ $job->title }}" disabled
                                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 focus:ring-2 focus:ring-blue-300 focus:outline-none"
                                                placeholder="Job Title" />
                                        </div>

                                        <input type="hidden" name="job_id" value="{{ $job->id }}">

                                        <!-- Resume Upload -->
                                        <div class="md:col-span-5">
                                            <label for="resume" class="block text-gray-700 font-medium">Upload Resume</label>
                                            <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                                                <input type="file" name="resume" id="resume" required
                                                    class="px-4 appearance-none outline-none text-gray-800 w-full bg-transparent"
                                                    accept=".pdf,.doc,.docx" />
                                            </div>
                                            <p class="text-sm text-gray-500 mt-1">Accepted formats: PDF, DOC, DOCX (Max: 2MB)</p>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="md:col-span-5 text-right mt-4">
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300 ease-in-out">
                                                Submit Application
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
            </div>
    </section>
@endsection
