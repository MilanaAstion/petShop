<div class="product-view product-grid">
                        <div class="row">
                            {% for product in products %}
                                <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                                    <div class="product-wrapper mb-10">
                                        <div class="product-img">
                                            <a href="/product/{{ product.id }}">
                                                <img src="/assets/img/product/card/{{product.images[0].image}}" alt="">
                                            </a>
                                            <div class="product-action">
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                                    <i class="ti-plus"></i>
                                                </a>
                                                <a title="Add To Cart" href="#">
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
                                            <h4><a href="/product/{{ product.id }}">{{product.name}}</a></h4>
                                            <div class="product-price">
                                                <span class="new">${{product.price}}.00 </span>
                                                {% if product.old_price %}
                                                    <span class="old">${{product.old_price}}.00</span>
                                                {% endif %}
                                            </div>
                                        </div>
                                        <!-- list content -->
                                        <div class="product-list-content">
                                            <h4><a href="/product/{{ product.id }}">{{product.name}}</a></h4>
                                            <div class="product-price">
                                                <span class="new">${{product.price}}.00 </span>
                                            </div>
                                            <p>{{product.descr}}</p>
                                            <div class="product-list-action">
                                                <div class="product-list-action-left">
                                                    <a class="addtocart-btn" title="Add to cart" href="#"><i class="ion-bag"></i> Add to cart</a>
                                                </div>
                                                <div class="product-list-action-right">
                                                    <a title="Wishlist" href="#"><i class="ti-heart"></i></a>
                                                    <a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ti-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {% endfor %}
                        </div>
                        <!-- pagination -->
                        <div class="pagination-style text-center mt-10">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-arrow-left"></i></a>
                                </li>
                                <li>
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a class="active" href="#"><i class="icon-arrow-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>