<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DMS Admin Dashboard</title>
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/invoice.css')}}">
</head>
<body>
<div class="container">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="invoice-container">
                        <div class="invoice-header">
                            <!-- Row start -->
                            <div class="row gutters" id="pp">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="custom-actions-btns mb-5">
                                        <button class="btn btn-primary" id="print" onclick="printButton()">
                                            Print (Ctrl+P / Cmd+P)
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <a href="{{route('cart')}}" class="invoice-logo">
                                        Dream Mobile Shop
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <address class="text-right">
                                        {{Auth::user()->name}}
                                    </address>
                                </div>
                            </div>
                            <!-- Row end -->
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                    <div class="invoice-details">
                                        <address>
                                            <strong>Customer Details</strong><br>
                                            <span>{{$order->customer_name}}</span><br>
                                            <span>{{$order->customer_mobile_number}}</span><br>
                                            <span>{{$order->customer_email}}</span><br>
                                            <span>{{$order->customer_address}}</span>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                    <div class="invoice-details">
                                        <div class="invoice-num">
                                            <div>Invoice - #{{$order->id}}</div>
                                            <div>{{$order->created_at->format('D, d M Y h:i:s A')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                        <div class="invoice-body">
                            <!-- Row start -->
                            <div class="row gutters">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table custom-table m-0">
                                            <thead>
                                            <tr>
                                                <th>Brand</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Sub Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order->phones as $phone)
                                                <tr>
                                                    <td>
                                                        {{$phone->brand->name}}
                                                    </td>
                                                    <td>{{$phone->name}}</td>
                                                    <td>{{$phone->pivot->unit_price}}</td>
                                                    <td>{{$phone->pivot->quantity}}</td>
                                                    <td>{{$phone->pivot->sub_total}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="2">&nbsp;</td>
                                                <td colspan="2">
                                                    <h5 class="text-success"><strong>Grand Total</strong></h5>
                                                </td>
                                                <td>
                                                    <h5 class="text-success">
                                                        <strong>{{$order->total}}</strong></h5>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                        <div class="invoice-footer">
                            Thank you for your Business.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        function printButton() {
        var printButton = document.getElementById("pp");
        printButton.style.display = 'none';
        window.print();
        printButton.style.display = 'block';
        window.location.href = "{{route('cart')}}";
    }
</script>
</body>
</html>
