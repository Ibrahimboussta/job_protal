<x-app-layout>
    @extends('pages.candidat.navigation')
    @section('content')
    <div class="w-[80%] p-6">
        <div class="overflow-x-auto ">
            <table class="dark:bg-gray-800 min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white">Username</th>
                        <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white">Job Title</th>
                        <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white">Location</th>
                        <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white">Resume</th>
                        <th class="py-3 px-4 text-left font-medium text-gray-600 dark:text-white">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                        <!-- Applicant Name -->
                            <td class="py-4 px-4 dark:text-white">{{ $application->full_name }}</td>

                            <!-- Job Title -->
                            <td class="py-4 px-4 dark:text-white">
                                {{ $application->job ? $application->job->title : 'Job not found' }}
                            </td>

                            <!-- Applicant City -->
                            <td class="py-4 px-4 dark:text-white">{{ $application->city }}</td>

                            <!-- Resume Download -->
                            <td class="py-4 px-4">
                                <a href="{{ asset('storage/' . $application->resume) }}"
                                   class="text-blue-500 hover:underline flex items-center gap-1" download>
                                    Resume <span class="text-blue-400 text-lg">⬇️</span>
                                </a>
                            </td>

                            <!-- Status -->
                            <td class="py-4 px-4 dark:text-white">
                                @if ($application->status === 'accept')
                                    <span class="text-green-500 font-bold">Accepted</span>
                                @elseif ($application->status === 'reject')
                                    <span class="text-red-500 font-bold">Rejected</span>
                                @else
                                    <span class="text-gray-500">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>


    @endsection







</x-app-layout>
