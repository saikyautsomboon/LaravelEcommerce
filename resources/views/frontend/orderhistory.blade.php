@extends('frontend.master'){{-- master.bladeမို့လို့masterခေါ်တာ --}}
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Order History</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item active" aria-current="page">Order History</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $order->orderdate }}</td>
                                            <td>{{ $order->total }}</td>
                                            @if ($order->status == 0)
                                                <td>
                                                    <div class="btn-wrap">
                                                        <a href="#" class="btn btn-warning btn-round">Pending</a>
                                                    </div>
                                                </td>
                                            @elseif($order->status == 1)
                                                <td>
                                                    <a href="#" class="btn btn-danger btn-round">Cancel</a>
                                                </td>
                                            @else
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-round">Confirm</a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table><!-- End .table table-wishlist -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
    </main><!-- End .main -->
    <!-- Button trigger modal -->
@endsection
