<div class="container">
	<h1 class="text-center">Add discont form</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action="/admin/discont/add" method="POST">
				<div class="form-group">
					<label for="name">Code</label>
					<input type="text" name="code" class="form-control">
				</div>
				<div class="form-group">
					<label for="name">Value</label>
					<input type="text" name="value" class="form-control">
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
