<div class="container">
	<h1 class="text-center">Add blog form</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action="/admin/blog/add" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name">Title</label>
					<input type="text" name="title" class="form-control">
				</div>
				<div class="form-group">
					<label for="name">Text</label>
					<textarea name="text"></textarea>
				</div>
				<div class="form-group">
					<label for="name">Image</label>
					<input type="file" name="image" class="form-control">
				</div>
				<div class="form-group">
					<label for="name">Author</label>
					<input type="text" name="author" class="form-control">
				</div>
				<div class="form-group">
					<label for="name">Date</label>
					<input type="date" name="date" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>
