<div class="container">
	<h1 class="text-center">Edit category form</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action="/admin/category/edit" method="POST">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" value="{{cat.name}}">
				</div>
                <input type="hidden" name="id" value="{{cat.id}}">
				<button type="submit" class="btn btn-primary">Edit</button>
			</form>
		</div>
	</div>
</div>
