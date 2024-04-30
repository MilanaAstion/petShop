<div class="blog-area pb-70">
		    <div class="container">
		        <div class="section-title text-center mb-60">
                    <h4>Latest News</h4>
                    <h2>From Our Blog</h2>
                </div>
                <div class="row">
                    {% for blog in blogs %}
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-wrapper mb-30 gray-bg">
                                <div class="blog-img hover-effect">
                                    <a href="/blog/{{blog.id}}"><img alt="" src="/assets/img/blog/{{blog.img}}"></a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <ul>
                                            <li>By: <span>{{blog.author}}</span></li>
                                            <li>{{blog.date}}</li>
                                        </ul>
                                    </div>
                                    <h4><a href="blog-details.html">{{blog.title}}</a></h4>
                                </div>
                            </div>
                        </div>
                    {% endfor %}
                </div>
		    </div>
		</div>