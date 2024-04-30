   <!-- shopping-cart-area start -->
<div class="cart-main-area pt-95 pb-100">
    <div class="container">
        <h3 class="page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="/cart/update" method="POST">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for product in cart.products %}
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="/assets/img/product/min/{{product.photo.image}}" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="#">{{product.name}}</a></td>
                                        <td class="product-price-cart"><span class="amount">${{product.price}}.00</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="{{product.id}}" value="{{product.qty}}">
                                            </div>
                                        </td>
                                        <td class="product-subtotal">${{product.total_price}}.00</td>
                                        <td class="product-remove"><a href="/cart/delete/{{product.id}}"><i class="ti-trash"></i></a></td>
                                    </tr>
                               {% endfor %}
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="#">Continue Shopping</a>
                                    <button type="submit">Update Shopping Cart</button>
                                </div>
                                <div class="cart-clear">
                                    <a href="/cart/clear">Clear Shopping Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="cart-tax">
                            <h4 class="cart-bottom-title">Estimate Shipping And Tax</h4>
                            <div class="tax-wrapper">
                                <p>Enter your destination to get a shipping estimate.</p>
                                <div class="tax-select-wrapper">
                                    <div class="tax-select">
                                        <label>
                                            Country
                                        </label>
                                        <select id="country" class="email s-email s-wid">
                                            <option value="">Not select</option>
                                            {% for country in countries %}
                                                <option value="{{country.id}}" {{ country_id == country.id ? "selected" }}>{{country.name}}</option>
                                            {% endfor %}
                                        </select>
                                    </div>
                                    <div class="tax-select">
                                        <label>
                                            State/Province
                                        </label>
                                        <select id="region" class="email s-email s-wid">
                                            <option value="">Not select</option>
                                            {% for region in regions %}
                                                <option value="{{region.id}}" {{ state_id == region.id ? "selected" }}>{{region.name}}</option>
                                            {% endfor %}
                                        </select>
                                    </div>
                                    <div class="tax-select">
                                        <label>
                                            Zip/Postal Code
                                        </label>
                                        <input type="text" placeholder="1234567">
                                    </div>
                                    <button id="add_shipping" class="cart-btn-2" type="submit">Get A Quote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="discount-code-wrapper">
                            <h4 class="cart-bottom-title">DISCOUNT CODES</h4>
                            <div class="discount-code">
                                <p>Enter your coupon code if you have one.</p>
                                <form action="/cart/discont" method="POST">
                                    <input type="text" required="" name="code">
                                    <button class="cart-btn-2" type="submit">Get A Quote</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="grand-totall">
                            <span>Subtotal:   ${{cart.total_price}}.00</span>
                            <h5>Grand Total:   ${{cart.grand_price}}</h5>
                            <a href="#">Proceed To Checkout</a>
                            <p>Checkout with Multiple Addresses</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- let countries = document.querySelector("#country");
    countries.addEventListener("change", getRegionsCountry);
   function getRegionsCountry(){
    let country_id = countries.value;
    if(country_id){
        location.href = "/main/cart/" + country_id;
    }
    else{
        location.href = "/main/cart";
    }
   } -->

<script>
   

   let add_shipping = document.querySelector('#add_shipping');
   let region = document.querySelector("#region");
   add_shipping.addEventListener("click", setShipping);
   function setShipping(){
    let state_id = region.value;
    if(state_id){
        location.href = "/cart/shipping/" + state_id;
    }
    else{
        alert("Вы не выбрали город");
    }
   }
</script>