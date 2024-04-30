<div class="container">
	<h1 class="text-center">Edit best product form</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action="/admin/best/edit" method="POST" enctype="multipart/form-data">
                <div class="form-group">
					<label for="time">Time</label>
					<input id="time" name="time" type="text" class="form-control" value="{{best.time}}">
				</div> 
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" name="descr" id="description" rows="3">{{best.descr}}</textarea>
				</div>
				<div class="form-group">
					<label for="image">Image</label>
					<input type="file" name="img" class="form-control-file" id="image">
				</div>
				<button type="submit" class="btn btn-primary">Edit</button>
			</form>
		</div>
	</div>
</div>
