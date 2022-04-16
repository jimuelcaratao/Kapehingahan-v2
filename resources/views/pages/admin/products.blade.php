<x-admin-layout>
    @slot('header')
        Products
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
                                        class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-36  sm:text-sm border-gray-300 rounded-md"
                                        type="search" name="search" placeholder="Order no." aria-label="Search"
                                        value="{{ request()->search }}">
                                    <div class="absolute inset-y-0 left-0 flex items-center">
                                        <label for="search_col" class="sr-only">Search..</label>
                                        <select id="search_col" name="search_col"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-12 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                            @if (!empty(request()->search_col))
                                                <option class="bg-gray-200" disabled
                                                    selected="{{ request()->search_col }}">
                                                    {{ request()->search_col }}
                                                </option>
                                            @endif
                                            <option class="text-xs py-2 font-bold uppercase" disabled>
                                                Category</option>
                                            <option value="">
                                                All</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->category_name }}">
                                                    {{ $category->category_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="text-secondary mx-2">
                                <i class="fas fa-search"></i>
                            </button>

                            @if (!empty(request()->search))
                                <a href="{{ route('orders') }}" class="mt-2 text-danger">
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
                            Add Product
                        </button>
                    </div>

                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 pt-3">
                        <h6>Products <span class="text-secondary ml-2">{{ @count($tableProducts) }}</span></h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Product Code</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Product Name</th>

                                        {{-- <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th> --}}

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Stocks</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Category</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Brand</th>


                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Price</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($products as $product)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('storage/media/products/main_' . $product->product_code . '_' . $product->default_photo) }}"
                                                            alt="{{ $product->default_photo }}"
                                                            class="avatar avatar-sm me-3">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $product->product_code }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $product->product_name }}
                                                </p>
                                                <p class="text-xs text-secondary mb-0">
                                                    {{ \Illuminate\Support\Str::limit($product->description, 70) }}
                                                </p>
                                            </td>
                                            {{-- @if ($product->status == 'Available')
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $product->status }}</span>
                                                </td>
                                            @else
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-danger">{{ $product->status }}</span>
                                                </td>
                                            @endif --}}

                                            @if ($product->status != null)
                                                @if ($product->status == 'Available')
                                                    <td class="align-middle text-center text-sm">
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">{{ $product->status }}</span>
                                                    </td>
                                                @else
                                                    <td class="align-middle text-center text-sm">
                                                        <span
                                                            class="badge badge-sm bg-gradient-danger">{{ $product->status }}</span>
                                                    </td>
                                                @endif
                                            @else
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $product->stock }}
                                                        {{ $product->stock_measurement }}</span>
                                                </td>
                                            @endif


                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-primary">{{ $product->category_name }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $product->brand_name }}</span>
                                            </td>





                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold"> ₱ @convert(
                                                    $product->price )</span>
                                            </td>
                                            <td
                                                class="align-middle pl-2 pr-6 py-4 whitespace-nowrap flex text-right text-base font-medium">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#edit-modal"
                                                    data-tooltip="tooltip" data-placement="top" title="Edit"
                                                    data-community="{{ json_encode($product) }}"
                                                    data-item-product_code="{{ $product->product_code }}"
                                                    data-item-product_name="{{ $product->product_name }}"
                                                    data-item-category="{{ $product->category_name }}"
                                                    data-item-brand="{{ $product->brand_name }}"
                                                    data-item-description="{{ $product->description }}"
                                                    data-item-price="{{ $product->price }}"
                                                    data-item-status="{{ $product->status }}"
                                                    data-item-stock="{{ $product->stock }}"
                                                    data-item-is_customizable="{{ $product->is_customizable }}"
                                                    data-item-stock_measurement="{{ $product->stock_measurement }}"
                                                    data-item-default_photo="{{ $product->default_photo }}"
                                                    id="edit-item"
                                                    class="text-indigo-600 hover:text-indigo-900 mr-3 text-decoration-none">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <form class="delete-product"
                                                    action="{{ route('products.destroy', [$product->product_code]) }}"
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
                                                    src="{{ asset('img/admin/no-products.svg') }}" alt="no products">
                                                Hmmm.. There is no Products in here.
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
                    {{-- {{ $products->render('pagination::bootstrap-4') }} --}}
                    {{ $products->appends(Request::except('page'))->render('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>



    </div>


    <x-product.add-modal>
        <x-slot name="categoryOptions">
            @foreach ($categories as $category)
                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
            @endforeach
        </x-slot>

        <x-slot name="brandOptions">
            @foreach ($brands as $brand)
                <option value="{{ $brand->brand_name }}">{{ $brand->brand_name }}</option>
            @endforeach
        </x-slot>
    </x-product.add-modal>
    <x-product.edit-modal>
        <x-slot name="categoryOptions">
            @foreach ($categories as $category)
                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
            @endforeach
        </x-slot>

        <x-slot name="brandOptions">
            @foreach ($brands as $brand)
                <option value="{{ $brand->brand_name }}">{{ $brand->brand_name }}</option>
            @endforeach
        </x-slot>
    </x-product.edit-modal>



    @push('scripts')
        <script>
            //delete
            $(".delete-product").click(function(e) {
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
