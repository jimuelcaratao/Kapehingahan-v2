<div x-data="{ open: false }" class="bg-white">
    <div>
        <!--
    Mobile filter dialog

    Off-canvas filters for mobile, show/hide based on off-canvas filters state.
  -->
        <div :class="{'block': open, 'hidden': ! open}" class="fixed inset-0 flex z-40 lg:hidden" role="dialog"
            aria-modal="true">
            <!--
                Off-canvas menu overlay, show/hide based on off-canvas menu state.

                Entering: "transition-opacity ease-linear duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                Leaving: "transition-opacity ease-linear duration-300"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
            <div @click="open = ! open" class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

            <div
                class="ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 pb-12 flex flex-col overflow-y-auto">
                <div class="px-4 flex items-center justify-between">
                    <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                    <button @click="open = ! open" type="button"
                        class="-mr-2 w-10 h-10 bg-white p-2 rounded-md flex items-center justify-center text-gray-400 ">
                        <span class="sr-only">Close menu</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Filters -->
                <form class="mt-4 border-t border-gray-200">
                    <h3 class="text-base font-bold ml-4 mt-4">Categories</h3>

                    <ul role="list" class="text-sm space-y-3 text-gray-900 px-2 py-3 ml-5">
                        {{ $categoryList }}
                    </ul>

                </form>
            </div>
        </div>



        {{-- MAINS --}}

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative z-10 flex items-baseline justify-between pt-24 pb-6 border-b border-gray-200">

                {{ $head }}

                <div class="flex items-center">
                    <div class="relative inline-block text-left">



                        {{-- <div>
                            <button @click="isOn = !isOn" type="button" aria-checked="isOn"
                                class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                id="menu-button" aria-expanded="false" aria-haspopup="true">
                                Sort
                                <!-- Heroicon name: solid/chevron-down -->
                                <svg class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div> --}}

                        <!--
                            Dropdown menu, show/hide based on menu state.
            
                            Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                            Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        {{-- <div x-data="{ isOn: false }" :class="{'block': isOn, 'hidden': ! isOn}"
                            class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class=" py-1" role="none">
                                <!--
                                    Active: "bg-gray-100", Not Active: ""
                
                                    Selected: "font-medium text-gray-900", Not Selected: "text-gray-500"
                                -->
                                <a href="#" class="font-medium text-gray-900 block px-4 py-2 text-sm"
                                    role="menuitem" tabindex="-1" id="menu-item-0">
                                    Most Popular
                                </a>

                                <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem"
                                    tabindex="-1" id="menu-item-1">
                                    Best Rating
                                </a>

                                <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem"
                                    tabindex="-1" id="menu-item-2">
                                    Newest
                                </a>

                                <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem"
                                    tabindex="-1" id="menu-item-3">
                                    Price: Low to High
                                </a>

                                <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem"
                                    tabindex="-1" id="menu-item-4">
                                    Price: High to Low
                                </a>
                            </div>
                        </div> --}}
                    </div>


                    <button @click="open = ! open" type="button"
                        class="p-2 -m-2 ml-4 sm:ml-6 text-gray-400 hover:text-gray-500 lg:hidden">
                        <span class="sr-only">Filters</span>
                        <!-- Heroicon name: solid/filter -->
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            <section aria-labelledby="products-heading" class="pt-6 pb-24">
                <h2 id="products-heading" class="sr-only">Products</h2>

                <div class="grid grid-cols-1 lg:grid-cols-4 gap-x-8 gap-y-10">
                    <!-- Filters -->
                    <form class="hidden lg:block">
                        {{-- <h3 class="sr-only">Categories</h3> --}}
                        <h3 class="-my-3 flow-root mb-4 ">
                            <!-- Expand/collapse section button -->
                            <button type="button"
                                class="py-3 bg-white w-full flex items-center justify-between text-base text-gray-400 hover:text-gray-500"
                                aria-controls="filter-section-0" aria-expanded="false">
                                <span class="font-medium text-gray-900">
                                    Categories
                                </span>
                            </button>
                        </h3>
                        <ul role="list" class="text-sm  text-gray-900 space-y-4 pb-6 border-b border-gray-200">
                            {{ $categoryList }}
                        </ul>



                    </form>

                    <!-- Product grid -->
                    <div class="lg:col-span-3">
                        <!-- Replace with your content -->
                        <div class=" border-gray-200 rounded-lg h-auto lg:h-full">
                            {{ $productGrid }}
                        </div>
                        <!-- /End replace -->
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
