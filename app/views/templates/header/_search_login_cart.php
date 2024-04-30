<div class="search-login-cart-wrapper">
                                <div class="header-search same-style">
                                    <button class="search-toggle">
                                        <i class="icon-magnifier s-open"></i>
                                        <i class="ti-close s-close"></i>
                                    </button>
                                    <div class="search-content">
                                        <form action="/search" method="POST">
                                            <input type="text" placeholder="Search" name="search">
                                            <button type="submit">
                                                <i class="icon-magnifier"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-login same-style">
                                    <a href="login-register.html"><i class="icon-user icons"></i></a>
                                </div>
                                <div class="header-cart same-style">
                                    <button class="icon-cart">
                                        <i class="icon-handbag"></i>
                                        {% if cart %}
                                            <span class="count-style">{{cart.total_qty}}</span>
                                        {% endif %}
                                    </button>
                                    {% if cart %}
                                        <div class="shopping-cart-content">
                                            <ul>
                                                {% for item in cart.products %}
                                                    <li class="single-shopping-cart">
                                                        <div class="shopping-cart-img">
                                                            <a href="#"><img alt="" src="/assets/img/product/min/{{item.photo.image}}"></a>
                                                        </div>
                                                        <div class="shopping-cart-title">
                                                            <h4><a href="#">{{item.name}}</a></h4>
                                                            <h6>Qty: {{item.qty}}</h6>
                                                            <span>${{item.total_price}}.00</span>
                                                        </div>
                                                        <div class="shopping-cart-delete">
                                                            <a href="/cart/delete/{{item.id}}"><i class="ti-close"></i></a>
                                                        </div>
                                                    </li>
                                                {% endfor %}
                                            </ul>
                                            <div class="shopping-cart-total">
                                                <h4>Shipping : <span>${{cart.shipping}}</span></h4>
                                                <h4>Total : <span class="shop-total">${{cart.total_price}}.00</span></h4>
                                            </div>
                                            <div class="shopping-cart-btn">
                                                <a href="main/cart">view cart</a>
                                                <a href="checkout.html">checkout</a>
                                            </div>
                                        </div>
                                    {% endif %}
                                </div>
                            </div>