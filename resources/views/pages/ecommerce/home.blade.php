<x-ecommerce-layout>

    @push('styles')
        {{-- Responsiveness --}}
        <link rel="stylesheet" href="{{ asset('css/media-queries.css') }}">

        {{-- Glider --}}
        <!-- Required Core Stylesheet -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
        <link rel="stylesheet" href="{{ asset('css/slider/glider.css') }}">


        {{-- Glider Script --}}
        <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
        <script src="{{ asset('js/slider/glider.js') }}" defer></script>

        <style>
            html {
                scroll-behavior: smooth;
            }

            .carousel-open:checked+.carousel-item {
                position: static;
                opacity: 100;
            }

            .carousel-item {
                -webkit-transition: opacity 0.6s ease-out;
                transition: opacity 0.6s ease-out;
            }

            #carousel-1:checked~.control-1,
            #carousel-2:checked~.control-2,
            #carousel-3:checked~.control-3 {
                display: block;
            }

            .carousel-indicators {
                list-style: none;
                margin: 0;
                padding: 0;
                position: absolute;
                bottom: 2%;
                left: 0;
                right: 0;
                text-align: center;
                z-index: 10;
            }

            #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
            #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
            #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
                color: #A47246;
                /*Set to match the Tailwind colour you want the active one to be */
            }

        </style>

    @endpush

    <div class="bg-white font-sans leading-normal tracking-normal">
        <div class="carousel relative shadow-2xl bg-white">
            <div class="carousel-inner relative overflow-hidden w-full">
                <!--Slide 1-->
                <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                    checked="checked">
                <div class="carousel-item absolute opacity-0" style="height:60vh;">
                    <img class="block h-full w-full md:bg-fixed" src={{ asset('img/3.png') }}>
                </div>
                <label for="carousel-3"
                    class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-yellow-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-2"
                    class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-yellow-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
                <!--Slide 2-->
                <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
                <div class="carousel-item absolute opacity-0" style="height:60vh;">
                    <img class="block h-full w-full" src={{ asset('img/2.png') }}>
                </div>
                <label for="carousel-1"
                    class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-yellow-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-3"
                    class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-yellow-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
                <!--Slide 3-->
                <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
                <div class="carousel-item absolute opacity-0" style="height:60vh;">
                    <img class="block h-full w-full" src={{ asset('img/1.png') }}>
                </div>
                <label for="carousel-2"
                    class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-yellow-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
                <label for="carousel-1"
                    class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-yellow-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>
                <!-- Add additional indicators for each slide-->
                <ol class="carousel-indicators">
                    <li class="inline-block mr-3">
                        <label for="carousel-1"
                            class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-yellow-900">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-2"
                            class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-yellow-900">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-3"
                            class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-yellow-900">•</label>
                    </li>
                </ol>
            </div>
        </div>
        <!-- Hot brew or cold brew section -->
        <div class="container p-16 mx-auto space-y-8">
            <div class="space-y-2 text-center">
                <h1 class="lg:text-3xl md:text-2xl font-bold uppercase">how do you like your coffee?</h1>
            </div>
            <div class="flex flex-col justify-center">
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-2">
                    <div
                        class="relative flex flex-col justify-center transform hover:scale-105 duration-300 ease-in-out">
                        <div aria-label="hot-brew">
                            <img alt="hot-brew" class="object-cover w-full h-60 rounded-3xl"
                                src={{ asset('img/hot-brew.jpg') }}>
                        </div>
                        <div class="absolute w-full text-center">
                            <a href=#
                                class="text-white tracking-wide uppercase lg:text-3xl md:text-2xl font-bold hover:underline hover:border-white">Hot
                                Brew</a>
                        </div>
                    </div>
                    <div
                        class="relative flex flex-col justify-center transform hover:scale-105 duration-300 ease-in-out">
                        <div aria-label="cold-brew">
                            <img alt="" class="object-cover w-full h-60 rounded-3xl"
                                src={{ asset('img/cold-brew.jpg') }}>
                        </div>
                        <div class="absolute w-full text-center">
                            <a href=#
                                class="text-white tracking-wide uppercase lg:text-3xl md:text-2xl font-bold hover:underline hover:border-white">Cold
                                Brew</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Best sellers -->
        <div class="container p-4 mx-auto space-y-8">
            <div class="space-y-2 text-center">
                <h1 class="lg:text-3xl md:text-2xl font-bold uppercase">best sellers</h1>
            </div>
        </div>
        <div class="flex flex-col justify-center">
            <div class="relative m-3 flex flex-wrap mx-auto justify-center">
                <div
                    class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-4 my-4 cursor-pointer">
                    <div class="overflow-x-hidden rounded-2xl relative">
                        <img class="mx-auto h-36 rounded-2xl w-36" src={{ asset('img/prd-1.jpg') }}>
                        <p class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none"
                                viewBox="0 0 24 24" stroke="white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </p>
                    </div>
                    <div class="mt-10 pl-2 mb-2 flex justify-between ">
                        <div>
                            <p class="text-lg font-bold mb-0">Hot Butterbal Pumpkin <br /> Spice Latte</p>
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
                            <p class="text-md text-yellow-900 mt-4">₱195.00</p>
                        </div>
                        <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                fill="none" viewBox="0 0 24 24" stroke="black">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div
                    class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-4 my-4 cursor-pointer">
                    <div class="overflow-x-hidden rounded-2xl relative">
                        <img class="mx-auto h-36 rounded-2xl w-36" src={{ asset('img/prd-2.jpg') }}>
                        <p class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none"
                                viewBox="0 0 24 24" stroke="white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </p>
                    </div>
                    <div class="mt-10 pl-2 mb-2 flex justify-between ">
                        <div>
                            <p class="text-lg font-semibold mb-0">Iced Butterball <br /> Pumpkin Spice Latte</p>
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
                            <p class="text-md text-yellow-900 mt-4">₱205.00</p>
                        </div>
                        <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                fill="none" viewBox="0 0 24 24" stroke="black">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div
                    class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-4 my-4 cursor-pointer">
                    <div class="overflow-x-hidden rounded-2xl relative">
                        <img class="mx-auto h-36 rounded-2xl w-36" src={{ asset('img/prd-3.jpg') }}>
                        <p class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none"
                                viewBox="0 0 24 24" stroke="white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </p>
                    </div>
                    <div class="mt-10 pl-2 mb-2 flex justify-between ">
                        <div>
                            <p class="text-lg font-semibold mb-0">Butterball Pumpkin <br /> Spice Frappe</p>
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
                            <p class="text-md text-yellow-900 mt-4">₱205.00</p>
                        </div>
                        <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                fill="none" viewBox="0 0 24 24" stroke="black">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div
                    class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2  mx-4 my-4 cursor-pointer">
                    <div class="overflow-x-hidden rounded-2xl relative">
                        <img class="mx-auto h-36 rounded-2xl w-36" src={{ asset('img/prd-1.jpg') }}>
                        <p class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none"
                                viewBox="0 0 24 24" stroke="white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </p>
                    </div>
                    <div class="mt-10 pl-2 mb-2 flex justify-between ">
                        <div>
                            <p class="text-lg font-bold mb-0">Hot Butterbal Pumpkin <br /> Spice Latte</p>
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
                            <p class="text-md text-yellow-900 mt-4">₱195.00</p>
                        </div>
                        <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                fill="none" viewBox="0 0 24 24" stroke="black">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div
                    class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2  mx-4 my-4 cursor-pointer">
                    <div class="overflow-x-hidden rounded-2xl relative">
                        <img class="mx-auto h-36 rounded-2xl w-36" src={{ asset('img/prd-2.jpg') }}>
                        <p class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none"
                                viewBox="0 0 24 24" stroke="white">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </p>
                    </div>
                    <div class="mt-10 pl-2 mb-2 flex justify-between ">
                        <div>
                            <p class="text-lg font-semibold mb-0">Iced Butterball <br /> Pumpkin Spice Latte</p>
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
                            <p class="text-md text-yellow-900 mt-4">₱205.00</p>
                        </div>
                        <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                fill="none" viewBox="0 0 24 24" stroke="black">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- First ads -->
                <div class="container px-5 py-5 mx-auto flex flex-wrap items-center justify-center">
                    <img src={{ asset('img/4.png') }} alt="ads">
                </div>

                <!-- Menu -->
                <div class="container p-4 mx-auto space-y-8">
                    <div class="space-y-2 text-center">
                        <h1 class="lg:text-3xl md:text-2xl font-bold uppercase">menu</h1>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <!--actual component start-->
                    <div x-data="setup()">
                        <ul class="flex justify-center items-center my-8 gap-4">
                            <template x-for="(tab, index) in tabs" :key="index">
                                <li class="cursor-pointer py-3 px-4 rounded-lg font-bold transition"
                                    :class="activeTab===index ? 'bg-yellow-900 text-white' : ' text-gray-500'"
                                    @click="activeTab = index" x-text="tab"></li>
                            </template>
                        </ul>
                        <div class="mx-auto">
                            <div x-show="activeTab===0">
                                <div class="container flex justify-center">
                                    <div class="glider-contain grid md:grid-cols-1 lg:grid-cols-1">
                                        <div class="glider">

                                            <div
                                                class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2  mx-4 my-4 cursor-pointer">
                                                <div class="overflow-x-hidden rounded-2xl relative">
                                                    <img class="mx-auto h-36 rounded-2xl w-36"
                                                        src={{ asset('img/prd-2.jpg') }}>
                                                    <p
                                                        class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-70" fill="none"
                                                            viewBox="0 0 24 24" stroke="white">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>
                                                    </p>
                                                </div>
                                                <div class="mt-10 pl-2 mb-2 flex justify-between ">
                                                    <div>
                                                        <p class="text-lg font-semibold mb-0">Iced Butterball <br />
                                                            Pumpkin Spice Latte</p>
                                                        <div class="flex item-center mt-2">
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                        </div>
                                                        <p class="text-md text-yellow-900 mt-4">₱205.00</p>
                                                    </div>
                                                    <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                                            fill="none" viewBox="0 0 24 24" stroke="black">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2  mx-4 my-4 cursor-pointer">
                                                <div class="overflow-x-hidden rounded-2xl relative">
                                                    <img class="mx-auto h-36 rounded-2xl w-36"
                                                        src={{ asset('img/prd-2.jpg') }}>
                                                    <p
                                                        class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-70" fill="none"
                                                            viewBox="0 0 24 24" stroke="white">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>
                                                    </p>
                                                </div>
                                                <div class="mt-10 pl-2 mb-2 flex justify-between ">
                                                    <div>
                                                        <p class="text-lg font-semibold mb-0">Iced Butterball <br />
                                                            Pumpkin Spice Latte</p>
                                                        <div class="flex item-center mt-2">
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                        </div>
                                                        <p class="text-md text-yellow-900 mt-4">₱205.00</p>
                                                    </div>
                                                    <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                                            fill="none" viewBox="0 0 24 24" stroke="black">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2  mx-4 my-4 cursor-pointer">
                                                <div class="overflow-x-hidden rounded-2xl relative">
                                                    <img class="mx-auto h-36 rounded-2xl w-36"
                                                        src={{ asset('img/prd-2.jpg') }}>
                                                    <p
                                                        class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-70" fill="none"
                                                            viewBox="0 0 24 24" stroke="white">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>
                                                    </p>
                                                </div>
                                                <div class="mt-10 pl-2 mb-2 flex justify-between ">
                                                    <div>
                                                        <p class="text-lg font-semibold mb-0">Iced Butterball <br />
                                                            Pumpkin Spice Latte</p>
                                                        <div class="flex item-center mt-2">
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                        </div>
                                                        <p class="text-md text-yellow-900 mt-4">₱205.00</p>
                                                    </div>
                                                    <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                                            fill="none" viewBox="0 0 24 24" stroke="black">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2  mx-4 my-4 cursor-pointer">
                                                <div class="overflow-x-hidden rounded-2xl relative">
                                                    <img class="mx-auto h-36 rounded-2xl w-36"
                                                        src={{ asset('img/prd-2.jpg') }}>
                                                    <p
                                                        class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-70" fill="none"
                                                            viewBox="0 0 24 24" stroke="white">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>
                                                    </p>
                                                </div>
                                                <div class="mt-10 pl-2 mb-2 flex justify-between ">
                                                    <div>
                                                        <p class="text-lg font-semibold mb-0">Iced Butterball <br />
                                                            Pumpkin Spice Latte</p>
                                                        <div class="flex item-center mt-2">
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                        </div>
                                                        <p class="text-md text-yellow-900 mt-4">₱205.00</p>
                                                    </div>
                                                    <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                                            fill="none" viewBox="0 0 24 24" stroke="black">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2  mx-4 my-4 cursor-pointer">
                                                <div class="overflow-x-hidden rounded-2xl relative">
                                                    <img class="mx-auto h-36 rounded-2xl w-36"
                                                        src={{ asset('img/prd-2.jpg') }}>
                                                    <p
                                                        class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-70" fill="none"
                                                            viewBox="0 0 24 24" stroke="white">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>
                                                    </p>
                                                </div>
                                                <div class="mt-10 pl-2 mb-2 flex justify-between ">
                                                    <div>
                                                        <p class="text-lg font-semibold mb-0">Iced Butterball <br />
                                                            Pumpkin Spice Latte</p>
                                                        <div class="flex item-center mt-2">
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                        </div>
                                                        <p class="text-md text-yellow-900 mt-4">₱205.00</p>
                                                    </div>
                                                    <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                                            fill="none" viewBox="0 0 24 24" stroke="black">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2  mx-4 my-4 cursor-pointer">
                                                <div class="overflow-x-hidden rounded-2xl relative">
                                                    <img class="mx-auto h-36 rounded-2xl w-36"
                                                        src={{ asset('img/prd-2.jpg') }}>
                                                    <p
                                                        class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-70" fill="none"
                                                            viewBox="0 0 24 24" stroke="white">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>
                                                    </p>
                                                </div>
                                                <div class="mt-10 pl-2 mb-2 flex justify-between ">
                                                    <div>
                                                        <p class="text-lg font-semibold mb-0">Iced Butterball <br />
                                                            Pumpkin Spice Latte</p>
                                                        <div class="flex item-center mt-2">
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                        </div>
                                                        <p class="text-md text-yellow-900 mt-4">₱205.00</p>
                                                    </div>
                                                    <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                                            fill="none" viewBox="0 0 24 24" stroke="black">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2  mx-4 my-4 cursor-pointer">
                                                <div class="overflow-x-hidden rounded-2xl relative">
                                                    <img class="mx-auto h-36 rounded-2xl w-36"
                                                        src={{ asset('img/prd-2.jpg') }}>
                                                    <p
                                                        class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-70" fill="none"
                                                            viewBox="0 0 24 24" stroke="white">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>
                                                    </p>
                                                </div>
                                                <div class="mt-10 pl-2 mb-2 flex justify-between ">
                                                    <div>
                                                        <p class="text-lg font-semibold mb-0">Iced Butterball <br />
                                                            Pumpkin Spice Latte</p>
                                                        <div class="flex item-center mt-2">
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                        </div>
                                                        <p class="text-md text-yellow-900 mt-4">₱205.00</p>
                                                    </div>
                                                    <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                                            fill="none" viewBox="0 0 24 24" stroke="black">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2  mx-4 my-4 cursor-pointer">
                                                <div class="overflow-x-hidden rounded-2xl relative">
                                                    <img class="mx-auto h-36 rounded-2xl w-36"
                                                        src={{ asset('img/prd-2.jpg') }}>
                                                    <p
                                                        class="absolute right-2 top-2 bg-yellow-900 rounded-full p-2 cursor-pointer group">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-70" fill="none"
                                                            viewBox="0 0 24 24" stroke="white">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>
                                                    </p>
                                                </div>
                                                <div class="mt-10 pl-2 mb-2 flex justify-between ">
                                                    <div>
                                                        <p class="text-lg font-semibold mb-0">Iced Butterball <br />
                                                            Pumpkin Spice Latte</p>
                                                        <div class="flex item-center mt-2">
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-black"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                            <svg class="w-5 h-5 fill-current text-gray-500"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" />
                                                            </svg>
                                                        </div>
                                                        <p class="text-md text-yellow-900 mt-4">₱205.00</p>
                                                    </div>
                                                    <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 group-hover:opacity-50 opacity-70"
                                                            fill="none" viewBox="0 0 24 24" stroke="black">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <span role="button" aria-label="Previous" class="glider-prev">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-10 w-10 text-yellow-900 hover:text-yellow-700"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span role="button" aria-label="Next" class="glider-next">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-10 w-10 text-yellow-900 hover:text-yellow-700"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div x-show="activeTab===1">Content 2</div>
                            <div x-show="activeTab===2">Content 3</div>
                            <div x-show="activeTab===3">Content 4</div>
                        </div>
                    </div>
                    <!--actual component end-->
                </div>

                @push('scripts')
                    <script>
                        function setup() {
                            return {
                                activeTab: 0,
                                tabs: [
                                    "FOODS",
                                    "DRINKS",
                                    "PASTRIES",
                                    "BEANS",
                                ]
                            };
                        };
                    </script>
                @endpush

                <!-- Second ads -->
                <div class="container px-10 py-5 mx-auto flex flex-wrap items-center justify-center">
                    <img src={{ asset('img/5.png') }} alt="ads">
                </div>

                <!-- What's new Section -->
                <div class="container p-4 mx-auto my-10 space-y-8">
                    <div class="space-y-2 text-center">
                        <h1 class="lg:text-3xl md:text-2xl font-bold uppercase">what's new?</h1>
                    </div>
                </div>


                <!-- Gallery Section -->
                <div class="container p-4 mx-auto my-4 space-y-8">
                    <div class="space-y-2 text-center">
                        <h1 class="lg:text-3xl md:text-2xl font-bold uppercase">our gallery</h1>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <div class="container px-5 py-2 mx-auto lg:pt-24 lg:px-32">
                        <div class="flex flex-wrap -m-1 md:-m-2">
                            <div class="flex flex-wrap w-1/2">
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block object-cover object-center w-full h-full rounded-lg"
                                        src={{ asset('img/gallery-3.jpg') }}>
                                </div>
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block object-cover object-center w-full h-full rounded-lg"
                                        src={{ asset('img/gallery-6.jpg') }}>
                                </div>
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block object-cover object-center w-full h-full rounded-lg"
                                        src={{ asset('img/gallery-1.jpg') }}>
                                </div>
                            </div>
                            <div class="flex flex-wrap w-1/2">
                                <div class="w-full p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block object-cover object-center w-full h-full rounded-lg"
                                        src={{ asset('img/gallery-2.jpg') }}>
                                </div>
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block object-cover object-center w-full h-full rounded-lg"
                                        src={{ asset('img/gallery-4.jpg') }}>
                                </div>
                                <div class="w-1/2 p-1 md:p-2">
                                    <img alt="gallery"
                                        class="block object-cover object-center w-full h-full rounded-lg"
                                        src={{ asset('img/gallery-5.jpg') }}>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Scroll to top --}}

                    <div x-data="topBtn">
                        <button @click="scrolltoTop" id="topButton"
                            class="fixed z-10 hidden p-3 text-white bg-yellow-900 rounded-full shadow-md bottom-10 right-10 animate-bounce">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18">
                                </path>
                            </svg>
                        </button>
                    </div>

                    <script>
                        document.addEventListener('alpine:init', () => {
                            Alpine.data('topBtn', () => ({
                                scrolltoTop() {
                                    document.body.scrollTop = 0;
                                    document.documentElement.scrollTop = 0;
                                }
                            }));
                        });

                        var topBtn = document.getElementById("topButton");
                        window.onscroll = function() {
                            (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) ?
                            topBtn.classList.remove("hidden"): topBtn.classList.add("hidden");

                        }
                    </script>

</x-ecommerce-layout>
