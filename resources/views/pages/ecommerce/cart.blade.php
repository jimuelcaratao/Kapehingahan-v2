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

    <div class="w-11/12 my-12 p-6 md:p-12 mx-auto">

        @php
            $total = 0;
        @endphp

        <div class="flex flex-col md:flex-row justify-center items-center md:items-start space-y-5 md:space-x-3">
            <div class="p-4 bg-white shadow-md w-11/12 md:w-3/5">
                <h1 class="text-left text-xl font-bold">My Cart ({{ count($carts) }} item/s)</h1>
                <hr class="my-2 border-b border-gray-500">

                @forelse ($carts as $cart)



                    <div class="flex flex-col md:flex-row p-2 border-b border-gray-500 hover:shadow-lg">
                        <img class="h-full w-full md:h-1/4 md:w-1/4 block mx-auto rounded"
                            src="{{ asset('storage/media/products/main_' . $cart->product->product_code . '_' . $cart->product->default_photo) }}"
                            alt="{{ $cart->product->product_name }}">
                        <div class="px-4 w-full flex flex-col justify-around items-start">
                            <h1 class="text-gray-700 font-bold">
                                <a href="{{ route('product', [$cart->product->product_code]) }}">
                                    {{ $cart->product->product_name }}
                                </a>
                            </h1>
                            @if ($cart->product->stock > 0)
                                <p>Stock: Available</p>
                            @else
                                <p>Stock: Not Available</p>
                            @endif

                            @foreach ($cart->cart_product_customizations as $item)
                                <p>size: {{ $item->size }}</p>

                                @if ($item->milk != null)
                                    <p>milk: {{ $item->milk }}</p>
                                @endif

                                @if ($item->flavor != null)
                                    <p>Add-in flavor: {{ $item->flavor }}</p>
                                @endif
                                @if ($item->topping != null)
                                    <p>toppings: {{ $item->topping }}</p>
                                @endif
                                @if ($item->add_in != null)
                                    <p>Add-ins: {{ $item->add_in }}</p>
                                @endif

                            @endforeach

                            {{-- <p>Brand: {{ $cart->product->brand_name }}</p> --}}

                            {{-- Buttons --}}
                            <div class="flex flex-row space-x-2">
                                <form action="{{ route('cart.remove', [$cart->product->product_code]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>


                                <form action="{{ route('cart.move', [$cart->product->product_code]) }}"
                                    method="POST">
                                    @csrf
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </form>

                            </div>

                        </div>
                        <div class="mt-3 md:mt-0 px-4 flex flex-col justify-around items-center">
                            <div class="flex flex-col items-center">


                                @if ($cart->product->stock <= 0)
                                    Not Available
                                @else
                                    <form class="formQuantity"
                                        action="{{ route('cart.quantity', [$cart->cart_id, $cart->product->product_code]) }}"
                                        method="POST">
                                        @method('PUT')
                                        @csrf
                                        {{-- <label for="quantity">Quantity:</label> --}}
                                        {{-- <input class="input_quantity"  type="number" name="quantity" min="1" max="5"  value="{{ $cart->quantity }}"> --}}


                                        <td>
                                            <div class="justify-content-center">
                                                <div class=" mx-auto mb-0">
                                                    <label for="quantity">Quantity :</label>
                                                    <div class="number-input">

                                                        <button class="qty-btn"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()"></button>
                                                        <input class="input_quantity quantity" min="1" max="5"
                                                            name="quantity" value="{{ $cart->quantity }}"
                                                            type="number">
                                                        <button class="qty-btn plus"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </form>
                                @endif


                            </div>


                            <h1 class="mt-5">&#8369;
                                @convert(($cart->product->price * $cart->quantity))</h1>


                        </div>
                    </div> {{-- end of item --}}

                    @php
                        
                        if ($cart->product->stock > 0) {
                            $price = 0;
                        
                            // if (optional($cart->product->product_price)->discounted_price != null) {
                            //     $price = optional($cart->product->product_price)->discounted_price;
                            // }
                        
                            // if (optional($cart->product->product_price)->discounted_price == null) {
                            //     $price = optional($cart->product->product_price)->price;
                            // }
                            $price = $cart->product->price;
                        
                            $total = $cart->quantity * $price + $total;
                        }
                        
                    @endphp

                @empty
                    <div class="flex flex-col md:flex-row ">
                        <div class="px-4 w-full flex flex-col justify-around items-start ">
                            <img src="{{ asset('img/empty_cart.svg') }}" alt="No wish"
                                class="block h-2/4 w-2/4  mx-auto">
                            <p class="font-bold block mx-auto mb-6">No item on carts</p>
                        </div>
                    </div>
                @endforelse

            </div>

            <div class="p-4 bg-white shadow-md w-11/12 md:w-auto m-auto" style="margin-top: 0;">
                <h1 class="mx-10 mb-5 text-center text-xl font-bold">The total amount of</h1>
                <div class="flex flex-col">
                    <div class="flex flex-row justify-between items-center">
                        <p>Subtotal: ({{ count($carts) }} item/s)</p>
                        <p>&#8369; @convert($total) </p>
                    </div>
                    <div class="flex flex-row justify-between items-center">
                        <p>Shipping</p>
                        <p>Free</p>
                    </div>
                </div>
                <hr class="my-5 border-b border-gray-500">
                <div class="flex flex-row justify-between items-center font-bold mb-5">
                    <p class="text-sm">The total amount: </p>
                    <p>&#8369; @convert($total) </p>
                </div>

                @if ($total > 0)
                    <x-jet-button>
                        <a href="{{ route('checkout.index') }}">
                            Go to checkout
                        </a>
                        {{-- <a href="">
                            Go to checkout
                        </a> --}}
                    </x-jet-button>
                @endif

            </div>
        </div>
    </div>


    @push('scripts')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            $(".input_quantity").on("input", function() {
                $("form.formQuantity").submit();
            });
        </script>
    @endpush
</x-ecommerce-layout>
