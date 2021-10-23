<x-app-layout>

    <div class="pt-8 pb-12 px-4 md:px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div>
                <h2 class="text-2xl md:text-4xl font-bold mb-12">Brands 🔥</h2>
            </div>

            {{-- Header --}}
            <div class="flex flex-row pb-4 md:pb-6 justify-between ">
                <div>
                    {{-- <h2 class="text-2xl md:text-4xl font-bold">Products 💼</h2> --}}

                    <input class="focus:ring-indigo-500 focus:border-indigo-500  sm:text-sm border-gray-300 rounded-md"
                        type="search" name="search" placeholder="Search.." aria-label="Search"
                        value="{{ request()->search }}">
                </div>

                <div>
                    {{-- <button data-bs-toggle="modal" data-bs-target="#add-modal" type="button"
                        class="inline-flex items-center px-4 py-1 mr-1 border border-transparent rounded-md shadow text-base font-medium text-white bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600">
                        <!-- Heroicon name: solid/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-black h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </button> --}}

                    <button data-bs-toggle="modal" data-bs-target="#add-modal" type="button"
                        class="inline-flex items-center px-4 py-1 border border-transparent rounded-md shadow text-base font-medium text-white bg-yellow-700 hover:bg-yellow-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-600">
                        <!-- Heroicon name: solid/plus -->
                        <svg class=" h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add product
                    </button>
                </div>

            </div>


            {{-- Table --}}
            <x-main-table>
                {{-- Col --}}
                <x-slot name="tableColumn">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product Code
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Brand
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Stocks
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </x-slot>
                {{-- Rows --}}
                <x-slot name="tableRow">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1619914775389-748e5e136c26?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=100&ixid=MnwxfDB8MXxyYW5kb218fHx8fHx8fHwxNjIwMTk4MjAw&ixlib=rb-1.2.1&q=80&utm_campaign=api-credit&utm_medium=referral&utm_source=unsplash_source&w=100"
                                        alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        HT-421312
                                    </div>

                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 font-bold">Cappucino</div>
                            <div class="text-xs text-gray-500">Light brown with litte...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Hot Coffee
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            KapeHingahan
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            5 Packs
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            $ @convert('123')
                        </td>
                        <td class="pl-2 pr-6 py-4 whitespace-nowrap text-right text-base font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3 text-decoration-none">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="#" class="text-red-600 hover:text-red-900">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </x-slot>
            </x-main-table>


        </div>
    </div>
</x-app-layout>
