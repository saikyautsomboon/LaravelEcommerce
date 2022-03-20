$(document).ready(function() {
    notic();
    show();
    $('.addtocart').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var photo = $(this).data('photo');
        var price = $(this).data('price');
        var discount = $(this).data('discount');
        var description = $(this).data('description');
        var brandid = $(this).data('brand_id');
        var subcategoryid = $(this).data('subcategory_id');

        var items = {
            id: id,
            name: name,
            photo: photo,
            price: price,
            discount: discount,
            description: description,
            brandid: brandid,
            subcategoryid: subcategoryid,
            qty: 1,
        };

        var itemshop = localStorage.getItem('ecomshop');
        var myitem;

        if (itemshop == null) {
            myitem = [];
        } else {
            myitem = JSON.parse(itemshop);
        }
        var status = false;

        myitem.forEach(function(v, i) {
            if (v.id == id) {
                v.qty++;
                status = true;
            }
        });
        if (status == false) {
            myitem.push(items);
        }
        var itemstring = JSON.stringify(myitem);
        localStorage.setItem('ecomshop', itemstring);
        notic();
        show();
    })

    function notic() {
        var itemshop = localStorage.getItem('ecomshop');
        var total = 0;
        var subtotal = 0;
        var totalqty = 0;
        var itemtable = '';
        var itemtotalshow = '';

        if (itemshop) {
            var itemarray = JSON.parse(itemshop);



            itemarray.forEach(function(v, i) {
                subtotal += v.qty * v.price;
                total += subtotal;
                totalqty += v.qty;

                if (i == 0) {
                    itemtable += `
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.html">${v.name}</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                ${v.price} ks
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="${v.photo}" alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product">
                                        <i class="icon-close"></i></a>
                                    </div>
                    `;
                }

            });
            itemtotalshow += `
                <span>Total</span>

                <span class="cart-total-price">${total}</span>
            `;

            $('.count').html(totalqty);
            $('#showcartitem').html(itemtable);
            $('#itemtotal').html(itemtotalshow);
        } else {
            $('.count').html(totalqty);
        }

    }

    function show() {
        var itemshop = localStorage.getItem('ecomshop');

        var itemtable = '';
        var itemtotals = '';
        var total = 0;
        var subtotal = 0;
        var j = 1;


        if (itemshop) {
            var myitem = JSON.parse(itemshop);

            myitem.forEach(function(v, i) {
                subtotal = v.qty * v.price;
                total += subtotal;

                itemtable += `
                <tr>
                    <td>${j++}</td>
                    <td class="product-col">
                        <div class="product">
                            <figure class="product-media">
                                <img src="${v.photo}"alt="Product image">
                            </figure>
                        </div>
                    </td>
                    <td>
                        <h3 class="product-title">
                            <a href="#">${v.name}</a>
                        </h3>
                    </td>
                    <td class="price-col">${v.price} ks</td>
                    <td class="quantity-col">
                        <div class="cart-product-quantity">
                            <i class="fa-solid fa-circle-plus fa-xl"></i>
                                ${v.qty}
                            <i class="fa-solid fa-circle-minus fa-xl"></i>
                        </div>
                    </td>
                    <td class="total-col">${subtotal}</td>
                    <td class="remove-col"><button class="btn-remove"><i
                            class="icon-close"></i></button></td>
                </tr>
                `;
            });
            itemtotals += `
            <div class="summary summary-cart">
                <h3 class="summary-title">Cart Total</h3>

                    <table class="table table-summary">
                        <tbody>
                            <tr class="summary-total">
                                <td>Total:</td>
                                <td>${total} ks</td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO
                    CHECKOUT</a>
            </div>
            `;
            $('#itemshowdata').html(itemtable);
            $('#itemshowtotal').html(itemtotals);

        }
    }
})