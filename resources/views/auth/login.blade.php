<x-guest-layout>

    {{-- tailwind cdn --}}
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    {{-- tailwind script --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <style>
        /*remove custom style*/
        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;
        }

        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }


        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        @keyframes animate {

            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }

        }

    </style>

    <div class="relative min-h-screen flex ">
        <div
            class="flex flex-col sm:flex-row items-center md:items-start sm:justify-center md:justify-start flex-auto min-w-0 bg-white">
            <div class="sm:w-1/2 xl:w-3/5 h-full hidden md:flex flex-auto items-center justify-center p-10 overflow-hidden bg-red-900 text-white bg-no-repeat bg-cover relative"
                style="background-image: url(https://images.unsplash.com/photo-1513530176992-0cf39c4cbed4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80);">
                <div class="absolute bg-gradient-to-b from-[#4F3428] to-[#E7CC9A] opacity-75 inset-0 z-0"></div>
                <div class="w-full  max-w-md z-10">
                    <div class="sm:text-4xl xl:text-6xl font-bold leading-tight mb-6">KapeHingahan</div>
                    <div class="sm:text-sm xl:text-md text-gray-200 font-normal">KapeHingahan will start your day with a
                        cup of coffee. Serving high-quality espresso-based drinks as well as delectable meals.</div>
                </div>
                <!---remove custom style-->
                <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <div
                class="md:flex md:items-center md:justify-center sm:w-auto md:h-full w-full xl:w-2/5 p-8 md:p-10 lg:p-14 sm:rounded-lg md:rounded-none bg-white">
                <div class="max-w-md w-full space-y-8">
                    <x-jet-validation-errors class="mb-4" />
                    <div class="text-center">
                        <h2 class="mt-6 text-3xl font-bold text-gray-900">
                            Welcome Back!
                        </h2>
                        <p class="mt-2 text-sm text-gray-500">Please sign in to your account</p>
                    </div>
                    <div class="flex flex-row justify-center items-center space-x-3">
                        <a class="flex-grow oauth-container btn darken-4 bg-red-500 hover:bg-red-400 white-text hide-small rounded-full"
                            href="/signin-google" style="text-transform:none">
                            <div class="left">
                                {{ __('Sign in with Google') }}
                            </div>

                            <div class="right">
                                <img width="23px" class="ml-4 mt-2" alt="Google sign-in"
                                    src="{{ asset('img/google-logo.png') }}" />
                            </div>
                        </a>
                    </div>
                    <div class="flex items-center justify-center space-x-2">
                        <span class="h-px w-16 bg-gray-200"></span>
                        <span class="text-gray-300 font-normal">or continue with</span>
                        <span class="h-px w-16 bg-gray-200"></span>
                    </div>

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <div class="input-field">
                                <input id="email" type="email" class="validate" name="email" :value="old('email')"
                                    required autofocus>
                                <label for="email">Email</label>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="input-field">
                                <input id="password" type="password" class="validate" name="password"
                                    :value="old('password')" required autocomplete="current-password">
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                        </div>

                        <div class="flex items-center mt-6">
                            <x-jet-button class="flex-grow bg-yellow-700 hover:bg-yellow-800 ">
                                {{ __('Sign in') }}
                            </x-jet-button>
                        </div>
                    </form>

                    <p class="flex flex-col items-center justify-center mt-10 text-center text-md text-gray-500">
                        <span>Don't have an account?</span>
                        <a href="{{ route('register') }}"
                            class="text-[#7F4C1C] hover:text-[#E7CC9A] no-underline hover:underline cursor-pointer transition ease-in duration-300">Sign
                            up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- <x-slot name="title">
        Login |
    </x-slot>

    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="flex flex-row text-gray-400 text-base content-center  hide-small">
            <div class="mx-auto d-block mb-4">Enter your credentials to continue</div>
        </div>

        <div class="flex ">
            <a class="flex-grow oauth-container btn darken-4 bg-red-500 hover:bg-red-400 white-text hide-small"
                href="/signin-google" style="text-transform:none">
                <div class="left">
                    {{ __('Sign in with Google') }}
                </div>

                <div class="right">
                    <img width="23px" class="ml-4 mt-2" alt="Google sign-in"
                        src="{{ asset('img/google-logo.png') }}" />
                </div>
            </a>
        </div> --}}
    {{-- <div class="flex my-4">
            <a class="flex-grow oauth-container btn darken-4 bg-blue-500 hover:bg-blue-400 white-text"
                href="/signin-facebook" style="text-transform:none">
                <div class="left">
                    {{ __('Sign in with Facebook') }}
                </div>
                <div class="right">
                    <img width="23px" class="ml-4 mt-2" alt="facebook sign-in"
                        src="{{ asset('img/fb-logo.png') }}" />
                </div>
            </a>
        </div> --}}

    {{-- <p class="text-seperator  hide-small"><span>OR</span></p>



        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="flex flex-row text-gray-400 text-base content-center">
            <div class="mx-auto d-block mb-4">Enter with your email</div>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <div class="input-field">
                    <input id="email" type="email" class="validate" name="email" :value="old('email')" required
                        autofocus>
                    <label for="email">Email</label>
                </div>
            </div>

            <div class="mt-4">
                <div class="input-field">
                    <input id="password" type="password" class="validate" name="password" :value="old('password')"
                        required autocomplete="current-password">
                    <label for="password">Password</label>
                </div>
            </div>

            <div class="flex justify-between items-center mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

            </div>

            <div class="flex items-center mt-6">
                <x-jet-button class="flex-grow bg-yellow-700 hover:bg-yellow-800 ">
                    {{ __('Sign in') }}
                </x-jet-button>
            </div>
        </form>

        <div class="right mt-2">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                {{ __("Don't have a account? Sign up here.") }}
            </a>
        </div>

        <x-jet-validation-errors class="mb-4" />

    </x-jet-authentication-card> --}}




</x-guest-layout>
