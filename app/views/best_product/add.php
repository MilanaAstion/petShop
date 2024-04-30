<div class="container">
	<h1 class="text-center">Add best product {{product.name}}</h1>
	<p>Price: {{product.price}}</p>
	<p>Old price: {{product.old_price}}</p>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action="/admin/best/add" method="POST" enctype="multipart/form-data">
                <div class="form-group">
					<label for="time">Time</label>
					<input id="time" name="time" type="text" class="form-control">
				</div> 
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" name="descr" id="description" rows="3">{{product.descr}}</textarea>
				</div>
				<div class="form-group">
					<label for="image">Image</label>
					<input type="file" name="img" class="form-control-file" id="image">
				</div>
				<input type="hidden" value="{{product.id}}" name="prod_id">
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>
