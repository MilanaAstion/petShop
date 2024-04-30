<div class="container">
	<h1 class="text-center">Main categories</h1>
	
	<!-- <a href="/admin/product/add" class="btn btn-primary mb-3" role="button">Add category</a> -->
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Image</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
		{% for cat in cats %}
			<tr>
				<th scope="row">{{loop.index}}</th>
				<td>
					<a href="/admin/category/{{cat.id}}">{{cat.name}}</a>	
				</td>
				
				<td>
                    <img src="/assets/img/category/{{cat.img}}" alt="" height="100px">
                </td>
				<td>
					<a href="#" class="btn-sm btn-danger">Delete</a>
					<a href="#" class="btn-sm btn-primary">Edit</a>
				</td>
			</tr>
		{% endfor %}
		</tbody>
	</table>
</div>