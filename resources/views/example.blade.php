<!DOCTYPE html>
<html>
<head>
	<title> example file</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
	<center>
		<h1>
		Example welcome...!
		</h1>
		@csrf
		<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <form action="" method="POST">
		      	<div class="modal-body">
			        Name: <input type="text" id="name" name="name" value=""><br>
			    </div>
			    <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save changes</button>
			    </div>
		      </form> 
		    </div>
		  </div>
		</div>
		<table> 
			<thead>
				<tr>
					<th> ID </th>
					<th> Name </th>
					<th> Status </th>
					<th> Action </th>
				</tr>
			</thead>
			<tbody>
			@foreach($brands as $brand)
				<tr>
					<td>{{ $brand['id'] }}</td>
					<td>{{ $brand['brandname'] }}</td>
					<td>
						<input data-id="{{$brand->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $brand->status ? 'checked' : '' }}>
					</td>
					<td>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> &nbsp;&nbsp;
	        			<button type="button" class="btn btn-danger">Delete</button>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</center>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>


</html>