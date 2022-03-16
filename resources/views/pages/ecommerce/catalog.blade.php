<x-ecommerce-layout>

    <x-slot name="title">
        Products |
    </x-slot>

    @push('styles')
    @endpush

    <x-catalog.catalog-layout>
        <x-slot name="head">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">
                Products
                @if ($category_found == null)
                    - All
                @else
                    / {{ $category_found->category_name }}
                @endif
            </h1>
        </x-slot>
        <x-slot name="categoryList">
            <li>
                <a href="{{ route('catalog') }}" class="hover:bg-[#E7CC9A] hover:text-yellow-900 px-3 py-2 rounded-md">
                    All
                </a>
            </li>
            @forelse ($categories as $category)
                <li>
                    <a href="{{ route('catalog.category', [$category->category_name]) }}"
                        class="hover:bg-[#E7CC9A] hover:text-yellow-900 px-3 py-2 rounded-md">
                        {{ $category->category_name }}
                    </a>
                </li>
            @empty
                <li>
                    <a href="#">
                        No Category Available
                    </a>
                </li>
            @endforelse
        </x-slot>

        <x-slot name="productGrid">
            <div class="flex flex-col">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @forelse ($products as $product)
                        <div
                            class="relative max-w-sm min-w-[300px] md:min-w-[280px]  bg-white shadow-md rounded-3xl p-2 mx-4 my-4 cursor-pointer">
                            <div class="overflow-x-hidden rounded-2xl relative">

                                {{-- Main Images --}}
                                <a href="{{ route('product', [$product->product_code]) }}">
                                    <img class="mx-auto h-36 rounded-2xl w-36"
                                        src="{{ asset('storage/media/products/main_' . $product->product_code . '_' . $product->default_photo) }}"
                                        alt="{{ $product->default_photo }}">
                                </a>


                                {{-- Wishlist --}}
                                @auth
                                    @php
                                        $wishlist = App\Models\WishList::Where('user_id', 'like', '%' . Auth::user()->id . '%')
                                            ->Where('product_code', $product->product_code)
                                            ->first();
                                    @endphp
                                @endauth

                                @auth
                                    @if ($wishlist == null)
                                        <form action="{{ route('wishlist.add', [$product->product_code]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 group-hover:opacity-70" fill="none" viewBox="0 0 24 24"
                                                    stroke="white">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('wishlist.remove', [$product->product_code]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="text-white h-6 w-6 group-hover:opacity-70" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                @endauth

                                {{-- wishlist guest --}}
                                @guest
                                    <a href="{{ route('login') }}"
                                        class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70"
                                            fill="none" viewBox="0 0 24 24" stroke="white">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </a>
                                @endguest


                            </div>
                            <a href="{{ route('product', [$product->product_code]) }}">
                                <div class="mt-10 pl-2 mb-2 flex justify-between ">
                                    <div>
                                        <p class="text-lg font-semibold mb-0">{{ $product->product_name }}</p>
                                        <div class="flex item-center mt-2">

                                            @php
                                                $product_ave_reviews = App\Models\Review::where('product_code', $product->product_code)->avg('stars');
                                            @endphp

                                            {!! str_repeat(
    '
                                        <svg class="w-5 h-5 fill-current text-black" viewBox="0 0 24 24">
                                            <path
                                                d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                        </svg>
                                    ',
    round($product_ave_reviews, 0),
) !!}

                                            {!! str_repeat(
    '
                                       <svg class="w-5 h-5 fill-current text-gray-500" viewBox="0 0 24 24">
                                            <path
                                                d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                        </svg>
                                    ',
    5 - round($product_ave_reviews, 0),
) !!}

                                            ({{ round($product_ave_reviews, 0) }})
                                            <span class="ml-2">{{ count($product->product_reviews) }}
                                                Reviews
                                            </span>

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
                            </a>

                        </div>
                    @empty
                        No Available.. :(
                    @endforelse




                </div>
            </div>
        </x-slot>
    </x-catalog.catalog-layout>


    @push('scripts')
    @endpush
</x-ecommerce-layout>
