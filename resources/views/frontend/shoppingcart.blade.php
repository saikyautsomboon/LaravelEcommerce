@extends('frontend.master'){{-- master.bladeမို့လို့masterခေါ်တာ --}}
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    <div class="row">
                        <div class=" @guest col-lg-12
@else
col-lg-9 @endguest">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>SubTotal</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody id='itemshowdata'>

                                </tbody>
                            </table><!-- End .table table-wishlist -->

                            <div class="">
                                <div class="">
                                    <form action="#">
                                        <textarea type="text" class="form-control" required placeholder="Enter Your Location to Delivery"
                                            id='deliverylocation' required validate></textarea>
                                    </form>
                                </div><!-- End .cart-discount -->
                                @guest
                                    <button class="btn btn-primary" type="submit">Login to Checkout</button>
                                @endguest
                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        @guest
                        @else
                            <aside class="col-lg-3" id='itemshowtotal'>
                            </aside><!-- End .col-lg-3 -->
                        @endguest
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="ordersuccess" tabindex="-1" aria-labelledby="ordersuccessLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ordersuccessLabel">Order Successfully</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your Product has been Order ! Wait Confirm by Admin
                </div>
                <div class="modal-footer">
                    <a hred="{{ route('homepage') }}" class="btn btn-primary">OK</a>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('script')

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.checkoutbtn').click(function() {
                var itemshop = localStorage.getItem('ecomshop');
                var location = 'keng tong';

                $.post(
                    "{{ route('orders.store') }}", {
                        itemshop: itemshop,
                        location: location
                    },
                    function(response) {
                        console.log(response);
                    });
            })
        })
    </script>
@endsection --}}
