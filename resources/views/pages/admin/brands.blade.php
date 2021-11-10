<x-app-layout>

    <div class="pt-8 pb-12 px-4 md:px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div>
                <h2 class="text-2xl md:text-4xl font-bold mb-12">Brands 🔥</h2>
            </div>

            {{-- Header --}}
            <div class="flex flex-row pb-4 md:pb-6 justify-between ">
                <div>
                    <form>
                        <input
                            class="focus:ring-indigo-500 focus:border-indigo-500  sm:text-sm border-gray-300 rounded-md"
                            type="search" name="search" placeholder="Brand name" aria-label="Search"
                            value="{{ request()->search }}">

                        <button type="submit" class="text-gray-600 hover:text-gray-800 mx-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>

                <div>

                    <button data-bs-toggle="modal" data-bs-target="#add-modal" type="button"
                        class="inline-flex items-center px-4 py-1 border border-transparent rounded-md shadow text-base font-medium text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600">
                        <!-- Heroicon name: solid/plus -->
                        <svg class=" h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Brand
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
                            Brand ID
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Brand Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date Created
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </x-slot>
                {{-- Rows --}}
                <x-slot name="tableRow">
                    @forelse ($brands as $brand)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $brand->brand_id }}
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 font-bold">{{ $brand->brand_name }}</div>
                            </td>

                            @if ($brand->status == 'Available')
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $brand->status }}
                                    </span>
                                </td>
                            @else
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        {{ $brand->status }}
                                    </span>
                                </td>
                            @endif

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $brand->created_at }}
                            </td>

                            <td class="pl-2 pr-6 py-4 whitespace-nowrap flex text-right text-base font-medium">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit-modal-brand"
                                    data-tooltip="tooltip" data-placement="top" title="Edit"
                                    data-community="{{ json_encode($brand) }}"
                                    data-item-status="{{ $brand->status }}"
                                    data-item-brand_name="{{ $brand->brand_name }}"
                                    data-item-brand_id="{{ $brand->brand_id }}" id="edit-item-brand"
                                    class="text-indigo-600 hover:text-indigo-900 mr-3 text-decoration-none">
                                    <i class="far fa-edit"></i>
                                </a>
                                <form class="delete-brand"
                                    action="{{ route('brands.destroy', [$brand->brand_id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="8" class="pr-4 py-8 whitespace-nowrap text-sm font-medium text-center">
                                <img class="mx-auto d-block text-center py-4" style="width: 275px"
                                    src="{{ asset('img/admin/no-products.svg') }}" alt="no brands">
                                Hmmm.. There is no Brands in here.
                            </td>
                        </tr>
                    @endforelse
                </x-slot>
            </x-main-table>

            <x-brand.add-modal>
            </x-brand.add-modal>
            <x-brand.edit-modal>
            </x-brand.edit-modal>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-center">
            {{-- pagination --}}
            <div class="pagination">
                {{ $brands->render('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    @push('scripts')

        <script>
            //delete
            $(".delete-brand").click(function(e) {
                e.preventDefault();
                swal({
                        title: "Are you sure to Delete?",
                        text: "Once you Deleted, theres no turning back!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $(e.target)
                                .closest("form")
                                .submit(); // Post the surrounding form
                        } else {
                            return false;
                        }
                    });
            });
        </script>

    @endpush
</x-app-layout>
