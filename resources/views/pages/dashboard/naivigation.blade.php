<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div class="flex dark:bg-gray-800">

        <div class="py-6 w-[18%] h-screen border-r border-gray-400">
            <div class="flex flex-col ">

                <a href="{{ route('managejobs') }}" class="group block {{ request()->routeIs('managejobs') ? 'active' : '' }}">
                    <div class="flex items-center gap-x-2 py-3 px-3 duration-300 border-r-4 border-transparent group-hover:border-[#007AFF] group-hover:bg-[#e7e9ff] group-[.active]:border-[#007AFF] group-[.active]:bg-[#e7e9ff] dark:group-hover:bg-gray-700 dark:group-[.active]:bg-gray-700">
                        <img src="{{ asset('images/Vector.svg') }}" alt="">
                        <span class="dark:text-white">Manage Jobs</span>
                    </div>
                </a>



                <a href="{{ route('addjobs') }}" class="group block {{ request()->routeIs('addjobs') ? 'active' : '' }}">
                    <div class="flex items-center gap-x-2 py-3 px-3 duration-300 border-r-4 border-transparent group-hover:border-[#007AFF] group-hover:bg-[#e7e9ff] group-[.active]:border-[#007AFF] group-[.active]:bg-[#e7e9ff] dark:group-hover:bg-gray-700 dark:group-[.active]:bg-gray-700">
                        <img src="{{ asset('images/add_icon.svg') }}" alt="">
                        <span class="dark:text-white">Add Job</span>
                    </div>

                </a>



                <a href="{{ route('applications') }}"  class="group block {{ request()->routeIs('applications') ? 'active' : '' }}">
                    <div class="flex items-center gap-x-2 py-3 px-3 duration-300 border-r-4 border-transparent group-hover:border-[#007AFF] group-hover:bg-[#e7e9ff] group-[.active]:border-[#007AFF] group-[.active]:bg-[#e7e9ff] dark:group-hover:bg-gray-700 dark:group-[.active]:bg-gray-700">
                        <img src="{{ asset('images/patients_icon.svg') }}" alt="">
                        <span class="dark:text-white">View Applications</span>
                    </div>
                </a>





            </div>
        </div>


        @yield('content')

    </div>




</body>
</html>
