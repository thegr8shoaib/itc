@extends('layouts.dashboard')

@section('body')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        @include('common.messages')
        <div class="content-body">
            <section class="vuexy-checkbox-sizes">
                <div class="row">






                    @if (superAdmin())
                      <div class="col-lg-4 col-sm-12 col-12">
                          <div class="card">
                              <div class="card-header d-flex align-items-start pb-0">
                                  <div>
                                      <h2 class="text-bold-700 mb-0">
                                          <a href="{{ route('pos.index') }}">{{ $profitToday }}</a>
                                      </h2>
                                      <p>Profit Today</p>
                                  </div>
                                  <div class="avatar bg-rgba-primary p-50 m-0">
                                      <div class="avatar-content">
                                          <i class="feather icon-database text-primary font-medium-5"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                    <div class="col-lg-4 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">
                                        <a href="{{ route('pos.index') }}">{{ $salesToday }}</a>
                                    </h2>
                                    <p>Sales Today</p>
                                </div>
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-shopping-cart text-primary font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">
                                        <a href="{{ route('pos.index') }}">{{ $salesThisMonth }}</a>
                                    </h2>
                                    <p>Sales This Month</p>
                                </div>
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-shopping-cart text-primary font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">
                                        <a href="{{ route('pos.index') }}">{{ $profitThisMonth }}</a>
                                    </h2>
                                    <p>Profit This Month</p>
                                </div>
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-database text-primary font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">
                                        <a href="{{ route('expence.index') }}">{{ $expenceThisMonth }}</a>
                                    </h2>
                                    <p>Expence This Month</p>
                                </div>
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-dollar-sign text-primary font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">
                                        <a href="{{ route('products.index') }}">{{$shortItems}}</a>
                                    </h2>
                                    <p>Short Items</p>
                                </div>
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-alert-octagon text-primary font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">
                                        <a href="{{ route('products.index') }}">{{ $totalStockAvailable }}</a>
                                    </h2>
                                    <p>Total Stock Available</p>
                                </div>
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-alert-octagon text-primary font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif







                </div>
            </section>
        </div>
    </div>
</div>

@endsection
