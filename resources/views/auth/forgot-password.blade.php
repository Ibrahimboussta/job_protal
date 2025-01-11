<x-guest-layout>


    <!-- Session Status -->





    <div class="bg-gray-50 dark:bg-gray-800 h-screen">
        <div class="flex min-h-[80vh] flex-col justify-center py-12 sm:px-6 lg:px-8">
            <div class="text-center sm:mx-auto sm:w-full  ">
                <h1 class="text-md lg:text-3xl font-extrabold text-gray-900 dark:text-white px-5 lg:p-0">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </h1>
            </div>
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="bg-white dark:bg-gray-700 px-4 pb-4 pt-8 sm:rounded-lg sm:px-10 sm:pb-6 sm:shadow">
                    <form class="space-y-6" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <x-auth-session-status class="mb-4" :status="session('status')" />


                        <div>
                            <button data-testid="login" type="submit"
                                class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:bg-indigo-700 dark:border-transparent dark:hover:bg-indigo-600 dark:focus:ring-indigo-400 dark:focus:ring-offset-2 disabled:cursor-wait disabled:opacity-50">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">

                                </span>
                                {{ __('Email Password Reset Link') }}

                            </button>
                        </div>
                    </form>
                    <div class="mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="bg-white dark:bg-gray-700 px-2 text-gray-500 dark:text-white">
                                    <a class="font-semibold text-indigo-600 dark:text-indigo-100"
                                        href="/login">Login</a>

                                </span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
