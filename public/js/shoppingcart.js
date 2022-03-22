$(function() {
    notic();
    show();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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
                            <label class="text-success fa-2x incressbtn" data-id=${i}><i class="fa-solid fa-circle-plus"></i></label>
                                <label>${v.qty}</label>
                            <label class="text-center text-danger fa-2x deletebtn" data-id=${i}><i class="fa-solid fa-circle-minus"></i></label>
                        </div>
                    </td>
                    <td class="total-col">${subtotal}</td>
                    <td class="remove-col"><button class="btn-remove reomvebtn" data-it=${i}><i
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

                    <button class="btn btn-outline-primary-2 btn-order btn-block checkoutbtn">CHECKOUT</button>
                    <a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                    SHOPPING</span></a>
            </div>
            `;
            $('#itemshowdata').html(itemtable);
            $('#itemshowtotal').html(itemtotals);

        }
    }
    $('tbody').on('click', '.incressbtn', function() {
        console.log('incressbtn');

        var id = $(this).data('id');
        var itemshop = localStorage.getItem('ecomshop');

        if (itemshop) {
            var itemarray = JSON.parse(itemshop);
            itemarray.forEach(function(v, i) {
                if (i == id) {
                    v.qty++;
                }
            });
            var itemstring = JSON.stringify(itemarray);
            localStorage.setItem('ecomshop', itemstring);
            show();
        }
    });
    $('tbody').on('click', '.deletebtn', function() {
        console.log('deletebtn');

        var id = $(this).data('id');
        var itemshop = localStorage.getItem('ecomshop');

        if (itemshop) {
            var itemarray = JSON.parse(itemshop);
            itemarray.forEach(function(v, i) {
                if (i == id) {
                    v.qty--;
                    if (v.qty == 0) {
                        itemarray.splice(i, 1);
                    }
                }
            });
            var itemstring = JSON.stringify(itemarray);
            localStorage.setItem('ecomshop', itemstring);
            show();
        }
    });
    $('tbody').on('click', '.reomvebtn', function() {
        var id = $(this).data('id');
        var itemshop = localStorage.getItem('ecomshop');

        if (itemshop) {
            var itemarray = JSON.parse(itemshop);
            itemarray.splice(id, 1);
        }
        var itemstring = JSON.stringify(itemarray);
        localStorage.setItem('ecomshop', itemstring);
        show();
    })
    $('#itemshowtotal').on('click', '.checkoutbtn', function() {

        var itemshop = localStorage.getItem('ecomshop');

        var itemarray = JSON.parse(itemshop);
        var location = $('#deliverylocation').val();

        // simplify your javascript – use .map() .reduce() and .filter()
        var total = itemarray.reduce(function(acc, row) {
            return acc + (row.price * row.qty);
        }, 0);
        // end simplify your javascript – use .map() .reduce() and .filter()

        // ajax comment
        $.ajax({
            url: "./orders",
            method: 'POST',
            data: {
                itemshop: itemshop,
                location: location,
                total: total,
            },
            success: function(response) {
                localStorage.clear();
                $('#ordersuccess').modal('show');
            }
        });
        // end ajax comment
    })
})
