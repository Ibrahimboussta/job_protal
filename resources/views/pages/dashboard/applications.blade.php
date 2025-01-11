<x-app-layout>


    @extends('pages.dashboard.naivigation')
    @section('content')
        <div class="w-[80%] p-6">
            <div class="overflow-x-auto ">
                <table class="dark:bg-gray-800 min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white">#</th>
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white">Username</th>
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white">Email</th>
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white">Job Title</th>
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white">Location</th>
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white">Resume</th>
                            <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr class="border-t border-gray-200">
                                <!-- Record ID -->
                                <td class="py-4 px-4">{{ $loop->iteration }}</td>

                                <!-- Applicant Name -->
                                <td class="py-4 px-4">{{ $application->full_name }}</td>

                                <!-- Applicant Email -->
                                <td class="py-4 px-4">{{ $application->email }}</td>

                                <!-- Job Title -->
                                <td class="py-4 px-4">{{ $application->job ? $application->job->title : 'Job not found' }}</td>


                                <!-- Applicant City -->
                                <td class="py-4 px-4">{{ $application->city }}</td>

                                <!-- Resume Download -->
                                <td class="py-4 px-4">
                                    <a href="{{ asset('storage/' . $application->resume) }}"
                                        class="text-blue-500 hover:underline flex items-center gap-1" download>
                                        Resume <span class="text-blue-400">⬇️</span>
                                    </a>
                                </td>

                                <!-- Accept/Reject Dropdown -->
                                <td class="py-4 px-4">
                                    <select name="status_{{ $application->id }}" id="status_{{ $application->id }}"
                                        class="border border-gray-400 rounded">
                                        <option value="" disabled selected>Select</option>
                                        <option value="accept" class="text-green-500">Accept</option>
                                        <option value="reject" class="text-red-500">Reject</option>
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    @endsection



</x-app-layout>
