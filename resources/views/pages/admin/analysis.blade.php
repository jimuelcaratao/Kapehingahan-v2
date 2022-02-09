<x-admin-layout>
    @slot('header')
        Analysis
    @endslot
    <div class="container-fluid py-4">


        <div class="row">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Sales overview of {{ now()->year }}</h6>
                        {{-- <p class="text-sm mb-0">
                            <i class="fa fa-arrow-up text-success"></i>
                            <span class="font-weight-bold">4% more</span> in 2021
                        </p> --}}
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Popular Items</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>

                                @forelse ($popular_items as $popular_item)
                                    <tr>
                                        <td class="w-30">
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div>
                                                    <img src="{{ asset('storage/media/products/main_' . $popular_item->product->product_code . '_' . $popular_item->product->default_photo) }}"
                                                        alt="{{ $popular_item->product->default_photo }}"
                                                        style="width:50px;">
                                                </div>
                                                <div class="ms-4">
                                                    <p class="text-xs font-weight-bold mb-0">Product Code:</p>
                                                    <h6 class="text-sm mb-0">{{ $popular_item->product_code }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Product Name:</p>
                                                <h6 class="text-sm mb-0">
                                                    {{ $popular_item->product->product_name }}
                                                </h6>
                                            </div>
                                        </td>

                                        <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <p class="text-xs font-weight-bold mb-0">Category:</p>
                                                <h6 class="text-sm mb-0">
                                                    {{ $popular_item->product->category_name }}</h6>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="w-100">
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div class="text-center">
                                                    <p class="text-base font-weight-bold mb-0">No popular products as
                                                        of now</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Web Visits Per month</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line-web-visit" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <script>
            // collections
            var revenue_per_month = {!! json_encode($revenue_per_month->toArray(), JSON_HEX_TAG) !!};

            var ctx1 = document.getElementById("chart-line").getContext("2d");

            var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

            gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
            gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
            gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
            new Chart(ctx1, {
                type: "line",
                data: {
                    labels: [
                        @foreach ($revenue_per_month as $revenue)
                            "{{ \Carbon\Carbon::parse($revenue->created_at)->format('d M') }}",
                        @endforeach
                    ],
                    datasets: [{
                        label: "Sale",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#5e72e4",
                        backgroundColor: gradientStroke1,
                        borderWidth: 3,
                        fill: true,
                        data: [
                            @foreach ($revenue_per_month as $revenue)
                                {{ $revenue->price * $revenue->quantity }},
                            @endforeach
                        ],
                        maxBarThickness: 6

                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: '#fbfbfb',
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                color: '#ccc',
                                padding: 20,
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });


            // Web visits
            var user_per_week = {!! json_encode($user_per_week->toArray(), JSON_HEX_TAG) !!};
            var ctx2 = document.getElementById("chart-line-web-visit").getContext("2d");
            var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

            gradientStroke2.addColorStop(1, 'rgba(222, 98, 197, 0.2)');
            gradientStroke2.addColorStop(0.2, 'rgba(222, 98, 197, 0.0)');
            gradientStroke2.addColorStop(0, 'rgba(222, 98, 197, 0)');
            new Chart(ctx2, {
                type: "bar",
                data: {
                    labels: [
                        @foreach ($user_per_week as $user)
                            "{{ \Carbon\Carbon::parse($user->day)->format('d M') }}",
                        @endforeach
                    ],
                    datasets: [{
                        label: "visits",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#DE62C5",
                        backgroundColor: gradientStroke2,
                        borderWidth: 3,
                        fill: true,
                        data: [
                            @foreach ($user_per_week as $user)
                                {{ $user->users }},
                            @endforeach
                        ],
                        maxBarThickness: 6

                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            grid: {
                                drawBorder: false,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: '#fbfbfb',
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false,
                                drawOnChartArea: false,
                                drawTicks: false,
                                borderDash: [5, 5]
                            },
                            ticks: {
                                display: true,
                                color: '#ccc',
                                padding: 20,
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: 'normal',
                                    lineHeight: 2
                                },
                            }
                        },
                    },
                },
            });
        </script>
    @endpush
</x-admin-layout>
