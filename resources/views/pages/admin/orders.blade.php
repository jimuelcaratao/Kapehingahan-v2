<x-app-layout>

    <div class="pt-8 pb-12 px-4 md:px-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div>
                <h2 class="text-2xl md:text-4xl font-bold mb-12">Orders 💰</h2>
            </div>

            {{-- Header --}}
            <div class="flex flex-row pb-4 md:pb-6 justify-between ">
                <div>
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
                            Order No.
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Customer
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Confirmed Date
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Canceled Date
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Packaged Date
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Shipped Date
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Delivered Date
                        </th>
                        <th scope="col-2"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </x-slot>
                {{-- Rows --}}
                <x-slot name="tableRow">
                    @forelse ($orders as $order)
                        <tr>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $order->order_no }}</div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $order->user->name }}</div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    {{ $order->status }}
                                </span>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $order->confirmed }}</div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $order->canceled_at }}</div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $order->packaged_at }}</div>
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $order->shipped_at }}</div>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ $order->delivered_at }}
                                </span>
                            </td>


                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#view-modal"
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
                                            data-item-delivered_at="{{ $order->delivered_at }}" id="view-order"
                                            class="text-indigo-600 hover:text-indigo-900 mr-5">View</a>
                                    </div>

                                    <div class="flex-shrink-0">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#update-modal"
                                            data-tooltip="tooltip" data-placement="top" title="Update"
                                            data-item-update_order_no="{{ $order->order_no }}"
                                            data-item-update_status="{{ $order->status }}"
                                            data-item-update_packaged_at="{{ $order->packaged_at }}"
                                            data-item-update_shipped_at="{{ $order->shipped_at }}"
                                            data-item-update_delivered_at="{{ $order->delivered_at }}"
                                            data-item-update_created_at="{{ $order->created_at }}" id="update-order"
                                            class="text-indigo-600 hover:text-indigo-900 mr-5">Update</a>
                                    </div>

                                </div>
                            </td>
                        </tr>

                        <tr class="bg-gray-50">
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Order Items.
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product Code
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product Name
                            </th>
                            <th colspan="4"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantity
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>

                        </tr>
                        {{-- order products --}}
                        @forelse ($order->order_items as $order_item)
                            <tr class="bg-gray-50">
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $order_item->product->product_code }}</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $order_item->product->product_name }}</div>
                                </td>
                                <td colspan="4" class="px-6 py-2 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $order_item->product->category_name }}
                                    </span>
                                </td>

                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $order_item->quantity }}</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">PHP @convert($order_item->price)</div>
                                </td>
                            </tr>

                            {{-- Customization --}}
                            @forelse ($order_item->product_customizations as $custom)
                                <tr class="bg-gray-50">
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <span class="text-xs font-bold">size:</span> {{ $custom->size }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <span class="text-xs font-bold">milk:</span> {{ $custom->milk }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <span class="text-sm text-gray-900">
                                            <span class="text-xs font-bold">flavor:</span> {{ $custom->flavor }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <span class="text-xs font-bold">toppings:</span> {{ $custom->topping }}
                                        </div>
                                    </td>
                                    <td colspan="4" class="px-6 py-2 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <span class="text-xs font-bold">add-ins:</span> {{ $custom->add_in }}
                                        </div>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        @empty

                        @endforelse
                        {{-- order products total --}}
                        <tr class="bg-gray-50">
                            <td colspan="8" class="text-right px-6 py-2 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Total:</div>
                            </td>
                            <td colspan="1" class="px-6 py-2 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    PHP @convert($order->getTotalPrice())
                                </span>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="9" class="pr-4 py-2 whitespace-nowrap text-sm font-medium text-center">
                                <img class="mx-auto d-block text-center py-4" style="width: 275px"
                                    src="{{ asset('img/admin/no-products.svg') }}" alt="no orders">
                                Hmmm.. There is no orders yet.
                            </td>
                        </tr>
                    @endforelse
                </x-slot>
            </x-main-table>


        </div>
    </div>
</x-app-layout>
