<x-ecommerce-layout>

    @push('styles')

    @endpush

    <x-catalog.catalog-layout>
        <x-slot name="productGrid">
            <div class="flex flex-col ">
                <div class="relative m-3 flex flex-wrap mx-auto ">

                    @forelse ($products as $product)
                        <div
                            class="relative max-w-sm min-w-[220px] md:min-w-[340px]  bg-white shadow-md rounded-3xl p-2 mx-4 my-4 cursor-pointer">
                            <div class="overflow-x-hidden rounded-2xl relative">
                                <img class="mx-auto h-36 rounded-2xl w-36"
                                    src="{{ asset('storage/media/products/main_' . $product->product_code . '_' . $product->default_photo) }}"
                                    alt="{{ $product->default_photo }}">
                                <p class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70"
                                        fill="none" viewBox="0 0 24 24" stroke="white">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </p>
                            </div>
                            <div class="mt-10 pl-2 mb-2 flex justify-between ">
                                <div>
                                    <p class="text-lg font-semibold mb-0">{{ $product->product_name }}</p>
                                    <div class="flex item-center mt-2">
                                        <svg class="w-5 h-5 fill-current text-black" viewBox="0 0 24 24">
                                            <path
                                                d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                        </svg>
                                        <svg class="w-5 h-5 fill-current text-black" viewBox="0 0 24 24">
                                            <path
                                                d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                        </svg>
                                        <svg class="w-5 h-5 fill-current text-black" viewBox="0 0 24 24">
                                            <path
                                                d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                        </svg>
                                        <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 24 24">
                                            <path
                                                d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                        </svg>
                                        <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 24 24">
                                            <path
                                                d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                        </svg>
                                    </div>
                                    <p class="text-md text-yellow-900 mt-4">₱ @convert($product->price)</p>
                                </div>
                                <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 group-hover:opacity-50 opacity-70" fill="none"
                                        viewBox="0 0 24 24" stroke="black">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse




                </div>
            </div>
        </x-slot>
    </x-catalog.catalog-layout>


    @push('scripts')

    @endpush
</x-ecommerce-layout>
