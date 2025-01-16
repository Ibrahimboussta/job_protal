<x-app-layout>


    @extends('pages.dashboard.naivigation')
    @section('content')
        <div class="w-[80%] p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg dark:bg-gray-700">
                    <thead class="">
                        <tr>
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white dark:bg-gray-800">#</th>
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white dark:bg-gray-800">Job
                                Title</th>
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white dark:bg-gray-800">
                                Category</th>
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white dark:bg-gray-800">Level
                            </th>
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white dark:bg-gray-800">Date
                            </th>
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white dark:bg-gray-800">
                                Location</th>
                            {{-- <th class="py-3 px-4 text-left font-medium text-gray-600">Applicants</th> --}}
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white dark:bg-gray-800">
                                Visible</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        @foreach ($jobs as $job)
                            @if ($job->user_id == Auth::user()->id)
                                <tr class="border-t border-gray-200">
                                    <td class="py-4 px-4 text-sm dark:text-white dark:bg-gray-800">{{ $job->id }}</td>
                                    <td class="py-4 px-4 text-sm dark:text-white dark:bg-gray-800">{{ $job->title }}</td>
                                    <td class="py-4 px-4 text-sm dark:text-white dark:bg-gray-800">{{ $job->category }}</td>
                                    <td class="py-4 px-4 text-sm dark:text-white dark:bg-gray-800">{{ $job->levels }}</td>
                                    <td class="py-4 px-4 text-sm dark:text-white dark:bg-gray-800">{{ $job->created_at }}
                                    </td>
                                    <td class="py-4 px-4 text-sm dark:text-white dark:bg-gray-800">{{ $job->location }}</td>
                                    <td class="py-4 px-4 dark:text-white dark:bg-gray-800">
                                        <input type="checkbox" checked class="form-checkbox h-5 w-5 text-blue-500">
                                    </td>
                                </tr>
                            @endif
                        @endforeach


                    </tbody>
                </table>

                <!-- Add Job Button -->
                <div class="flex justify-end mt-6">
                    <a href="{{ route('addjobs') }}">

                        <button class="bg-black text-white py-3 px-8 rounded-md hover:bg-gray-800">
                            Add new job
                        </button>
                    </a>
                </div>
            </div>

        </div>
    @endsection



</x-app-layout>
