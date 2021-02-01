@extends('layouts.dashboard')

@section('body')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Create Invoice</h2>
                    </div>
                </div>
            </div>

        </div>

        @include('common.messages')
        <div class="content-body">

            @verbatim

            <div class="card" id="app">

                <div class="card-content">
                    <div class="card-body">


                        <form method="post" enctype="multipart/form-data">

                            <div class="row">


                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="saleman">Saleman:</label>
                                            <select ref="saleman" class="form-control" id="saleman" name="saleman">
                                                <option value="" disabled selected>select an option</option>
                                                <option v-for="saleman in salemans" v-bind:value="saleman.id">
                                                    {{ saleman.name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="product">Product:</label>
                                            <select @change="productChoosed" ref="product" v-model="selectedProduct" class="form-control" id="product" name="product">
                                            <option value="0" disabled selected>select an option</option>
                                            <option v-for="product in products" v-bind:value="product">
                                                {{ product.name }}
                                            </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="date">Date:</label>
                                            <input ref="date" class="form-control" id="date" name="date">

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12">


                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="width:10%" scope="col">#</th>
                                                <th style="width:40%" scope="col">Name</th>
                                                <th style="width:10%" scope="col">Quantity</th>
                                                <th style="width:10%" scope="col">Price</th>
                                                <th style="width:30%" scope="col">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr v-for="(p,index) in selectedProducts">
                                                <th>{{ index + 1 }}</th>
                                                <td>{{ p.name }}</td>
                                                <td >
                                                    <input v-bind:max="p.stockAvailable" type="number" @change="quantityUpdated(p,index,$event)" v-model.number="p.cartQuantity" class="form-control" name="quantity">
                                                </td>
                                                <td>{{ p.salePrice }}</td>
                                                <td> {{ p.cartQuantity }} * {{ p.salePrice }} = {{ p.salePrice * p.cartQuantity }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button ref="submitBtn" v-on:click="submitCart" type="button" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Submit</button>
                                </div>

                            </div>



                    </div>
                    </form>

                </div>
            </div>

            @endverbatim



        </div>



    </div>
</div>





@include('dashboard.pos.addEditJs')


@endsection

@section('pageend')
@include('common.sweetalert')
<script src="{{ asset("app-assets/vendors/js/forms/select/select2.full.min.js") }}" charset="utf-8"></script>
<script type="text/javascript">
    flatpickr('#date', {
        defaultDate: "{{ date('Y-m-d') }}"
    });
    var productSelect = $("#product").select2();

    productSelect.on('select2:select', function (e) {
      var event = new Event('change');
      e.target.dispatchEvent(event);
    });


    $(document)
</script>
@endsection
@section('headend')
<script src="{{ asset('mawaisnow/vue.js') }}" charset="utf-8"></script>
<script src="{{ asset('mawaisnow/axios.min.js') }}" charset="utf-8"></script>
<link rel="stylesheet" href="{!! asset('app-assets/css/pages/users.css') !!}">
<link rel="stylesheet" href="{!! asset('app-assets/vendors/css/forms/select/select2.min.css') !!}">
@endsection
