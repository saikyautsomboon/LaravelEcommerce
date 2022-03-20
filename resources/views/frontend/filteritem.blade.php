@extends('frontend.master'){{-- master.bladeမို့လို့masterခေါ်တာ --}}
@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">{{ $category->name }}<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('frontendpage') }}">Home</a></li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="products mb-3">
                        <div class="row justify-content-center">

                            @foreach($category->items as $item)
                            <div class="col-3 col-md-2 col-lg-2 col-xl-2">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="product.html">
                                            <img src="{{ asset($item->photo) }}" alt="Product image" class="product-image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">

                                        <h4 class="product-title"><a href="product.html">{{ $item->name }}</a></h4><!-- End .product-title -->
                                        {{-- <div class="product-cat">
                                            <a href="#">{{ $item->description }}</a>
                                        </div><!-- End .product-cat --> --}}

                                        @if ($item->discount > 0)
                                        <div class="product-price">
                                            <span class="new-price">{{ $item->price }} ks</span>
                                            <span class="old-price">Discount {{ $item->discount }}ks</span>
                                        </div><!-- End .product-price -->

                                        @else
                                        <div class="product-price">
                                            <span class="new-price">{{ $item->price }} ks</span>

                                        </div>
                                        @endif
                                        <div class="ratings-container">
                                            <span class="ratings-text">{{ $item->subcategory->name }}</span>
                                        </div><!-- End .rating-container -->

                                        {{-- <div class="product-nav product-nav-thumbs">
                                            <a href="#" class="active">
                                                <img src="assets/images/products/product-4-thumb.jpg" alt="product desc">
                                            </a>
                                            <a href="#">
                                                <img src="assets/images/products/product-4-2-thumb.jpg" alt="product desc">
                                            </a>

                                            <a href="#">
                                                <img src="assets/images/products/product-4-3-thumb.jpg" alt="product desc">
                                            </a>
                                        </div><!-- End .product-nav --> --}}
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                            @endforeach
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
