<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <!--Replace with your tailwind.css once created-->
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
        @media only screen and (max-width: 600px) {
            .sidebars {
                height: 60px;
            }
        }

    </style>
</head>

<body class="font-sans antialiased bg-gray-50">

    <!--Nav-->
    <nav class="bg-white  pt-2 md:pt-1 pb-1 px-1 mt-0 h-16 fixed w-full z-10 top-0 shadow-sm">

        <div class="flex flex-wrap ">

            <div class="flex pt-2 md:pt-3  mr-12 w-full justify-end">
                <div className="m4-3 relative">
                    @livewire('navigation-menu')
                </div>
            </div>
        </div>

    </nav>


    <div class="flex flex-col md:flex-row">
        <div
            class="bg-gray-800 shadow-xl h-auto md:min-h-screen fixed bottom-0  content-center  md:relative z-20 w-full md:w-48 sidebars">
            <div
                class="md:ml-7 md:mt-12 md:w-48 content-center fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">

                <!-- <a href="#" class="">
                    <span class="text-xl pl-2"><i class="em em-grinning"></i></span>
                </a> -->

                <ul
                    class="md:mt-12 list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2  text-center md:text-left">

                    <li
                        class="text-gray-500 uppercase text-xs font-semibold flex-1 mb-4 invisible md:visible pages-header">
                        <h6>Pages</h6>
                    </li>

                    <li class="mr-3 flex-1">

                        <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            <i class="fas fa-tasks pr-0 md:pr-3 md:mb-2"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Dashboard</span>
                        </x-jet-nav-link>

                    </li>

                    <li class="mr-3 flex-1">
                        <x-jet-nav-link href="{{ route('products') }}" :active="request()->routeIs('products')">
                            <i class="fas fa-tasks pr-0 md:pr-3 md:mb-2"></i><span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Products</span>
                        </x-jet-nav-link>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Page Content -->
        <div class="main-content flex-1 mt-12 md:mt-2 pb-24 md:pb-5 pt-12 md:pt-20">
            {{ $slot }}

        </div>
    </div>


    @stack('modals')

    @livewireScripts
</body>

</html>
