<!-- shop -->
<div class="shop-area pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-img">
                    <img id="zoompro" src="../assets/img/product/big/{{product.images[0].image}}" data-zoom-image="../assets/img/product/original/{{product.images[0].image}}" alt="zoom"/>
                    <div id="gallery" class="mt-12 product-dec-slider owl-carousel">
                        {% for img in product.images %}
                            <a data-image="../assets/img/product/big/{{img.image}}" data-zoom-image="../assets/img/product/original/{{img.image}}">
                                <img src="../assets/img/product/min/{{img.image}}" alt="">
                            </a>
                        {% endfor %}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product-details-content">
                    <h2>{{product.name}}</h2>
                    <div class="product-rating">
                        {% for i in 1..5 %}
                            {% if i <= product.rating %}
                                <i class="ti-star theme-color"></i>
                            {% else %}
                                <i class="ti-star"></i>
                            {% endif %}
                        {% endfor %}
                        <span> ( {{product.rating}} Customer Review )</span>
                    </div>
                    <div class="product-price">
                        <span class="new">${{product.price}}.00 </span>
                        {% if product.old_price%}
                            <span class="old">${{product.old_price}}.00</span>
                        {% endif %}
                    </div>
                    <div class="in-stock">
                        <span><i class="ion-android-checkbox-outline"></i> In Stock</span>
                    </div>
                    <div class="sku">
                        <span>SKU#: MS04</span>
                    </div>
                    <p>{{product.descr}}</p>
                    <div class="product-details-style shorting-style mt-30">
                        <label>color:</label>
                        <select>
                            <option value=""> Choose an option</option>
                            <option value=""> orange</option>
                            <option value=""> pink</option>
                            <option value=""> yellow</option>
                        </select>
                    </div>
                    <div class="quality-wrapper mt-30 product-quantity">
                        <label>Qty:</label>
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                        </div>
                    </div>
                    <div class="product-list-action">
                        <div class="product-list-action-left">
                            <a class="addtocart-btn" href="#" title="Add to cart">
                                <i class="ion-bag"></i>
                                Add to cart
                            </a>
                        </div>
                        <div class="product-list-action-right">
                            <a href="#" title="Wishlist">
                                <i class="ti-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="social-icon mt-30">
                        <ul>
                            <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-social-instagram"></i></a></li>
                            <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon-social-skype"></i></a></li>
                            <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- description -->
<div class="description-review-area pb-100">
    <div class="container">
        <div class="description-review-wrapper gray-bg pt-40">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">DESCRIPTION</a>
                <a data-toggle="tab" href="#des-details2">MORE INFORMATION</a>
                <a data-toggle="tab" href="#des-details3">REVIEWS ({{product.countComments}})</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        {{product.descr}}
                    </div>
                </div>
                <div id="des-details2" class="tab-pane">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            <li><span>name:</span> Scanpan Classic Covered</li>
                            <li><span>color:</span> orange , pink , yellow </li>
                            <li><span>size:</span> xl, l , m , sl</li>
                            <li><span>length:</span> 102cm, 110cm , 115cm </li>
                            <li><span>Brand:</span> Nike, Religion, Diesel, Monki </li>
                        </ul>
                    </div>
                </div>
                {% include 'main/product/_rating.php' %}
            </div>
        </div>
    </div>
</div>
<!-- related products -->
<div class="related-product-area pt-95 pb-80 gray-bg">
    <div class="container">
        <div class="section-title text-center mb-55">
            <h4>Most Populer</h4>
            <h2>Related Products</h2>
        </div>
        <div class="related-product-active owl-carousel">
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.html">
                        <img src="../assets/img/product/card/product-4.jpg" alt="">
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
                    <h4><a href="product-details.html">Dog Calcium Food</a></h4>
                    <div class="product-price">
                        <span class="new">$20.00 </span>
                        <span class="old">$50.00</span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.html">
                        <img src="../assets/img/product/card/product-5.jpg" alt="">
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
                    <h4><a href="product-details.html">Cat Buffalo Food</a></h4>
                    <div class="product-price">
                        <span class="new">$22.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.html">
                        <img src="../assets/img/product/card/product-6.jpg" alt="">
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
                    <h4><a href="product-details.html">Legacy Dog Food</a></h4>
                    <div class="product-price">
                        <span class="new">$50.00 </span>
                        <span class="old">$70.00</span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.html">
                        <img src="../assets/img/product/card/product-7.jpg" alt="">
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
                    <h4><a href="product-details.html">Chicken Dry Cat Food</a></h4>
                    <div class="product-price">
                        <span class="new">$60.00 </span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.html">
                        <img src="../assets/img/product/card/product-8.jpg" alt="">
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
                    <h4><a href="product-details.html">Stomach Dog Food</a></h4>
                    <div class="product-price">
                        <span class="new">$70.00 </span>
                        <span class="old">$90.00</span>
                    </div>
                </div>
            </div>
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.html">
                        <img src="../assets/img/product/card/product-9.jpg" alt="">
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
                    <h4><a href="product-details.html">Nourish Puppy Food</a></h4>
                    <div class="product-price">
                        <span class="new">$80.00 </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>