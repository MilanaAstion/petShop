<!-- shop -->
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9 col-md-8">
                <div class="blog-details-wrapper res-mrg-top">
                    <div class="single-blog-wrapper">
                        <div class="blog-img mb-30">
                            <img src="/assets/img/blog/{{blog.img}}" alt="">
                        </div>
                        <div class="blog-details-content">
                            <h2>{{blog.title}}</h2>
                            <div class="blog-meta">
                                <ul>
                                    <li>{{blog.date}}</li>
                                    <li>
                                        <a href="#"> 02 Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprhendit in voluptate velit esse cillum dolore eu fugiat to nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qei officia deser mollit anim id est to laborum.</p>
                        <blockquote class="importent-title">
                            <h4>Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor incididunt labo dolor magna aliqua. Ut enim ad minim veniam quis nostrud.</h4>
                        </blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehendrit.</p>
                        <div class="dec-img-wrapper">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="dec-img">
                                        <img src="../assets/img/blog/blog-dec-img1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="dec-img dec-mrg res-mrg-top-2">
                                        <img src="../assets/img/blog/blog-dec-img2.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ull laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprhendit in voluptate velit esse cillum dolore eu fugiat to nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qei officia deser mollit anim id est to laborum.</p>
                        <div class="blog-dec-tags-social">
                            <div class="blog-dec-tags">
                                <ul>
                                    <li><a href="#">Dog</a></li>
                                    <li><a href="#">Cat</a></li>
                                    <li><a href="#">Fish</a></li>
                                </ul>
                            </div>
                            <div class="blog-dec-social">
                                <span>share :</span>
                                <ul>
                                    <li><a href="#"><i class="icon-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-social-instagram"></i></a></li>
                                    <li><a href="#"><i class="icon-social-dribbble"></i></a></li>
                                    <li><a href="#"><i class="icon-social-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-comment-wrapper mt-55">
                        <h4 class="blog-dec-title">comments : {{blog.countComments}}</h4>
                        {% for comment in blog.comments %}
                        <div class="single-comment-wrapper mt-35">
                            <div class="blog-comment-img">
                                <img src="/assets/img/blog/{{comment.image}}" alt="">
                            </div>
                            <div class="blog-comment-content">
                                <h4>{{comment.name}}</h4>
                                <span>{{comment.date}}</span>
                                <p>{{comment.text}}</p>
                                <div class="blog-details-btn">
                                    <a href="blog-details.html">read more</a>
                                </div>
                            </div>
                        </div>
                        {% endfor %}
                        
                    </div>
                    <div class="blog-reply-wrapper mt-50">
                        <h4 class="blog-dec-title">post a comment</h4>
                        <form action="/blog/comment/add/{{blog.id}}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="leave-form">
                                        <input type="text" placeholder="Full Name" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="leave-form">
                                        <input type="text" placeholder="Eail Address" name="email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-leave">
                                        <textarea placeholder="Massage" name="text"></textarea>
                                        <input type="submit" value="SEND MASSAGE">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="shop-sidebar blog-mrg">
                    <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Search Products</h4>
                        <div class="shop-search mt-25 mb-50">
                            <form class="shop-search-form">
                                <input type="text" placeholder="Find a product">
                                <button type="submit">
                                    <i class="icon-magnifier"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="shop-widget mt-50">
                        <h4 class="shop-sidebar-title">Food Category </h4>
                            <div class="shop-list-style mt-20">
                            <ul>
                                <li><a href="#">Canned Food</a></li>
                                <li><a href="#">Dry Food</a></li>
                                <li><a href="#">Food Pouches</a></li>
                                <li><a href="#">Food Toppers</a></li>
                                <li><a href="#">Fresh Food</a></li>
                                <li><a href="#">Frozen Food</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-50">
                        <h4 class="shop-sidebar-title">Top Brands </h4>
                            <div class="shop-list-style mt-20">
                            <ul>
                                <li><a href="#">Authority</a></li>
                                <li><a href="#">AvoDerm Natural</a></li>
                                <li><a href="#">Bil-Jac</a></li>
                                <li><a href="#">Blue Buffalo</a></li>
                                <li><a href="#">Castor & Pollux</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-50">
                        <h4 class="shop-sidebar-title">Tags </h4>
                            <div class="shop-list-style mt-20">
                            <ul>
                                <li><a href="#">Food </a></li>
                                <li><a href="#">Fish </a></li>
                                <li><a href="#">Dog </a></li>
                                <li><a href="#">Cat  </a></li>
                                <li><a href="#">Pet </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-50">
                        <h4 class="shop-sidebar-title">Health Consideration </h4>
                            <div class="shop-list-style mt-20">
                            <ul>
                                <li><a href="#">Bone Development <span>18</span></a></li>
                                <li><a href="#">Digestive Care <span>22</span></a></li>
                                <li><a href="#">General Health <span>19</span></a></li>
                                <li><a href="#">Hip & Joint  <span>41</span></a></li>
                                <li><a href="#">Immune System  <span>22</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-50">
                        <h4 class="shop-sidebar-title">Nutritional Option </h4>
                            <div class="shop-list-style mt-20">
                            <ul>
                                <li><a href="#">Grain Free  <span>18</span></a></li>
                                <li><a href="#">Natural <span>22</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-50">
                        <h4 class="shop-sidebar-title">Recent Post</h4>
                        <div class="recent-post-wrapper mt-25">
                            <div class="single-recent-post mb-20">
                                <div class="recent-post-img">
                                    <a href="#"><img src="../assets/img/blog/blog-s1.jpg" alt=""></a>
                                </div>
                                <div class="recent-post-content">
                                    <h4><a href="#">My Dog, Aren</a></h4>
                                    <span>April 19, 2018 </span>
                                </div>
                            </div>
                            <div class="single-recent-post mb-20">
                                <div class="recent-post-img">
                                    <a href="#"><img src="../assets/img/blog/blog-s2.jpg" alt=""></a>
                                </div>
                                <div class="recent-post-content">
                                    <h4><a href="#">My Dog, Tomy</a></h4>
                                    <span>April 19, 2018 </span>
                                </div>
                            </div>
                            <div class="single-recent-post mb-20">
                                <div class="recent-post-img">
                                    <a href="#"><img src="../assets/img/blog/blog-s3.jpg" alt=""></a>
                                </div>
                                <div class="recent-post-content">
                                    <h4><a href="#">My Dog, Suju</a></h4>
                                    <span>April 19, 2018 </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

