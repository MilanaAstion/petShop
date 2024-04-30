<div class="container">
	<h1 class="text-center">Blog</h1>
	
	<a href="/admin/blog/add" class="btn btn-primary mb-3" role="button">Add blog</a>
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Title</th>
			<th scope="col">Image</th>
			<th scope="col">Author</th>
			<th scope="col">Data</th>
			<th scope="col">Comments</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
		{% for blog in blogs %}
			<tr>
				<th scope="row">{{loop.index}}</th>
				<td>
					<a href="/admin/blog/{{blog.id}}">{{blog.title}}</a>	
				</td>
				<td><img height="70px" src="/assets/img/blog/{{blog.img}}"></td>
				<td>{{blog.author}}</td>
				<td>{{blog.date}}</td>
				<td></td>
				<td>
					<a href="/admin/blog/delete/{{blog.id}}" class="btn-sm btn-danger">Delete</a>
					<a href="/admin/blog/edit/{{blog.id}}" class="btn-sm btn-primary">Edit</a>
				</td>
			</tr>
		{% endfor %}
		</tbody>
	</table>
</div>