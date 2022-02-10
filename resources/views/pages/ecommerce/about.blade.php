<x-ecommerce-layout>

    <x-slot name="title">
        About |
    </x-slot>

    {{-- Logo --}}
    <div class="container px-10 py-5 mx-auto flex flex-wrap items-center justify-center">
        <img src={{ asset('img/logo.png') }} alt="ads">
        <p class="max-w-2xl mt-10 text-center dark:text-coolGray-400">KapeHingahan is a capstone project made by four
            students from University of Caloocan City. A coffee shop project that serves good quality concoctions of
            espresso-based drinks and mouth-watering food. It aims to provide excellent coffee and gracious service
            creating memorable experience for people.</p>
    </div>

    <!-- Team -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
        <div class="text-center pb-12">
            <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-900">
                Check our awesome team members
            </h1>
        </div>
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
    </div>

</x-ecommerce-layout>
