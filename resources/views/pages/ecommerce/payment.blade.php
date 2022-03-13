<x-ecommerce-layout>
    <x-slot name="title">
        Payment |
    </x-slot>

    @php
        $total = 0;
    @endphp

    <div class="w-auto mb-5 p-5 flex flex-row justify-center items-center space-x-3 bg-white  shadow-sm">
        <p class="text-yellow-700 font-semibold">Cart</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-700" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
        <p class="text-yellow-700 font-semibold">Checkout</p>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-700" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
        <p class="font-semibold text-yellow-700">Payment</p>
    </div>

    <div class="w-11/12 my-10 mx-auto p-5 flex flex-col md:flex-row items-start space-y-5 md:space-x-5">
        <div class="w-11/12 md:w-1/2 mx-auto md:mr-auto mb-5 md:mb-0 p-5 bg-white rounded-lg shadow-md">

            <form action="{{ route('payment.order') }}" method="POST">
                @csrf

                <div class="my-4 ml-2" id="rd-btn">

                    <div class="form-check">
                        <input
                            class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="radio" name="payment_method" id="radio_cod" value="Cash on Delivery" checked>
                        <label class="form-check-label inline-block text-gray-800" for="radio_cod">
                            Cash on Delivery
                        </label>
                    </div>

                    <div class="form-check">
                        <input
                            class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="radio" name="payment_method" id="radio_card" value="Card">
                        <label class="form-check-label inline-block text-gray-800" for="radio_card">
                            Credit/Debit Card
                        </label>
                    </div>

                    <div class="form-check">
                        <input
                            class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="radio" name="payment_method" id="radio_pay_pal" value="PayPal">
                        <label class="form-check-label inline-block text-gray-800" for="radio_pay_pal">
                            Paypal
                        </label>
                    </div>

                    <div class="form-check">
                        <input
                            class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="radio" name="payment_method" id="radio_pick_up" value="Pick Up">
                        <label class="form-check-label inline-block text-gray-800" for="radio_pick_up">
                            For Pick Up
                        </label>
                    </div>


                </div>


                @if (Auth::user()->user_address)
                    <div class="bg-white p-6 rounded-lg border shadow">
                        <h2 class="text-xl font-bold mb-2 text-gray-800">{{ Auth::user()->user_address->house }},
                            Barangay {{ Auth::user()->user_address->barangay }},
                            {{ Auth::user()->user_address->province }}, {{ Auth::user()->user_address->city }}</h2>
                        <p class="text-gray-700">This Address</p>
                    </div>
                @endif
                @empty(Auth::user()->user_address)
                    <div class="bg-white p-6 rounded-lg border shadow-lg">
                        <h2 class="text-xl font-bold mb-2 text-gray-800">No Address</h2>
                        <p class="text-gray-700">Cant proceed without address</p>
                    </div>
                @endempty
                <div class="mt-4">
                    <x-jet-input type="text" class="mt-1 block w-full"
                        placeholder="Standard Delivery - Est.Arrival 2-3 days." disabled />
                </div>

                <h1 class="text-sm my-5 md:mb-10 text-gray-700">Note: Cash on Delivery is available within Metro Manila
                    only.</h1>

                <div id="card-form">

                    @if (Auth::user()->user_card)
                        <!-- card with no image -->
                        <div class="bg-white p-6 rounded-lg border shadow-lg">
                            <h2 class="text-xl font-bold mb-2 text-gray-800">{{ Auth::user()->user_card->cardname }} -
                                {{ Auth::user()->user_card->cardnumber }}
                            </h2>
                            <div class="flex justify-between">
                                <p class="text-gray-700">This Card</p>
                                <a class="mt-2 text-gray-700 text-xs" href="{{ route('profile.show') }}">Edit</a>
                            </div>
                        </div>
                    @endif
                    @empty(Auth::user()->user_card)
                        <!-- cardname-->
                        <div class="mt-4">
                            <x-jet-label for="cardname" value="{{ __('Name on Card') }}" />
                            <x-jet-input id="cardname" type="text" class="mt-1 block w-full" name="cardname"
                                placeholder="John Doe" value="{{ old('cardname') }}" />
                            <x-jet-input-error for="cardname" class="mt-2" />
                        </div>

                        <!-- Credit card number -->
                        <div class="mt-4">
                            <x-jet-label for="cardnumber" value="{{ __('Credit card number') }}" />
                            <x-jet-input id="cardnumber" type="text" class="mt-1 block w-full" name="cardnumber"
                                placeholder="1111222233334444" value="{{ old('cardnumber') }}" />
                            <x-jet-input-error for="cardnumber" class="mt-2" />
                        </div>

                        <!-- expmonth -->
                        <div class="mt-4">
                            <x-jet-label for="expmonth" value="{{ __('Exp Month') }}" />
                            <x-jet-input id="expmonth" type="text" class="mt-1 block w-full" name="expmonth"
                                placeholder="12" value="{{ old('expmonth') }}" />
                            <x-jet-input-error for="expmonth" class="mt-2" />
                        </div>

                        <!-- expyear -->
                        <div class="mt-4">
                            <x-jet-label for="expyear" value="{{ __('Exp Year') }}" />
                            <x-jet-input id="expyear" type="text" class="mt-1 block w-full" name="expyear"
                                placeholder="20XX" value="{{ old('expyear') }}" />
                            <x-jet-input-error for="expyear" class="mt-2" />
                        </div>

                        <!-- ccv -->
                        <div class="mt-4">
                            <x-jet-label for="ccv" value="{{ __('CCV') }}" />
                            <x-jet-input id="ccv" type="text" class="mt-1 block w-full" name="ccv" placeholder="123"
                                value="{{ old('ccv') }}" />
                            <x-jet-input-error for="ccv" class="mt-2" />
                        </div>
                    @endempty
                </div>

                <div class="mt-8 flex flex-row justify-end space-x-5">
                    <x-jet-secondary-button>
                        <a href="{{ route('cart') }}">Cancel Order</a>
                    </x-jet-secondary-button>
                    <x-jet-button type="submit">
                        Place order
                    </x-jet-button>
                </div>
            </form>
        </div>



        <div class="w-11/12 md:w-1/2 mx-auto p-5 bg-white rounded-lg shadow-md" style="margin-top: 0;">
            @foreach ($carts as $cart)
                @if ($cart->product->stock > 0)
                    <div class="flex flex-col md:flex-row p-2 border-b border-gray-300">
                        <img class="block h-1/4 w-1/4 mx-auto"
                            src="{{ asset('storage/media/products/main_' . $cart->product->product_code . '_' . $cart->product->default_photo) }}"
                            alt="{{ $cart->product->product_name }}">
                        <div class="px-4 w-full flex flex-col justify-center items-start space-y-3">
                            <h1 class="text-gray-600 font-bold">
                                <a href="{{ route('product', [$cart->product->product_code]) }}">
                                    {{ $cart->product->product_name }}
                                </a>
                            </h1>
                            @foreach ($cart->cart_product_customizations as $item)
                                <p>size: {{ $item->size }}</p>
                                @if ($item->milk == null)
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
                            <p>Qty: {{ $cart->quantity }}</p>
                            <p>&#8369; @convert($cart->product->price)</p>
                        </div>
                    </div>
                @endif


                @php
                    $price = 0;
                    
                    if ($cart->product->stock > 0) {
                        $price = $cart->product->price;
                    
                        $total = $cart->quantity * $price + $total;
                    }
                    
                @endphp
            @endforeach



            <div class="p-4 bg-white w-11/12 md:w-auto m-auto">
                <h1 class="mx-auto mb-5 text-center text-xl font-bold">The total amount of</h1>
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
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {

                $('#card-form').hide();

                $('#radio_card').click(function() {
                    $('#card-form').show();

                });

                $('#radio_cod').click(function() {
                    $('#card-form').hide();
                });

                $('#radio_pay_pal').click(function() {
                    $('#card-form').hide();
                });


                $('#radio_pick_up').click(function() {
                    $('#card-form').hide();
                });
            });
        </script>
    @endpush
</x-ecommerce-layout>
