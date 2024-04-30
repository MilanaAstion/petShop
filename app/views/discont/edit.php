<div class="container">
	<h1 class="text-center">Edit discont form</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action="/admin/discont/edit" method="POST">
				<div class="form-group">
					<label for="name">Code</label>
					<input type="text" name="code" class="form-control" value="{{discont.code}}">
				</div>
				<div class="form-group">
					<label for="name">Value</label>
					<input type="text" name="value" class="form-control" value="{{discont.value}}">
				</div>
				<div class="form-group">
					<label for="name">Date</label>
					<input type="date" name="date" class="form-control" value="{{discont.date}}">
				</div>
				<input type="hidden" name="id" value="{{discont.id}}">
				<button type="submit" class="btn btn-primary">Edit</button>
			</form>
		</div>
	</div>
</div>
