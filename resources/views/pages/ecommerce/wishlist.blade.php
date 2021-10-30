<x-ecommerce-layout>
    <div class="w-11/12 my-12 mx-auto">
        {{-- <h1 class="text-center text-3xl sm:text-4xl font-bold">My Wish list</h1> --}}

        <div class="mt-12 flex flex-col justify-center items-center space-y-5 md:space-x-3">
            <div class="p-4 bg-white shadow-md w-11/12 md:w-4/5">
                <h1 class="text-left text-xl font-bold">
                    My Wish list ({{ count($wishlists) }} item/s)
                </h1>
                <hr class="my-2 border-b border-gray-500">
                <div class="container my-12 mx-auto px-4 md:px-12">
                    <div class="flex flex-wrap -mx-1 lg:-mx-4">


                        @forelse ($wishlists as $wishlist)
                            <!-- Column -->
                            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                                <!-- Article -->
                                <article class="overflow-hidden rounded-lg hover:shadow-lg border">

                                    <a href="{{ route('product', [$wishlist->product->product_code]) }}">
                                        <img class="block h-3/4 w-full"
                                            src="{{ asset('storage/media/products/main_' . $wishlist->product->product_code . '_' . $wishlist->product->default_photo) }}"
                                            alt="{{ $wishlist->product->product_name }}">
                                    </a>

                                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                        <h1 class="text-lg">
                                            <a class="no-underline text-black"
                                                href="{{ route('product', [$wishlist->product->product_code]) }}">
                                                {{ $wishlist->product->product_name }}
                                            </a>
                                        </h1>

                                        <p class="text-grey-darker text-sm">
                                            Brand: {{ $wishlist->product->brand_name }}
                                        </p>
                                    </header>

                                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                        <a class="flex items-center no-underline text-black">
                                            <p class="ml-2 text-sm">
                                                <h1 class="mr-2 0">&#8369;
                                                    @convert($wishlist->product->price)
                                                </h1>

                                            </p>
                                        </a>
                                        <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                            <form
                                                action="{{ route('wishlist.remove', [$wishlist->product->product_code]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </a>
                                    </footer>

                                </article>
                                <!-- END Article -->

                            </div>
                            <!-- END Column -->
                        @empty
                            <div class="flex flex-col md:flex-row mx-auto">
                                <div class="px-4 w-full flex flex-col justify-around ">
                                    <img src="{{ asset('img/wishlist.svg') }}" alt="No wish"
                                        class="block h-2/4 w-2/4  mx-auto">
                                    <p class="font-bold block mx-auto">No item on wishlist</p>
                                </div>
                            </div>
                        @endforelse



                    </div>
                </div>

            </div>
        </div>
    </div>
</x-ecommerce-layout>
