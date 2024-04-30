<div class="container">
	<h1 class="text-center">Parent category {{cat.name}}</h1>
	
	<a href="/admin/category/add/{{cat.id}}" class="btn btn-primary mb-3" role="button">Add category</a>
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
		{% for sub in cat.sub %}
			<tr>
				<th scope="row">{{loop.index}}</th>
				<td>
					{{sub.name}}	
				</td>
				<td>
					<a href="/admin/category/delete/{{sub.id}}" class="btn-sm btn-danger">Delete</a>
					<a href="/admin/category/edit/{{sub.id}}" class="btn-sm btn-primary">Edit</a>
				</td>
			</tr>
		{% endfor %}
		</tbody>
	</table>
</div>