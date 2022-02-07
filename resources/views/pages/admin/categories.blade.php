<x-admin-layout>
    @slot('header')
        Categories
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
                        </form>
                    </div>

                    <div>

                        <button data-bs-toggle="modal" data-bs-target="#add-modal" type="button"
                            class="inline-flex items-center px-4 py-1 border border-transparent rounded-md shadow text-base font-medium text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-600">
                            <!-- Heroicon name: solid/plus -->
                            {{-- <svg class=" h-5 w-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg> --}}
                            Add Category
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
                                            Category ID</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Category Name </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Date Created</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>
                                                <div class="align-middle text-center d-flex px-2 ">
                                                    <h6 class="mb-0 text-sm pl-2">{{ $category->category_id }}</h6>
                                                </div>
                                            </td>


                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $category->category_name }}</p>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $category->created_at }}</span>
                                            </td>



                                            <td class="align-middle  whitespace-nowrap flex text-right font-medium">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit-modal-category"
                                                    data-tooltip="tooltip" data-placement="top" title="Edit"
                                                    data-community="{{ json_encode($category) }}"
                                                    data-item-category_name="{{ $category->category_name }}"
                                                    data-item-category_id="{{ $category->category_id }}"
                                                    id="edit-item-category"
                                                    class="text-indigo-600 hover:text-indigo-900 mr-3 text-decoration-none">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <form class="delete-category"
                                                    action="{{ route('categories.destroy', [$category->category_id]) }}"
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
                                                    src="{{ asset('img/admin/no-products.svg') }}"
                                                    alt="no categories">
                                                Hmmm.. There is no Categories in here.
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
                    {{ $categories->render('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>



    </div>
    <x-category.add-modal>
    </x-category.add-modal>
    <x-category.edit-modal>
    </x-category.edit-modal>


    @push('scripts')

        <script>
            //delete
            $(".delete-category").click(function(e) {
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


            // if category not null
            $('#category_name').on('input', function(e) {
                $('#submit_category').removeAttr('disabled');
            });
        </script>

    @endpush

</x-admin-layout>
