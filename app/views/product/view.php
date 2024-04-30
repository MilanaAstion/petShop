<div class="container mt-3">
    <h1 class="text-center">{{product.name}}</h1>
    <!-- nav -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#info">Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#images">Images</a>
        </li>
    </ul>
    
    <!-- content -->
    <div class="tab-content mt-3">
        <!-- info -->
        <div class="tab-pane fade show active" id="info">
            <h2 class="text-center">Info</h2>
            <a href="#" class="btn btn-primary mb-3" role="button">Edit product</a>
            {% if product.popular%}
                <a href="/admin/popular/delete/{{product.id}}" class="btn btn-danger mb-3" role="button">Delete popular</a>
            {% else %}
                <a href="/admin/popular/add/{{product.id}}" class="btn btn-primary mb-3" role="button">Add popular</a>
            {% endif %}
            <a href="/admin/best/add/{{product.id}}" class="btn btn-primary mb-3" role="button">Add best product</a>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <th>Name</th>
                        <td>{{product.name}}</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <th>Category</th>
                        <td>{{product.cat.name}}</td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <th>Price</th>
                        <td>{{product.price}}$</td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <th>Old Price</th>
                        <td>
                            {% if product.old_price %}
                                {{product.old_price}}$
                            {% endif %}
                        </td>
                    </tr>
                    <tr>
                        <th>6</th>
                        <th>Popular product</th>
                        <td>
                            {% if product.popular %}
                                добавлен
                            {% else %}
                                не добавлен
                            {% endif %}
                        </td>
                    </tr>
                    <tr>
                        <th>7</th>
                        <th>Description</th>
                        <td>{{product.descr}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Images -->
        <div class="tab-pane fade" id="images">
            <h2 class="text-center">Images Product</h2>
            <a href="/admin/product/image/add/{{product.id}}" class="btn btn-primary mb-3" role="button">Add Image</a>

            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    {% for img in product.images %}
                        <tr>
                            <th scope="row">{{ loop.index }}</th>
                            <td>
                                <img src="/assets/img/product/card/{{img.image}}">
                            </td>
                            <td>
                                <a href="/admin/product/image/delete/{{img.id}}" class="btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
</div>
