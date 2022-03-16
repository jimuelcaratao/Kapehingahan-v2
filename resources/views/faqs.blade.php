<x-guest-layout>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="./assets/styles/styles.css" /> -->
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>

    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-jet-authentication-card-logo />
            </div>

            <body class="h-screen bg-blue-50">
                <main class="p-5 bg-light-blue">
                <div class="flex justify-center items-start my-2">
                    <div class="w-full sm:w-10/12 md:w-1/2 my-1">
                    <h2 class="text-xl font-semibold text-vnet-blue mb-2">FAQ - Order, Shipping, Etc.</h2>
                    <ul class="flex flex-col">
                        <li class="bg-white my-2 shadow-lg" x-data="accordion(1)">
                        <h2
                            @click="handleClick()"
                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                        >
                            <span>What is KapeHingahan?</span>
                            <svg
                            :class="handleRotate()"
                            class="fill-current text-yellow-900 h-6 w-6 transform transition-transform duration-500"
                            viewBox="0 0 20 20"
                            >
                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div
                            x-ref="tab"
                            :style="handleToggle()"
                            class="border-l-2 border-yellow-900 overflow-hidden max-h-0 duration-500 transition-all"
                        >
                            <p class="p-3 text-gray-900">
                                KapeHingahan is a capstone project made by four students from University of Caloocan City. A coffee
                                shop project that serves good quality concoctions of espresso-based drinks and mouth-watering food.
                                It aims to provide excellent coffee and gracious service creating memorable experience for people.
                            </p>
                        </div>
                        </li>
                        <li class="bg-white my-2 shadow-lg" x-data="accordion(2)">
                        <h2
                            @click="handleClick()"
                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                        >
                            <span>Who owns KapeHingahan?</span>
                            <svg
                            :class="handleRotate()"
                            class="fill-current text-yellow-900 h-6 w-6 transform transition-transform duration-500"
                            viewBox="0 0 20 20"
                            >
                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div
                            class="border-l-2 border-yellow-900 overflow-hidden max-h-0 duration-500 transition-all"
                            x-ref="tab"
                            :style="handleToggle()"
                        >
                            <p class="p-3 text-gray-900">
                                This project is developed by the students of University of Caloocan City. Lead by Eric Jimuel Caratao
                                (project manager and senior programmer), HJ Miranda (Web designer and front-end developer), Jeffrey
                                Barbara (Documentation) and Melmar Gallano (Web designer and junior programmer).
                            </p>
                        </div>
                        </li>
                        <li class="bg-white my-2 shadow-lg" x-data="accordion(3)">
                        <h2
                            @click="handleClick()"
                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                        >
                            <span>What are your store hours?</span>
                            <svg
                            :class="handleRotate()"
                            class="fill-current text-yellow-900 h-6 w-6 transform transition-transform duration-500"
                            viewBox="0 0 20 20"
                            >
                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div
                            class="border-l-2 border-yellow-900 overflow-hidden max-h-0 duration-500 transition-all"
                            x-ref="tab"
                            :style="handleToggle()"
                        >
                            <p class="p-3 text-gray-900">
                                KapeHingahan regular store hours are from 8:00 AM to 7:00 PM.
                            </p>
                        </div>
                        </li>
                        <li class="bg-white my-2 shadow-lg" x-data="accordion(4)">
                        <h2
                            @click="handleClick()"
                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                        >
                            <span>What should I order in KapeHingahan?</span>
                            <svg
                            :class="handleRotate()"
                            class="fill-current text-yellow-900 h-6 w-6 transform transition-transform duration-500"
                            viewBox="0 0 20 20"
                            >
                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div
                            class="border-l-2 border-yellow-900 overflow-hidden max-h-0 duration-500 transition-all"
                            x-ref="tab"
                            :style="handleToggle()"
                        >
                            <p class="p-3 text-gray-900">
                                Looking at Coffee Project’s menu can get overwhelming with the wide array of drinks and food
                                selections it offers. But we do encourage first-timers to try our best-sellers.
                            </p>
                        </div>
                        </li>
                        <li class="bg-white my-2 shadow-lg" x-data="accordion(5)">
                        <h2
                            @click="handleClick()"
                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                        >
                            <span>Do you deliver?</span>
                            <svg
                            :class="handleRotate()"
                            class="fill-current text-yellow-900 h-6 w-6 transform transition-transform duration-500"
                            viewBox="0 0 20 20"
                            >
                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div
                            class="border-l-2 border-yellow-900 overflow-hidden max-h-0 duration-500 transition-all"
                            x-ref="tab"
                            :style="handleToggle()"
                        >
                            <p class="p-3 text-gray-900">
                                KapeHingahan accepts deliveries through the website. Check it out.
                            </p>
                        </div>
                        </li>
                        <li class="bg-white my-2 shadow-lg" x-data="accordion(6)">
                        <h2
                            @click="handleClick()"
                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                        >
                            <span>Do you accept late night deliveries?</span>
                            <svg
                            :class="handleRotate()"
                            class="fill-current text-yellow-900 h-6 w-6 transform transition-transform duration-500"
                            viewBox="0 0 20 20"
                            >
                            <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                            </svg>
                        </h2>
                        <div
                            class="border-l-2 border-yellow-900 overflow-hidden max-h-0 duration-500 transition-all"
                            x-ref="tab"
                            :style="handleToggle()"
                        >
                            <p class="p-3 text-gray-900">
                                As of the moment, KapeHingahan doesn't accept late night deliveries because we do not have any
                                branches yet that's open for 24 hours.
                            </p>
                        </div>
                        </li>
                        <li class="bg-white my-2 shadow-lg" x-data="accordion(7)">
                            <h2
                                @click="handleClick()"
                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                            >
                                <span>What are your payment methods?</span>
                                <svg
                                :class="handleRotate()"
                                class="fill-current text-yellow-900 h-6 w-6 transform transition-transform duration-500"
                                viewBox="0 0 20 20"
                                >
                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                </svg>
                            </h2>
                            <div
                                class="border-l-2 border-yellow-900 overflow-hidden max-h-0 duration-500 transition-all"
                                x-ref="tab"
                                :style="handleToggle()"
                            >
                                <p class="p-3 text-gray-900">
                                    For all Coffee Project branches, we accept payments through:
                                </p>
                                <ul>
                                    <li>Cash</li>
                                    <li>Debit/Credit card</li>
                                    <li>AllEasy</li>
                                    <li>Lyka gems; and</li>
                                    <li>GCash</li>
                                </ul>
                                <p class="p-3 text-gray-900">
                                    For all Coffee Project branches, we accept payments through:
                                </p>
                                <ul>
                                    <li>Debit/Credit card</li>
                                    <li>AllEasy</li>
                                    <li>Lyka gems; and</li>
                                    <li>GCash</li>
                                </ul>
                            </div>
                            </li>
                    </ul>
                    <h4>*Note: Cash on Delivery could be available depending on which delivery channel you ordered through.
                        You can check our FAQs page for the complete list of our delivery partners.</h4>
                    </div>
                </div>
                </main>
            </body>
            <script>
                document.addEventListener('alpine:init', () => {
                Alpine.store('accordion', {
                    tab: 0
                });

                Alpine.data('accordion', (idx) => ({
                    init() {
                    this.idx = idx;
                    },
                    idx: -1,
                    handleClick() {
                    this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
                    },
                    handleRotate() {
                    return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
                    },
                    handleToggle() {
                    return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                    }
                }));
                })
            </script>


            {{-- <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                <h2>FAQs</h2>

                <h4>What is KapeHingahan? (Dropdown feature)</h4>
                <p>
                    KapeHingahan is a capstone project made by four students from University of Caloocan City. A coffee
                    shop project that serves good quality concoctions of espresso-based drinks and mouth-watering food.
                    It aims to provide excellent coffee and gracious service creating memorable experience for people.
                </p>

                <h4>Who owns Coffee Project? (Dropdown feature)</h4>
                <p>
                    his project developed by students of University of Caloocan City. Lead by Eric Jimuel Caratao
                    (project manager and senior programmer), HJ Miranda (Web designer and front-end developer), Jeffrey
                    Barbara (Documentation) and Melmar Gallano (Web designer and junior programmer).
                </p>

                <h4>What are your store hours? (Dropdown feature)</h4>
                <p>
                    KapeHingahan regular store hours are from 8:00 AM to 7:00 PM.
                </p>

                <h4>What should I order in Coffee Project? (Dropdown feature)</h4>
                <p>
                    Looking at Coffee Project’s menu can get overwhelming with the wide array of drinks and food
                    selections it offers. But we do encourage first-timers to try our best-sellers.
                </p>

                <h4>Do you deliver? (Dropdown feature)</h4>
                <p>
                    KapeHingahan accepts deliveries through the website. Check it out.
                </p>

                <h4>Do you accept late night deliveries? (Dropdown feature)</h4>
                <p>
                    As of the moment, KapeHingahan doesn't accept late night deliveries because we do not have any
                    branches yet that's open for 24 hours.
                </p>

                <h4>What are your payment methods? (Dropdown feature)</h4>
                <p>
                    For all Coffee Project branches, we accept payments through:
                </p>
                <ul>
                    <li>Cash</li>
                    <li>Debit/Credit card</li>
                    <li>AllEasy</li>
                    <li>Lyka gems; and</li>
                    <li>GCash</li>
                </ul>
                <p>
                    For all Coffee Project branches, we accept payments through:
                </p>
                <ul>
                    <li>Debit/Credit card</li>
                    <li>AllEasy</li>
                    <li>Lyka gems; and</li>
                    <li>GCash</li>
                </ul>


                <h4>*Note: Cash on Delivery could be available depending on which delivery channel you ordered through.
                    You can check our FAQs page for the complete list of our delivery partners.</h4>

            </div> --}}
        </div>
    </div>
</x-guest-layout>
