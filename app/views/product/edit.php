<div class="container">
	<h1 class="text-center">Edit product form</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action="/admin/product/edit" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" value="{{product.name}}">
				</div>
                <div class="form-group">
					<label for="price">Price</label>
					<input id="price" name="price" type="text" class="form-control" value="{{product.price}}">
				</div>
                <div class="form-group">
					<label for="price">Old price</label>
					<input id="old_price" name="old_price" type="text" class="form-control" value="{{product.old_price}}">
				</div>
                <div class="form-group">
                    <label for="cat">Category</label>
                    <select class="form-select" name="cat_id" id="cat">
                        {% for cat in cats %}
                            <option disabled>{{cat.name}}</option>
                            {% for sub in cat.sub %}
                                {% if sub.id == product.cat_id %}
                                    <option selected value="{{sub.id}}">{{sub.name}}</option>
                                {% else %}
                                    <option value="{{sub.id}}">{{sub.name}}</option>
                                {% endif %}
                            {% endfor %}
                        {% endfor %}
                    </select>
                </div>   
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" name="descr" id="description" rows="3">{{product.descr}}</textarea>
				</div>
				
                <input type="hidden" name="id" value="{{product.id}}">
				<button type="submit" class="btn btn-primary">Edit</button>
			</form>
		</div>
	</div>
</div>
