<x-ecommerce-layout>

                {{-- tailwind cdn --}}
                <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
                {{-- tailwind script --}}
                <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <x-slot name="title">
        About |
    </x-slot>

    {{-- Logo --}}
    <div class="container px-10 py-5 mx-auto flex flex-wrap items-center justify-center">
        <img src={{ asset('img/logo.png') }} alt="ads">
    </div>

    <div class="flex items-center justify-center">
        <p class="max-w-5xl mt-10 text-center text-black">KapeHingahan is a capstone project made by four
            students from University of Caloocan City. A coffee shop project that serves good quality concoctions of
            espresso-based drinks and mouth-watering food. It aims to provide excellent coffee and gracious service
            creating memorable experience for people.</p>
    </div>

    <!-- Team -->
    <div class="mb-16">
        <dh-component>
            <div class="container flex justify-center mx-auto pt-16">
                <div>
                    <h1 class="xl:text-4xl text-3xl text-center text-gray-800 font-extrabold pb-6 sm:w-full w-5/6 mx-auto">Check our awesome team members</span></h1>
                </div>
            </div>
            <div class="w-full bg-gray-100 px-10 pt-10">
                <div class="container mx-auto">
                    <div role="list" aria-label="Behind the scenes People " class="lg:flex md:flex sm:flex items-center justify-center md:justify-around flex-wrap ">
                        <div role="listitem" class="xl:w-1/4 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-2/5">
                            <div class="rounded overflow-hidden shadow-md bg-white">
                                <div class="absolute -mt-20 w-full flex justify-center">
                                    <div class="h-32 w-32">
                                        <img src={{ asset('img/team/team-1.jpg') }} alt="eric" role="img" class="rounded-full object-cover h-full w-full shadow-md" />
                                    </div>
                                </div>
                                <div class="px-6 mt-16">
                                    <h1 class="font-bold text-3xl text-center mb-1">Eric Jimuel Caratao</h1>
                                    <p class="text-gray-800 text-sm text-center">Software Manager</p>
                                    <p class="text-center text-gray-600 text-base pt-3 font-normal">The CEO's role in raising a company's corporate IQ is to establish an atmosphere that promotes knowledge sharing and collaboration.</p>
                                    <div class="w-full flex justify-center pt-5 pb-5">
                                        <a href="https://github.com/jimuelcaratao" class="mx-5">
                                            <div aria-label="Github" role="img">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                                                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="listitem" class="xl:w-1/4 lg:mx-3 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-2/5">
                            <div class="rounded overflow-hidden shadow-md bg-white">
                                <div class="absolute -mt-20 w-full flex justify-center">
                                    <div class="h-32 w-32">
                                        <img src={{ asset('img/team/team-2.jpg') }} alt="hj" role="img" class="rounded-full object-cover h-full w-full shadow-md" />
                                    </div>
                                </div>
                                <div class="px-6 mt-16">
                                    <h1 class="font-bold text-3xl text-center mb-1">HJ Miranda</h1>
                                    <p class="text-gray-800 text-sm text-center">Programmer</p>
                                    <p class="text-center text-gray-600 text-base pt-3 font-normal">The emphasis on innovation and technology in our companies has resulted in a few of them establishing global benchmarks in product design and development.</p>
                                    <div class="w-full flex justify-center pt-5 pb-5">
                                        <a href="https://github.com/Dxdiag14" class="mx-5">
                                            <div aria-label="Github" role="img">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                                                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="listitem" class="xl:w-1/4 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-2/5">
                            <div class="rounded overflow-hidden shadow-md bg-white">
                                <div class="absolute -mt-20 w-full flex justify-center">
                                    <div class="h-32 w-32">
                                        <img src={{ asset('img/team/team-3.jpg') }} alt="jeff" role="img" class="rounded-full object-cover h-full w-full shadow-md" />
                                    </div>
                                </div>
                                <div class="px-6 mt-16">
                                    <h1 class="font-bold text-3xl text-center mb-1">Jeffrey Barbara</h1>
                                    <p class="text-gray-800 text-sm text-center">System Analyst</p>
                                    <p class="text-center text-gray-600 text-base pt-3 font-normal">Our services encompass the assessment and repair of property damage caused by water, fire, smoke, or mold. We can also be a part of the restoration.</p>
                                    <div class="w-full flex justify-center pt-5 pb-5">
                                        <a href="javascript:void(0)" class="mx-5">
                                            <div aria-label="Github" role="img">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                                                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="listitem" class="xl:w-1/4 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-2/5">
                            <div class="rounded overflow-hidden shadow-md bg-white">
                                <div class="absolute -mt-20 w-full flex justify-center">
                                    <div class="h-32 w-32">
                                        <img src={{ asset('img/team/team-4.jpg') }} alt="melmy" role="img" class="rounded-full object-cover h-full w-full shadow-md" />
                                    </div>
                                </div>
                                <div class="px-6 mt-16">
                                    <h1 class="font-bold text-3xl text-center mb-1">Melmar Gallano</h1>
                                    <p class="text-gray-800 text-sm text-center">Web Designer</p>
                                    <p class="text-center text-gray-600 text-base pt-3 font-normal">An avid open-source developer who loves to be creative and inventive. I have 20 years of experience in the field.</p>
                                    <div class="w-full flex justify-center pt-5 pb-5">
                                        <a href="javascript:void(0)" class="mx-5">
                                            <div aria-label="Github" role="img">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                                                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </dh-component>
    </div>

    {{-- <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center">
                <div class="mb-8">
                    <img class="object-center object-cover rounded-full h-36 w-36"
                        src={{ asset('img/team/team-1.jpg') }} alt="team-1">
                </div>
                <div class="text-center">
                    <p class="text-xl text-gray-700 font-bold mb-2">Eric Jimuel Caratao</p>
                    <p class="text-base text-gray-400 font-normal">Software Manager</p>
                </div>
            </div>
            <div class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center">
                <div class="mb-8">
                    <img class="object-center object-cover rounded-full h-36 w-36"
                        src={{ asset('img/team/team-2.jpg') }} alt="team-2">
                </div>
                <div class="text-center">
                    <p class="text-xl text-gray-700 font-bold mb-2">HJ Miranda</p>
                    <p class="text-base text-gray-400 font-normal">Programmer</p>
                </div>
            </div>
            <div class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center">
                <div class="mb-8">
                    <img class="object-center object-cover rounded-full h-36 w-36"
                        src={{ asset('img/team/team-3.jpg') }} alt="team-3">
                </div>
                <div class="text-center">
                    <p class="text-xl text-gray-700 font-bold mb-2">Jeffrey Barbara</p>
                    <p class="text-base text-gray-400 font-normal">System Analyst</p>
                </div>
            </div>
            <div class="w-full bg-white rounded-lg p-12 flex flex-col justify-center items-center">
                <div class="mb-8">
                    <img class="object-center object-cover rounded-full h-36 w-36"
                        src={{ asset('img/team/team-4.jpg') }} alt="team-4">
                </div>
                <div class="text-center">
                    <p class="text-xl text-gray-700 font-bold mb-2">Melmar Gallano</p>
                    <p class="text-base text-gray-400 font-normal">Web Designer</p>
                </div>
            </div>

        </div>
    </div> --}}

</x-ecommerce-layout>
