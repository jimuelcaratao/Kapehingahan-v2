<x-rider-layout>
    @slot('header')
        Rider
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



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</x-rider-layout>
