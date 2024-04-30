<div class="container">
	<h1 class="text-center">Edit comment form</h1>
	<div class="row">
		<div class="col-6 mx-auto">
			<form action="/admin/comment/edit" method="POST">
				<div class="form-group">
					<label for="name">Name</label>
					<select name="state" class="form-select">
						<option value="0">Не проверено</option>
						<option value="1">Проверено</option>
					</select>
				</div>
                <input type="hidden" name="id" value="{{comment.id}}">
				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>
