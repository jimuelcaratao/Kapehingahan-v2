<x-admin-layout>
    @slot('header')
        Users
    @endslot
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">

                {{-- Header --}}
                <div class="flex flex-row pb-4 md:pb-6 justify-between ">
                    <div>
                        {{-- search --}}
                        <form class="flex">
                            <div>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-20  sm:text-sm border-gray-300 rounded-md"
                                        type="search" name="search" placeholder="Search.." aria-label="Search"
                                        value="{{ request()->search }}">
                                    <div class="absolute inset-y-0 left-0 flex items-center">
                                        <label for="search_col" class="sr-only">Currency</label>
                                        <select id="search_col" name="search_col"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                            @if (!empty(request()->search_col))
                                                <option class="bg-gray-200" disabled
                                                    selected="{{ request()->search_col }}">
                                                    {{ request()->search_col }}
                                                </option>
                                            @endif
                                            <option value="Name">Name</option>
                                            <option value="Email">Email</option>
                                            {{-- <option>Type</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="text-secondary mx-2">
                                <i class="fas fa-search"></i>
                            </button>

                            @if (!empty(request()->search))
                                <a href="{{ route('users') }}" class="mt-2 text-danger">
                                    <i class="fas fa-times-circle"></i>
                                </a>
                            @endif
                        </form>
                    </div>

                    {{-- <div>
                        <button data-bs-toggle="modal" data-bs-target="#add-modal" type="button"
                            class="inline-flex items-center px-4 py-1 border border-transparent rounded-md shadow text-sm font-medium text-white">
                            Add Users
                        </button>
                    </div> --}}

                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            TYPE</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Full name </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Social Media</th>

                                        {{-- <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th> --}}

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Banned Date</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Date Created</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($users as $user)
                                        <tr>

                                            <td>
                                                <div class="align-middle text-center d-flex px-2 ">
                                                    @if ($user->is_admin == 1)
                                                        <span class="badge badge-sm bg-gradient-success">
                                                            Admin
                                                        </span>
                                                    @elseif($user->is_admin == 2)
                                                        <span class="badge badge-sm bg-gradient-info">
                                                            Staff
                                                        </span>
                                                    @else
                                                        <span class="badge badge-sm bg-gradient-secondary">
                                                            Customer
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>

                                            <td>
                                                <div class=" d-flex px-2 ">
                                                    <h6 class="mb-0 text-sm pl-2">{{ $user->name }}</h6>
                                                </div>
                                            </td>


                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $user->email }}</p>
                                            </td>


                                            <td class="align-middle text-center text-sm">
                                                @if ($user->external_provider == 'Facebook')
                                                    <span class="badge badge-sm bg-gradient-info">
                                                        {{ $user->external_provider }}
                                                    </span>
                                                @elseif ($user->external_provider == 'Google')
                                                    <span class="badge badge-sm bg-gradient-danger">
                                                        {{ $user->external_provider }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-secondary">
                                                        None
                                                    </span>
                                                @endif
                                            </td>

                                            {{-- <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">Active</span>
                                            </td> --}}

                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $user->is_banned }}</span>
                                            </td>


                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($user->created_at)->format('d / F / Y') }}</span>
                                            </td>



                                            <td
                                                class="align-middle  whitespace-nowrap  text-right text-xxs font-medium">
                                                @if ($user->is_admin == false)
                                                    @if ($user->is_banned != null)
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#confirm-modal"
                                                            data-item-id="{{ $user->id }}" id=""
                                                            class="confirm-password text-red-600 no-underline hover:text-red-900 mr-5">Unbanned</a>
                                                    @endif

                                                    @empty($user->is_banned)
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#confirm-modal"
                                                            data-item-id="{{ $user->id }}" id=""
                                                            class="confirm-password text-red-600 no-underline hover:text-red-900 mr-5">Ban</a>
                                                    @endempty
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8"
                                                class="pr-4 py-2 whitespace-nowrap text-sm font-medium text-center">
                                                <img class="mx-auto d-block text-center py-4" style="width: 275px"
                                                    src="{{ asset('images/components/no-products.svg') }}"
                                                    alt="no products">
                                                Hmmm.. There is no users in here yet.
                                            </td>
                                        </tr>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
    </div>

    <x-user.confirm-password-modal>
    </x-user.confirm-password-modal>
</x-admin-layout>
