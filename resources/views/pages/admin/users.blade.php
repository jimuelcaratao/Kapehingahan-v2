<x-app-layout>

    <div class="pt-8 pb-12 px-4 md:px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div>
                <h2 class="text-2xl md:text-4xl font-bold mb-12">Users 🔥</h2>
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
                </div>

            </div>


            {{-- Table --}}
            <x-main-table>
                {{-- Col --}}

                <x-slot name="tableColumn">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            TYPE
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Full name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Social Media
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Banned Date
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date Created
                        </th>
                        <th scope="col-2"
                            class="flex flex-row px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                            <svg id="info" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Please configure your password first. Ignore this if you're finish."
                                xmlns="http://www.w3.org/2000/svg" class="cursor-pointer ml-3 h-4 w-4" fill="none"
                                viewBox="0 0 24  24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </th>
                    </tr>
                </x-slot>

                <x-slot name="tableRow">
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-6 py-2 whitespace-nowrap">
                                @if ($user->is_admin == 1)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Admin
                                    </span>
                                @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Normal
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->name }}</div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                @if ($user->external_provider == 'Facebook')
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $user->external_provider }}
                                    </span>
                                @elseif ($user->external_provider == 'Google')
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        {{ $user->external_provider }}
                                    </span>
                                @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        None
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Active</div>
                            </td>



                            @if (empty($user->is_banned))
                                <td class="px-6 py-2 py-4 whitespace-nowrap">
                                    <div
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Not Banned</div>
                                </td>
                            @else
                                <td class="px-6 py-2 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $user->is_banned }}</div>
                                </td>
                            @endif


                            <td class="px-6 py-2 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ \Carbon\Carbon::parse($user->created_at)->format('d / F / Y') }}</div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="flex items-center">

                                    {{-- <div class="flex-shrink-0">
                                        <a 
                                        href="#"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#edit-modal-user"
                                        data-community="{{ json_encode($user) }}"
                                        data-item-id="{{ $user->id }}"
                                        data-item-name="{{ $user->name }}"
                                        data-item-email="{{ $user->email }}"
                                        id="edit-item-user"
                                        class="text-indigo-600 no-underline hover:text-indigo-900 mr-5">View</a>
                                    </div> --}}

                                    {{-- banned --}}
                                    <div class="ml-4">
                                        <div class="text-sm py-4 font-medium text-gray-900">

                                            @if ($user->is_admin == false)
                                                @if ($user->is_banned != null)
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#confirm-modal"
                                                        data-item-id="{{ $user->id }}" id=""
                                                        class="confirm-password text-red-600 no-underline hover:text-red-900 mr-5">Unbanned</a>
                                                @endif

                                                @empty($user->is_banned)
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#confirm-modal"
                                                        data-item-id="{{ $user->id }}" id=""
                                                        class="confirm-password text-red-600 no-underline hover:text-red-900 mr-5">Ban</a>
                                                @endempty
                                            @endif


                                        </div>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="pr-4 py-2 whitespace-nowrap text-sm font-medium text-center">
                                <img class="mx-auto d-block text-center py-4" style="width: 275px"
                                    src="{{ asset('images/components/no-products.svg') }}" alt="no products">
                                Hmmm.. There is no users in here yet.
                            </td>
                        </tr>
                    @endforelse


                </x-slot>
            </x-main-table>


        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-center">
            {{-- pagination --}}
            <div class="pagination">
                {{ $users->render('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</x-app-layout>
