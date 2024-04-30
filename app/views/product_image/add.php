<div class="container">
	<h1 class="text-center">Add product image form</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action="/admin/product/image/add" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="image">Image</label>
					<input type="file" name="img" class="form-control-file" id="image">
				</div>
				<input type="hidden" name="prod_id" value="{{prod_id}}">
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>
