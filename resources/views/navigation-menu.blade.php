<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 main-nav">

    <!-- Side Navigation Menu -->
    <div id="mySidenav" class="sidenav bg-gray-700">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <h6 class="ml-6 text-gray-500 uppercase text-xs font-semibold flex-1 mb-4  pages-header">
            Pages
        </h6>

        <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <i class="fas fa-tachometer-alt pr-0 md:pr-3 "></i>
            <span class="pb-1 md:pb-0 text-xs md:text-base  inline-block">Dashboard</span>
        </x-jet-nav-link>

        <x-jet-nav-link href="{{ route('orders') }}" :active="request()->routeIs('orders')">
            <i class="fas fa-th-list pr-0 md:pr-3 "></i>
            <span class="pb-1 md:pb-0 text-xs md:text-base   inline-block">Orders</span>
        </x-jet-nav-link>

        <x-jet-nav-link href="{{ route('products') }}" :active="request()->routeIs('products')">
            <i class="fas fa-boxes pr-0 md:pr-3 "></i>
            <span class="pb-1 md:pb-0 text-xs md:text-base   inline-block">Products</span>
        </x-jet-nav-link>

        <x-jet-nav-link href="{{ route('categories') }}" :active="request()->routeIs('categories')">
            <i class="fas fa-tasks pr-0 md:pr-3 "></i>
            <span class="pb-1 md:pb-0 text-xs md:text-base   inline-block">Categories</span>
        </x-jet-nav-link>

        <x-jet-nav-link href="{{ route('brands') }}" :active="request()->routeIs('brands')">
            <i class="fas fa-coffee pr-0 md:pr-3 "></i>
            <span class="pb-1 md:pb-0 text-xs md:text-base   inline-block">Brands</span>
        </x-jet-nav-link>

        <x-jet-nav-link href="{{ route('analysis') }}" :active="request()->routeIs('analysis')">
            <i class="fas fa-chart-line pr-0 md:pr-3 "></i>
            <span class="pb-1 md:pb-0 text-xs md:text-base   md:inline-block">Analysis</span>
        </x-jet-nav-link>

        <x-jet-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
            <i class="fas fa-users pr-0 md:pr-3 "></i>
            <span class="pb-1 md:pb-0 text-xs md:text-base   md:inline-block">Users</span>
        </x-jet-nav-link>
    </div>

    <!-- Primary Navigation Menu -->
    <div class="max-w mx-auto px-4 md:px-12">

        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <span id="sideNavBurger" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                </div>
            </div>

            <div class=" sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link class="text-decoration-none hover:text-gray-900"
                                href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link class="text-decoration-none hover:text-gray-900"
                                    href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>
        </div>
    </div>

</nav>
