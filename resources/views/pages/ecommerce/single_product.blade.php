<x-ecommerce-layout>

    @push('styles')
        <style>
            input[type="number"] {
                -webkit-appearance: textfield;
                -moz-appearance: textfield;
                appearance: textfield;
            }

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
            }

            .number-input {
                border: 2px solid #ddd;
                display: inline-flex;
            }

            .number-input,
            .number-input * {
                box-sizing: border-box;
            }

            .number-input button {
                outline: none;
                -webkit-appearance: none;
                background-color: #eeeeee;
                border: none;
                align-items: center;
                justify-content: center;
                width: 2.5rem;
                cursor: pointer;
                margin: 0;
                position: relative;
                padding: 0;
            }

            .number-input button:before,
            .number-input button:after {
                display: inline-block;
                position: absolute;
                content: "";
                width: 0.5rem;
                height: 2px;
                background-color: #212121;
                transform: translate(-50%, -50%);
            }

            .number-input button.plus:after {
                transform: translate(-50%, -50%) rotate(90deg);
            }

            .number-input input[type="number"] {
                font-family: sans-serif;
                max-width: 4.5rem;
                padding: 0.5rem;
                border: 0;
                text-align: center;
                outline: none;
            }

            .number-input {
                border: solid #c2c4c6;
                border-width: 2px;
            }

            .text-star {
                background-color: gold;
            }

        </style>
    @endpush

    <div class="bg-white">
        <div class="pt-6">

            <nav aria-label="Breadcrumb">
                <ol role="list" class="max-w-2xl mx-auto px-4 flex items-center space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
                    <li>
                        <div class="flex items-center">
                            <a href="#" class="mr-2 text-sm font-medium text-gray-900">
                                Product
                            </a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-5 text-gray-300">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>

                    <li>
                        <div class="flex items-center">
                            <a href="#" class="mr-2 text-sm font-medium text-gray-900">
                                {{ $product->category_name }}
                            </a>
                            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-5 text-gray-300">
                                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
                            </svg>
                        </div>
                    </li>

                    <li class="text-sm">
                        <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">
                            {{ $product->product_name }}
                        </a>
                    </li>
                </ol>
            </nav>







            <!-- Product info -->
            <div
                class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
                <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">

                    @if ($product->is_customizable == 1)
                        <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                            Customization
                        </h1>
                    @endif
                    @if ($product->is_customizable == 0)

                        <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
                            {{ $product->product_name }}
                        </h1>
                    @endif

                </div>

                <!-- Options -->
                <div class="mt-4 lg:mt-0 lg:row-span-3">


                    <!-- Image gallery -->
                    <div
                        class="aspect-w-3 aspect-h-4 h-auto  sm:rounded-lg sm:overflow-hidden lg:aspect-w-2 lg:aspect-h-3 mb-4">

                        {{-- Wishlist --}}
                        @if ($wishlist == null)
                            <form action="{{ route('wishlist.add', [$product->product_code]) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="float-right text-white bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('wishlist.remove', [$product->product_code]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="float-right text-white bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        @endif

                        {{-- Main Image --}}
                        <img src="{{ asset('img/prd-2.jpg') }}" alt="Model wearing plain white basic tee."
                            class="w-full h-full object-center object-cover">
                    </div>



                    <h2 class="sr-only">Product information</h2>
                    <div class="flex flex-row justify-between">
                        <p class="text-3xl text-gray-900 font-bold">{{ $product->product_name }}</p>
                        <p class="text-3xl text-gray-900">₱ @convert($product->price)</p>
                    </div>


                    <!-- Reviews -->
                    <div class="mt-6">
                        <h3 class="sr-only">Reviews</h3>
                        <div class="flex items-center">
                            <div class="flex items-center">
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

                                {{-- review counts --}}
                                @if (count($product->product_reviews) <= 0)
                                    <p class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500"> No
                                        reviews</p>

                                @else

                                    <p class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                        {{ count($product->product_reviews) }} reviews</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <form class="mt-10" action="{{ route('cart.add', [$product->product_code]) }}"
                        method="POST">
                        @csrf
                        <!-- Sizes -->
                        <div class="mt-10">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm text-gray-900 font-medium">Quantity:</h3>
                                {{-- <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size
                                    guide</a> --}}
                            </div>

                            <fieldset class="mt-4">
                                {{-- <input class="" type="number" name="quantity" min="1" max="5" value="1"> --}}
                                <td>
                                    <div class="justify-content-center">
                                        <div class=" mb-0">
                                            <div class=" mx-auto mb-0">
                                                {{-- <label for="quantity">Quantity :</label> --}}
                                                <div class="number-input">

                                                    <button type="button"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                                                    <input class="quantity " min="1" max="5" name="quantity"
                                                        value="1" type="number">
                                                    <button type="button"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                        class="plus"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </fieldset>
                        </div>

                        <div class="flex flex row gap-2 ">
                            {{-- Add to Cart --}}
                            <button type="submit"
                                class="mt-10 w-full bg-yellow-600 border border-transparent rounded-md py-2 flex items-center justify-center text-base font-medium text-white hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                Add to Cart
                            </button>

                            {{-- Wishlists --}}
                            {{-- <a href=""
                                class="mt-10 w-1/6 bg-indigo-600 border border-transparent rounded-md  flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </a> --}}



                        </div>


                </div>

                <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">

                    <!-- Description and details -->
                    <div>


                        @if ($product->is_customizable == 1)
                            <div class="space-y-6 customizable">
                                <div class="space-y-3">
                                    <label for="size" class="block text-sm font-medium text-gray-700">
                                        Size</label>
                                    <select id="size" name="size"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled value="">Choose...</option>
                                        <option value="large">Large</option>
                                    </select>
                                </div>

                                <div class="space-y-3">
                                    <label for="milk" class="block text-sm font-medium text-gray-700">
                                        Milk Type</label>
                                    <select id="milk" name="milk"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled value="">Choose...</option>
                                        <option value="wa">wala</option>
                                    </select>
                                </div>

                                <div class="space-y-3">
                                    <label for="flavor" class="block text-sm font-medium text-gray-700">
                                        Add-in Flavor
                                    </label>
                                    <select id="flavor" name="flavor"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled value="">Choose...</option>
                                        <option value="wa">wala</option>
                                    </select>
                                </div>

                                <div class="space-y-3">
                                    <label for="topping" class="block text-sm font-medium text-gray-700">
                                        Toppings
                                    </label>
                                    <select id="topping" name="topping"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled value="">Choose...</option>
                                        <option value="wa">wala</option>
                                    </select>
                                </div>

                                <div class="space-y-3">
                                    <label for="add_in" class="block text-sm font-medium text-gray-700">
                                        Add-ins
                                    </label>
                                    <select id="add_in" name="add_in"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option selected disabled value="">Choose...</option>
                                        <option value="wa">wala</option>
                                    </select>
                                </div>

                            </div>
                        @endif


                    </div>

                    </form>


                    <div class="mt-10">
                        <h2 class="text-sm font-medium text-gray-900">Details</h2>

                        <div class="mt-4 space-y-6">
                            <p class="text-sm text-gray-600"> {{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





</x-ecommerce-layout>
