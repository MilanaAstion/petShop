<div class="main-menu text-center">
                                <nav>
                                    <ul>
                                        <li>
											<a href="/">HOME</a>
										</li>
                                        <li class="mega-menu-position"><a href="shop-page.html">Food</a>
                                            <ul class="mega-menu">
                                                {% for cat in cats %}
                                                    <li>
                                                        <ul>
                                                            <li class="mega-menu-title">{{cat.name}}</li>
                                                            {% for sub_cat in cat.sub %}
                                                                <li><a href="/shop/{{sub_cat.id}}">{{sub_cat.name}}</a></li>
                                                            {% endfor %}
                                                        </ul>
                                                    </li>
                                                {% endfor %}
                                                <li>
                                                    <ul>
                                                        <li><a href="shop-page.html"><img alt="" src="../assets/img/banner/menu-img-4.jpg"></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/blogs/list">Blog</a>
                                        </li>
                                        <li><a href="about-us.html">ABOUT</a></li>
                                        <li><a href="contact.html">contact us</a></li>
                                        <li><a href="/admin/products">admin</a></li>
                                    </ul>
                                </nav>
                            </div>