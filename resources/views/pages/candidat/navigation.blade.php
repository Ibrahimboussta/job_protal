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

                <a href="{{ route('candidat.dashboard') }}"
                    class="group block {{ request()->routeIs('candidat.dashboard') ? 'active' : '' }}">
                    <div
                        class="flex items-center gap-x-2 py-3 px-3 duration-300 border-r-4 border-transparent group-hover:border-[#007AFF] group-hover:bg-[#e7e9ff] group-[.active]:border-[#007AFF] group-[.active]:bg-[#e7e9ff] dark:group-hover:bg-gray-700 dark:group-[.active]:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 dark:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span class="dark:text-white">Dashboard</span>
                    </div>
                </a>

                <a href="{{ route('candidat.myapplications') }}"
                    class="group block {{ request()->routeIs('candidat.myapplications') ? 'active' : '' }}">
                    <div
                        class="flex items-center gap-x-2 py-3 px-3 duration-300 border-r-4 border-transparent group-hover:border-[#007AFF] group-hover:bg-[#e7e9ff] group-[.active]:border-[#007AFF] group-[.active]:bg-[#e7e9ff] dark:group-hover:bg-gray-700 dark:group-[.active]:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 dark:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                        <span class="dark:text-white">My Applications</span>
                    </div>
                </a>





            </div>
        </div>


        @yield('content')

    </div>

</body>

</html>
