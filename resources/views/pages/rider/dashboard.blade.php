<x-rider-layout>
    @slot('header')
        Rider | Dashboard
    @endslot
    <div class="container-fluid pb-4 pt-2">
        <div class="row">
            <div class="col-12  mb-4">
                <div class="card">
                    <div class="card-body px-3 py-4">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <h2 class="font-bold text-lg md:text-4xl">{{ $dayTerm }},
                                        <span class="uppercase"></span>{{ Auth::user()->name }}
                                        👋
                                    </h2>
                                    <h5 class=" text-sm md:text-base">here is whats happening:</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Orders</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $orders_count_today }}
                                    </h5>
                                    {{-- <p class="mb-0">
                                        @if ($percentChangeOrder == 0)
                                            <span class="text-secondary text-sm font-weight-bolder">No Changes since
                                                Yesterday</span>
                                        @else
                                            @if ($more_less1 == 1)
                                                <span
                                                    class="text-success text-sm font-weight-bolder">+{{ round($percentChangeOrder, 1) }}%</span>
                                            @else
                                                <span
                                                    class="text-danger text-sm font-weight-bolder">-{{ round($percentChangeOrder, 1) }}%</span>
                                            @endif

                                            since last month
                                        @endif
                                    </p> --}}
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">New Users</p>
                                    <h5 class="font-weight-bolder">
                                        {{-- {{ $new_users }} --}}
                                    </h5>
                                    {{-- <p class="mb-0">
                                        @if ($percentChange == 0)
                                            <span class="text-secondary text-sm font-weight-bolder">No Changes since
                                                Yesterday</span>
                                        @else
                                            @if ($more_less == 1)
                                                <span
                                                    class="text-success text-sm font-weight-bolder">+{{ round($percentChange, 1) }}%</span>
                                            @else
                                                <span
                                                    class="text-danger text-sm font-weight-bolder">-{{ round($percentChange, 1) }}%</span>
                                            @endif

                                            since last month
                                        @endif
                                    </p> --}}
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Products</p>
                                    <h5 class="font-weight-bolder">
                                        {{-- {{ $products_count }} --}}
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-secondary text-sm font-weight-bolder">
                                            {{-- {{ $products_count_low }} --}}
                                        </span>
                                        are low in stocks
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Sales</p>
                                    <h5 class="font-weight-bolder py-2">
                                        {{-- {{ $revenue_today }} --}}
                                    </h5>
                                    {{-- <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+5%</span> than last
                                        month
                                    </p> --}}
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-rider-layout>
