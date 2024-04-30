<div class="container">
	<h1 class="text-center">Disconts</h1>
	
	<a href="/admin/discont/add" class="btn btn-primary mb-3" role="button">Add discont</a>
	
	<table class="table table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Code</th>
			<th scope="col">Values</th>
            <th scope="col">Date</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
		{% for discont in disconts %}
			<tr>
				<th scope="row">{{loop.index}}</th>
				<td>
					{{discont.code}}	
				</td>
				
				<td>
                    {{discont.value}}
                </td>
                <td>
                    {{discont.date}}
                </td>
				<td>
					<a href="/admin/discont/delete/{{discont.id}}" class="btn-sm btn-danger">Delete</a>
					<a href="/admin/discont/edit/{{discont.id}}" class="btn-sm btn-primary">Edit</a>
				</td>
			</tr>
		{% endfor %}
		</tbody>
	</table>
</div>