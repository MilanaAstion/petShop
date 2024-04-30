<div class="deal-area bg-img pt-95 pb-100">
            <div class="container">
                <div class="section-title text-center mb-50">
                    <h4>Best Product</h4>
                    <h2>Deal of the Week</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="deal-img wow fadeInLeft">
                            <a href="#"><img src="../assets/img/banner/{{ best.img }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="deal-content">
                            <h3><a href="#">{{ best.product.name }}</a></h3>
                            <div class="deal-pro-price">
                                <span class="deal-old-price">${{ best.product.old_price }}.00 </span>
                                <span> ${{ best.product.price }}.00</span>
                            </div>
                            <p>{{ best.descr }}</p>
                            <div class="timer timer-style">
                                <div data-countdown="{{ best.time }}"></div>
                            </div>
                            <div class="discount-btn mt-35">
                                <a class="btn-style" href="#">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>