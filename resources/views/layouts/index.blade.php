<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>



    <header class="bg-white dark:bg-gray-800 px-6 sm:px-16 py-5">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="font-semibold text-xl sm:text-2xl dark:text-white">
                Job <span class="text-indigo-600">Portal</span>
            </a>

            <!-- Desktop Menu -->
            @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>
                                    @if (Auth::user()->profile_image)
                                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                                            alt="Profile Image" class="w-8 h-8 object-cover rounded-full">
                                    @else
                                        <img src="{{ asset('storage/default-avatar.png') }}" alt="Default Profile Image"
                                            class="w-8 h-8 object-cover rounded-full">
                                    @endif
                                </div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

            @endauth



            @guest

                <nav class="hidden md:flex items-center ">
                    <a href="{{ route('register') }}" class="font-normal rounded-full text-black px-1 flex items-center">Register
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>
                    </a>

                </nav>

                <!-- Mobile Menu Button -->
                <button id="menu-button" class="md:hidden flex items-center text-gray-800 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            @endguest
        </div>
    </header>

    <!-- Background Blur -->
    <div id="backdrop" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 backdrop-blur-sm z-40"></div>

    <!-- Sliding Popup Menu -->
    <div id="popup-menu"
        class="fixed bottom-0 left-0 w-full max-w-md bg-white rounded-t-lg shadow-lg transform translate-y-full transition-transform duration-300 ease-in-out z-50">
        <div class="flex justify-between items-center p-4 relative">
            <button id="close-button" class="text-gray-600 absolute right-4 top-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="p-4 flex flex-col items-center">
            <a href="{{ route('register') }}" class="font-normal rounded-full text-black px-1 flex items-center">Register
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>
            </a>


        </div>
    </div>

    <div class="bg-white dark:bg-gray-800">

        @yield('content')
    </div>




    <footer class="bg-white dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center px-6 sm:px-16 py-10">

            <!-- Left Section -->
            <div class="flex flex-wrap gap-3 items-center text-center sm:text-left">
                <a href="#" class="font-semibold text-xl dark:text-white">
                    Job <span class="text-indigo-600">Portal</span>
                </a>
                <div class="dark:text-white">|</div>
                <span class="font-normal text-sm dark:text-white">
                    All rights reserved. Copyright 2024 @JobPortal
                </span>
            </div>

            <!-- Right Section -->
            <div class="flex gap-3 items-center justify-center mt-4 sm:mt-0">
                <img class="w-7 h-7 dark:bg-white rounded-full" src="{{ asset('images/facebook_icon.svg') }}"
                    alt="Facebook Icon">
                <img class="w-7 h-7 dark:bg-white rounded-full" src="{{ asset('images/instagram_icon.svg') }}"
                    alt="Instagram Icon">
                <img class="w-7 h-7 dark:bg-white rounded-full" src="{{ asset('images/twitter_icon.svg') }}"
                    alt="Twitter Icon">
            </div>
        </div>
    </footer>





    <script>
        const menuButton = document.getElementById('menu-button');
        const closeButton = document.getElementById('close-button');
        const popupMenu = document.getElementById('popup-menu');
        const backdrop = document.getElementById('backdrop');

        // Open Menu
        menuButton.addEventListener('click', () => {
            popupMenu.classList.remove('translate-y-full');
            popupMenu.classList.add('translate-y-0');
            backdrop.classList.remove('hidden');
            backdrop.classList.add('block');
        });

        // Close Menu
        closeButton.addEventListener('click', () => {
            popupMenu.classList.remove('translate-y-0');
            popupMenu.classList.add('translate-y-full');
            backdrop.classList.remove('block');
            backdrop.classList.add('hidden');
        });

        // Close Menu When Clicking on Backdrop
        backdrop.addEventListener('click', () => {
            popupMenu.classList.remove('translate-y-0');
            popupMenu.classList.add('translate-y-full');
            backdrop.classList.remove('block');
            backdrop.classList.add('hidden');
        });
    </script>
</body>

</html>
