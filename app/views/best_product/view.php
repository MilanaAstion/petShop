<div class="container mt-3">
    <h1 class="text-center">Best Product</h1>
    
    <!-- content -->
    <div class="tab-content mt-3">
        <!-- info -->
        <div class="tab-pane fade show active" id="info">
            <h2 class="text-center">Info</h2>
            <a href="/admin/best/edit" class="btn btn-primary mb-3" role="button">Edit product</a>
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
                        <td>{{best.product.name}}</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <th>Price</th>
                        <td>{{best.product.price}}$</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <th>Old Price</th>
                        <td>
                            {% if best.product.old_price %}
                                {{best.product.old_price}}$
                            {% endif %}
                        </td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <th>Description</th>
                        <td>{{best.descr}}</td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <th>Image</th>
                        <th><img src="/assets/img/banner/{{ best.img }}" height="100px" alt=""></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
