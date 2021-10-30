<x-app-layout>


    <div class="flex flex-wrap  px-6 mx-0 md:mx-4 mb-4 md:mb-8 md:mb-6 md:mt-4">
        <div class="w-full px-6 py-8 bg-gradient-to-r from-blue-200 to-blue-300 rounded shadow-sm">
            <h2 class="font-bold text-lg md:text-3xl">{{ $dayTerm }}, <span
                    class="uppercase">{{ Auth::user()->name }}</span> 👋</h2>
            <h5 class=" text-sm md:text-base">here is whats happening:</h5>
        </div>
    </div>


    <div class="flex flex-wrap px-0 md:px-4 ">

        <div class="w-full md:w-1/2 xl:w-1/4 px-6 pb-4 ">
            <div
                class="bg-gradient-to-b from-purple-200 to-purple-100 border-b-4 border-purple-600 rounded p-4 shadow-md hover:shadow-xl transition delay-75">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-3 bg-purple-600">
                            <i class="fas fa-list-alt fa-lg fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-sm uppercase text-gray-600">New Orders</h5>
                        <h3 class="font-bold text-2xl">{{ $orders_count_today }} <span class="text-purple-600"></span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 xl:w-1/4 px-6 pb-4 ">
            <div
                class="bg-gradient-to-b from-purple-200 to-purple-100 border-b-4 border-purple-600 rounded p-4 shadow-md hover:shadow-xl transition delay-75">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-3 bg-purple-600">
                            <i class="fas fa-tasks  fa-lg fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-sm uppercase text-gray-600">Total Categories</h5>
                        <h3 class="font-bold text-2xl">2 <span class="text-purple-600"></span></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 xl:w-1/4 px-6 pb-4 ">
            <div
                class="bg-gradient-to-b from-purple-200 to-purple-100 border-b-4 border-purple-600 rounded p-4 shadow-md hover:shadow-xl transition delay-75">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-3 bg-purple-600">
                            <i class="fas fa-box-open fa-lg fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-sm uppercase text-gray-600">Products</h5>
                        <h3 class="font-bold text-2xl">{{ $products_count }} <span class="text-purple-600"></span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 xl:w-1/4 px-6 pb-4 ">
            <div
                class="bg-gradient-to-b from-purple-200 to-purple-100 border-b-4 border-purple-600 rounded p-4 shadow-md hover:shadow-xl transition delay-75">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-3 bg-purple-600"><i class="fas fa-user-plus fa-lg fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="font-bold text-sm uppercase text-gray-600">New Users</h5>
                        <h3 class="font-bold text-2xl">{{ $new_users }} <span class="text-purple-600"></span></h3>
                    </div>
                </div>
            </div>
        </div>

    </div>


    {{-- Charts --}}
    <div class="flex flex-row flex-wrap flex-grow">

        {{-- most populart products --}}
        <div class="w-full  xl:w-1/3 p-4 lg:pl-10">
            <div class="bg-white h-96 rounded p-5 shadow-md hover:shadow-xl transition delay-75">
                <h3 class="font-bold text-2xl">Most Popular Products</h3>
                @forelse ($popular_items as $popular_item)
                    <li>
                        {{ $popular_item->product->product_name }} - {{ $popular_item->product->product_code }}
                    </li>

                @empty

                @endforelse
            </div>
        </div>

        <div class="w-full  xl:w-2/3 p-4 lg:pr-10">
            <div class="bg-white h-96 rounded p-5 shadow-md hover:shadow-xl transition delay-75">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </div>

    <div class="flex flex-row flex-wrap flex-grow">

        <div class="w-full  xl:w-1/2 p-4 lg:pl-10">
            <div class="bg-white h-96 rounded p-5 shadow-md hover:shadow-xl transition delay-75">
                <div id="chartContainerVisits" style="height: 300px; width: 100%;"></div>
            </div>
        </div>

        <div class="w-full  xl:w-1/2 p-4 lg:pr-10">
            <div class="bg-white h-96 rounded p-5 shadow-md hover:shadow-xl transition delay-75">

            </div>
        </div>
    </div>


    @push('scripts')

        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

        <script type="text/javascript">
            // collections
            var revenue_per_month = {!! json_encode($revenue_per_month->toArray(), JSON_HEX_TAG) !!};
            var page_visits = {!! json_encode($page_visits->toArray(), JSON_HEX_TAG) !!};
            console.log(page_visits);
            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];
            const d = new Date();
            window.onload = function() {
                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    title: {
                        text: "KapeHingahan Revenue by month of " + monthNames[d.getMonth()]
                    },
                    axisY: {
                        title: "Revenue in PHP",
                        valueFormatString: "#0,.",
                        suffix: "k",
                        prefix: "₱"
                    },
                    data: [{
                        type: "splineArea",
                        color: "rgba(54,158,173,.7)",
                        markerSize: 5,
                        xValueFormatString: "YYYY-MM-DD",
                        yValueFormatString: "₱#,##0.##",
                        dataPoints: [
                            @foreach ($revenue_per_month as $revenue)
                                { x: new Date("{{ $revenue->created_at }}"), y: {{ $revenue->price * $revenue->quantity }} },
                            @endforeach
                        ]
                    }]
                });

                var chart2 = new CanvasJS.Chart("chartContainerVisits", {
                    animationEnabled: true,
                    title: {
                        text: "KapeHingahan Web Visits Per Day"
                    },
                    axisY: {
                        // title: "Revenue in PHP",
                        valueFormatString: "#0.",
                        // prefix: "₱"
                    },
                    data: [{
                        type: "splineArea",
                        color: "rgba(54,158,173,.7)",
                        markerSize: 5,
                        xValueFormatString: "YYYY-MM-DD",
                        yValueFormatString: "#,##0.##",
                        dataPoints: [
                            @foreach ($page_visits as $page_visit)
                                { x: new Date("{{ $page_visit->day }}"), y: {{ $page_visit->count }} },
                            @endforeach
                        ]
                    }]
                });
                chart.render();
                chart2.render();
            }
        </script>

    @endpush
</x-app-layout>
