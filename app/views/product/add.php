<div class="container">
	<h1 class="text-center">Add product form</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action="/admin/product/add" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control">
				</div>
                <div class="form-group">
					<label for="price">Price</label>
					<input id="price" name="price" type="text" class="form-control">
				</div>
                <div class="form-group">
                    <label for="cat">Category</label>
                    <select class="form-select" name="cat_id" id="cat">
                        <option selected>Not selected</option>
                        {% for cat in cats %}
                            <option disabled>{{cat.name}}</option>
                            {% for sub in cat.sub %}
                                <option value="{{sub.id}}">{{sub.name}}</option>
                            {% endfor %}
                        {% endfor %}
                    </select>
                </div>   
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" name="descr" id="description" rows="3"></textarea>
				</div>
				<div class="form-group">
					<label for="image">Image</label>
					<input type="file" name="img" class="form-control-file" id="image">
				</div>
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>
