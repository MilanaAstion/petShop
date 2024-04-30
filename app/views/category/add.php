<div class="container">
	<h1 class="text-center">Add category form</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action="/admin/category/add" method="POST">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control">
				</div>
                <input type="hidden" name="parent_id" value="{{parent_id}}">
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>
