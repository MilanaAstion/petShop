<div class="container">
	<h1 class="text-center">Comments</h1>
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Title</th>
			<th scope="col">Text</th>
            <th scope="col">Author</th>
            <th scope="col">State</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
		{% for comment in comments %}
			<tr>
				<th scope="row">{{loop.index}}</th>
				<td>
					{{comment.blog.title}}	
				</td>
				<td>
					{{comment.text}}	
				</td>
				<td>
					{{comment.name}}	
				</td>
                <td>
					{{comment.stateName}}	
				</td>
				<td>
					<a href="/admin/comment/delete/{{comment.id}}" class="btn-sm btn-danger">Delete</a>
					<a href="#" class="btn-sm btn-primary check" id_comment="{{comment.id}}">Check</a>
				</td>
			</tr>
		{% endfor %}
		</tbody>
	</table>
</div>

<script>
	

	</script>