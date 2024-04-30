<!-- blog -->
<div class="blog-area pt-100 pb-100 clearfix">
    <div class="container">
        <div class="row">
            {% for blog in blogs %}
                <div class="col-lg-6 col-md-6">
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
        <div class="pagination-style text-center mt-20">
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
</div>
 
