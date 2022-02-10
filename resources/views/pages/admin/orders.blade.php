<x-admin-layout>
    @slot('header')
        Orders
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
                                        type="search" name="search" placeholder="Order no." aria-label="Search"
                                        value="{{ request()->search }}">
                                </div>
                            </div>
                            <button type="submit" class="text-secondary mx-2">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <div>

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
                                        <th scope="col"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Order No.
                                        </th>
                                        <th scope="col"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Customer
                                        </th>
                                        <th scope="col"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-center">
                                            Confirmed Date
                                        </th>
                                        <th scope="col"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-center">
                                            Canceled Date
                                        </th>
                                        <th scope="col"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-center">
                                            Packaged Date
                                        </th>
                                        <th scope="col"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-center">
                                            Shipped Date
                                        </th>
                                        <th scope="col"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-center">
                                            Delivered Date
                                        </th>
                                        <th scope="col-2"
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <h6 class="mb-0 text-sm">{{ $order->order_no }}</h6>

                                            </td>

                                            <td class="align-middle">
                                                <p class="text-xs font-weight-bold mb-0 ">{{ $order->user->name }}</p>
                                            </td>


                                            {{-- Order Status --}}
                                            @if ($order->status == 'Delivered')
                                                <td class="align-middle  text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{ $order->status }}</span>
                                                </td>
                                            @endif
                                            @if ($order->status == 'Delivering')
                                                <td class="align-middle  text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-primary">{{ $order->status }}</span>
                                                </td>
                                            @endif

                                            @if ($order->status == 'Canceled')
                                                <td class="align-middle  text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-danger">{{ $order->status }}</span>
                                                </td>
                                            @endif

                                            @if ($order->status == 'Pending')
                                                <td class="align-middle  text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-secondary">{{ $order->status }}</span>
                                                </td>
                                            @endif

                                            @if ($order->status == 'Confirm Pending')
                                                <td class="align-middle  text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-warning">{{ $order->status }}</span>
                                                </td>
                                            @endif

                                            @if ($order->status == 'Packaging')
                                                <td class="align-middle  text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-info">{{ $order->status }}</span>
                                                </td>
                                            @endif

                                            @if ($order->status == 'Shipping')
                                                <td class="align-middle  text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-info">{{ $order->status }}</span>
                                                </td>
                                            @endif

                                            {{-- End Order Status --}}


                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $order->confirmed }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $order->canceled_at }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $order->packaged_at }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $order->shipped_at }}</span>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $order->delivered_at }}</span>
                                            </td>


                                            <td class="align-middle">
                                                <a class="text-secondary font-weight-bold text-xs" href="#"
                                                    data-bs-toggle="modal" data-bs-target="#view-modal"
                                                    data-tooltip="tooltip" data-placement="top" title="view"
                                                    data-item-order_no="{{ $order->order_no }}"
                                                    data-item-name="{{ $order->user->name }}"
                                                    data-item-email="{{ $order->user->email }}"
                                                    data-item-mobile_no="{{ $order->user->user_address->mobile_no ?? null }}"
                                                    data-item-house="{{ $order->user->user_address->house ?? null }}"
                                                    data-item-city="{{ $order->user->user_address->city ?? null }}"
                                                    data-item-province="{{ $order->user->user_address->province ?? null }}"
                                                    data-item-barangay="{{ $order->user->user_address->barangay ?? null }}"
                                                    data-item-status="{{ $order->status }}"
                                                    data-item-confirmed="{{ $order->confirmed }}"
                                                    data-item-packaged_at="{{ $order->packaged_at }}"
                                                    data-item-shipped_at="{{ $order->shipped_at }}"
                                                    data-item-delivered_at="{{ $order->delivered_at }}"
                                                    id="view-order">
                                                    View
                                                </a>

                                                <a class="text-secondary font-weight-bold text-xs" href="#"
                                                    data-bs-toggle="modal" data-bs-target="#update-modal"
                                                    data-tooltip="tooltip" data-placement="top" title="Update"
                                                    data-item-update_order_no="{{ $order->order_no }}"
                                                    data-item-update_status="{{ $order->status }}"
                                                    data-item-update_packaged_at="{{ $order->packaged_at }}"
                                                    data-item-update_shipped_at="{{ $order->shipped_at }}"
                                                    data-item-update_delivered_at="{{ $order->delivered_at }}"
                                                    data-item-update_created_at="{{ $order->created_at }}"
                                                    id="update-order">
                                                    Update
                                                </a>

                                            </td>
                                        </tr>


                                        <tr>
                                            <th scope="col"
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                Order Items.
                                            </th>
                                            <th scope="col"
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Product Code
                                            </th>
                                            <th scope="col"
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Product Name
                                            </th>
                                            <th scope="col" colspan="4"
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-center">
                                                Category
                                            </th>
                                            <th scope="col"
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-center">
                                                quantity
                                            </th>
                                            <th scope="col"
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-center">
                                                Price
                                            </th>
                                        </tr>

                                        @foreach ($order->order_items as $order_item)
                                            <tr class="bg-gray-50">
                                                <td class="align-middle text-center text-sm">

                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $order_item->product->product_code }}</div>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-xs font-weight-bold mb-0 ">
                                                        {{ $order_item->product->product_name }}</p>
                                                </td>
                                                <td colspan="4" class=" text-sm">
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $order_item->product->category_name }}
                                                    </span>
                                                </td>

                                                <td class=" text-sm">
                                                    <div class="text-sm text-gray-900">{{ $order_item->quantity }}
                                                    </div>
                                                </td>
                                                <td class=" text-sm">
                                                    <div class="text-xs text-gray-900">PHP @convert($order_item->price)
                                                    </div>
                                                </td>
                                            </tr>

                                            @foreach ($order_item->product_customizations as $custom)
                                                <tr class="bg-gray-200">
                                                    <td class=" whitespace-nowrap">
                                                        <div class="text-xs text-gray-900">
                                                            <span>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-5 w-5" viewBox="0 0 20 20"
                                                                    fill="currentColor">
                                                                    <path fill-rule="evenodd"
                                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td class=" whitespace-nowrap">
                                                        <div class="text-xs text-gray-900">
                                                            <span class="text-xs font-bold">size:</span>
                                                            {{ $custom->size }}
                                                        </div>
                                                    </td>
                                                    <td class=" whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            <span class="text-xs font-bold">milk:</span>
                                                            {{ $custom->milk }}
                                                        </div>
                                                    </td>
                                                    <td class=" whitespace-nowrap">
                                                        <span class="text-xs text-gray-900">
                                                            <span class="text-xs font-bold">flavor:</span>
                                                            {{ $custom->flavor }}
                                                        </span>
                                                    </td>

                                                    <td class=" whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            <span class="text-xs font-bold">toppings:</span>
                                                            {{ $custom->topping }}
                                                        </div>
                                                    </td>
                                                    <td colspan="4" class=" whitespace-nowrap">
                                                        <div class="text-xs text-gray-900">
                                                            <span class="text-xs font-bold">add-ins:</span>
                                                            {{ $custom->add_in }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach

                                        {{-- order products total --}}
                                        <tr class="bg-gray-100">
                                            <td colspan="8" class="text-right  whitespace-nowrap">
                                                <div class="text-sm text-gray-900">Total:</div>
                                            </td>
                                            <td colspan="1" class=" whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    PHP @convert($order->getTotalPrice())
                                                </span>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="9"
                                                class="pr-4 whitespace-nowrap text-sm font-medium text-center">
                                                <img class="mx-auto d-block text-center py-4" style="width: 275px"
                                                    src="{{ asset('img/admin/no-products.svg') }}" alt="no orders">
                                                Hmmm.. There is no orders yet.
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
                    {{ $orders->render('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>

    <x-order.view-order-modal>
    </x-order.view-order-modal>

    <x-order.update-order-modal>
    </x-order.update-order-modal>

</x-admin-layout>
