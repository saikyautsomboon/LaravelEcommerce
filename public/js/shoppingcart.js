$(document).ready(function() {
    notic();
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
})