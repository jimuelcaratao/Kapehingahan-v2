<x-admin-layout>
    @slot('header')
        Brands
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
                                        class="focus:ring-indigo-500 focus:border-indigo-500 w-full sm:text-sm border-gray-300 rounded-md"
                                        type="search" name="search" placeholder="Search.." aria-label="Search"
                                        value="{{ request()->search }}">
                                </div>
                            </div>
                            <button type="submit" class="text-secondary mx-2">
                                <i class="fas fa-search"></i>
                            </button>

                            @if (!empty(request()->search))
                                <a href="{{ route('brands') }}" class="mt-2 text-danger">
                                    <i class="fas fa-times-circle"></i>
                                </a>
                            @endif
                        </form>
                    </div>

                    <div>

                        <button data-bs-toggle="modal" data-bs-target="#add-modal" type="button"
                            class="inline-flex items-center px-4 py-1 border border-transparent rounded-md shadow text-sm font-medium text-white">
                            <!-- Heroicon name: solid/plus -->
                            {{-- <svg class=" h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg> --}}
                            Add Brand
                        </button>
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
                                            Brand ID</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Brand Name </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Date Created</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($brands as $brand)
                                        <tr>
                                            <td>
                                                <div class="align-middle text-center d-flex px-2 ">
                                                    <h6 class="mb-0 text-sm pl-2">{{ $brand->brand_id }}</h6>
                                                </div>
                                            </td>


                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $brand->brand_name }}</p>
                                            </td>

                                            @if ($brand->status == 'Available')
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $brand->status }}</span>
                                                </td>
                                            @else
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-danger">{{ $brand->status }}</span>
                                                </td>
                                            @endif


                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $brand->created_at }}</span>
                                            </td>



                                            <td
                                                class="align-middle  whitespace-nowrap flex text-right text-base font-medium">
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
                                                    action="{{ route('brands.destroy', [$brand->brand_id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8"
                                                class="pr-4 py-8 whitespace-nowrap text-sm font-medium text-center">
                                                <img class="mx-auto d-block text-center py-4" style="width: 275px"
                                                    src="{{ asset('img/admin/no-products.svg') }}" alt="no brands">
                                                Hmmm.. There is no Brands in here.
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
                    {{ $brands->render('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <x-brand.add-modal>
    </x-brand.add-modal>
    <x-brand.edit-modal>
    </x-brand.edit-modal>

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
</x-admin-layout>
