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
                            <tr id="application-row-{{ $application->id }}" class="border-t border-gray-200" data-status="">
                                <!-- Record ID -->
                                <td class="py-4 px-4">{{ $loop->iteration }}</td>

                                <!-- Applicant Name -->
                                <td class="py-4 px-4">{{ $application->full_name }}</td>

                                <!-- Applicant Email -->
                                <td class="py-4 px-4">{{ $application->email }}</td>

                                <!-- Job Title -->
                                <td class="py-4 px-4">{{ $application->job ? $application->job->title : 'Job not found' }}
                                </td>

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
                                        class="status-dropdown border border-gray-400 rounded px-7 py-1"
                                        onchange="updateStatus({{ $application->id }})">
                                        <option value="" disabled selected>Select</option>
                                        <option value="accept">Accept</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    @endsection



    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Load saved statuses from localStorage and set the dropdown and row color
            const rows = document.querySelectorAll("tr[data-status]");
            rows.forEach((row) => {
                const id = row.id.replace("application-row-", "");
                const storedStatus = localStorage.getItem(`application-status-${id}`);

                if (storedStatus) {
                    // Set dropdown value
                    const dropdown = document.getElementById(`status_${id}`);
                    dropdown.value = storedStatus;

                    // Set row and dropdown background color
                    updateRowColor(row, dropdown, storedStatus);
                }
            });
        });

        // Update localStorage, row background, and dropdown color when the status changes
        function updateStatus(id) {
            const dropdown = document.getElementById(`status_${id}`);
            const status = dropdown.value;

            // Save status to localStorage
            localStorage.setItem(`application-status-${id}`, status);

            // Update row and dropdown background color
            const row = document.getElementById(`application-row-${id}`);
            updateRowColor(row, dropdown, status);
        }

        // Function to update row and dropdown background color based on status
        function updateRowColor(row, dropdown, status) {
            // Update row background color
            row.classList.remove("bg-green-200", "bg-red-200");
            if (status === "accept") {
                row.classList.add("bg-green-200");
            } else if (status === "reject") {
                row.classList.add("bg-red-200");
            }

            // Update dropdown background color
            dropdown.classList.remove("bg-green-200", "bg-red-200");
            if (status === "accept") {
                dropdown.classList.add("bg-green-200");
            } else if (status === "reject") {
                dropdown.classList.add("bg-red-200");
            }
        }
    </script>


</x-app-layout>
