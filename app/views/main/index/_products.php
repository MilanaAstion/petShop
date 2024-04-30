<div class="product-area pt-95 pb-70 gray-bg">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h4>Most Populer</h4>
                    <h2>Recent Products</h2>
                </div>
                <div class="row">
                    {% for product in products %}
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="product-wrapper mb-10">
                                <div class="product-img">
                                    <a href="/product/{{product.id}}">
                                        <img src="../assets/img/product/card/{{product.images[0].image}}" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a data-prod_id="{{product.id}}" id="quick-view" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                            <i class="ti-plus"></i>
                                        </a>
                                        <a title="Add To Cart" href="/cart/add/{{product.id}}">
                                            <i class="ti-shopping-cart"></i>
                                        </a>
                                    </div>
                                    <div class="product-action-wishlist">
                                        <a title="Wishlist" href="#">
                                            <i class="ti-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">{{product.name}}</a></h4>
                                    <div class="product-price">
                                        <span class="new">${{product.price}}.00 </span>
                                        {% if product.old_price %}
                                            <span class="old">${{product.old_price}}.00</span>
                                        {% endif %}
                                    </div>
                                </div>
                            </div>
                        </div>
                    {% endfor %}
                </div>
            </div>
        </div>