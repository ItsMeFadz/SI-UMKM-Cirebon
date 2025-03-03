@extends('layouts.main')

@section('content')
    {{-- Header Container --}}
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Dashboard</h3>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="/dasboard">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Default</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Body Container --}}
    <div class="container-fluid general-widget">
        <div class="row">
            <div class="col-xl-6 proorders-xl-1">
                <div class="card">
                    <div class="card-body selling-card">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="sale-card">
                                    <div class="sale-date">
                                        <h4>Total Sale</h4><a href="order-history.html"><span
                                                class="txt-primary f-w-700">(See all sales)</span></a>
                                    </div><span class="f-w-700 f-14 pb-4">Jan 1,2024 - Jun 30,2022</span>
                                    <div class="sale-data">
                                        <ul>
                                            <li>
                                                <h4>$654.85K</h4>
                                                <div class="sale-value">
                                                    <svg>
                                                        <use href="{{ asset('assets/svg/icon-sprite.svg#drop-menu') }}">
                                                        </use>
                                                    </svg>
                                                    <div class="sales-value"><span class="txt-danger">95% </span><span>6
                                                            month before </span></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="latest-chart" id="latestSales-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 proorders-xl-2">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="header-top">
                            <h4>Summary </h4>
                            <div class="dropdown icon-dropdown setting-menu">
                                <button class="btn dropdown-toggle" id="userdropdown32" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg>
                                        <use href="{{ asset('assets/svg/icon-sprite.svg#setting') }}"> </use>
                                    </svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown32"><a
                                        class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                        href="#">Monthly</a><a class="dropdown-item" href="#">Yearly </a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 summary-card"><span class="f-w-700 f-14">Jan 1,2024 - Jun 30,2022</span>
                        <div class="summary-progressbar">
                            <ul>
                                <li>
                                    <div>
                                        <h4>$654.85K</h4><span>Summary</span>
                                    </div>
                                    <div class="progress-showcase">
                                        <div class="progress sm-progress-bar progress-border-primary">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 30%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h4>$34.5K</h4><span>Orders </span>
                                    </div>
                                    <div>
                                        <div class="progress sm-progress-bar progress-border-secondary">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 45%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h4>$3.86K</h4><span>Avg. Order Value </span>
                                    </div>
                                    <div>
                                        <div class="progress-showcase">
                                            <div class="progress sm-progress-bar progress-border-secondary">
                                                <div class="progress-bar" role="progressbar" style="width: 80%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h4>$3.86K</h4><span>Avg. Order Value</span>
                                    </div>
                                    <div>
                                        <div class="progress sm-progress-bar progress-border-secondary">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 65%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 box-col-12">
                <div class="card o-hidden">
                    <div class="card-header">
                        <h4>Monthly History</h4>
                    </div>
                    <div class="bar-chart-widget">
                        <div class="bottom-content card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div id="chart-widget4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
