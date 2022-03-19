@foreach ($items as $item)
    <div class="col-4 col-md-4 col-lg-3">
        <div class="product product-2">
            <figure class="product-media">
                <span class="product-label label-circle label-sale">Sale</span>
                <a href="product.html">
                    <img src='{{ asset($item->photo) }}' alt="Product image" class="product-image">
                </a>

                <div class="product-action-vertical">
                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                </div>
                <!-- End .product-action -->

                <div class="product-action">
                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to
                            cart</span></a>
                    <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick
                            view</span></a>
                </div>
                <!-- End .product-action -->
            </figure>
            <!-- End .product-media -->

            <div class="product-body">
                <div class="product-cat">
                    <a href="#">{{ $item->subcategory->name }}</a>
                </div>
                <!-- End .product-cat -->
                <h3 class="product-title"><a href="product.html">{{ $item->description }}</a>
                </h3>
                <!-- End .product-title -->
                @if ($item->discount > 0)
                    <div class="product-price">
                        <span class="new-price">{{ $item->price }} ks</span>
                        <span class="old-price">Discount {{ $item->discount }}ks</span>
                    </div>
                @else
                    <div class="product-price">
                        <span class="new-price">{{ $item->price }} ks</span>

                    </div>
                @endif
                <!-- End .product-price -->
                <!-- End .rating-container -->

                <div class="product-nav product-nav-dots">
                    <a href="#" class="active" style="background: #666666;"><span class="sr-only">Color
                            name</span></a>
                    <a href="#" style="background: #ff887f;"><span class="sr-only">Color
                            name</span></a>
                    <a href="#" style="background: #6699cc;"><span class="sr-only">Color
                            name</span></a>
                    <a href="#" style="background: #f3dbc1;"><span class="sr-only">Color
                            name</span></a>
                    <a href="#" style="background: #eaeaec;"><span class="sr-only">Color
                            name</span></a>
                </div>
                <!-- End .product-nav -->
            </div>
            <!-- End .product-body -->
        </div>
        <!-- End .product -->
    </div>
@endforeach
