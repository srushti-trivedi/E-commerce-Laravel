{{-- 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Color | List</title>
		<!-- bootstrap -->
	
	<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
	<script>
    	$(document).ready(function() {
		    $('#example').DataTable();
		} );
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <!-- datatable -->
    
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css"  />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

</head>
<body>
	@include('Admin.header')
	@include('Admin.slidebar');
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
	    <div class="content-header"> <!-- comment this line for no space -->
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Color List</h1>
	          </div>/.col
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="/welcome">Home</a></li>
	              <li class="breadcrumb-item"><a href="/color">Color</a></li>
	              <li class="breadcrumb-item active">Color List</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <section class="content">
	      <div class="container-fluid">
	      	
	      	<a class="btn btn-success" href="javascript:void(0)" style="float:" >Add Color</a>
	      	&nbsp;&nbsp;
	      	<a class="btn btn-danger" href="javascript:void(0)" style="float:right">Trash</a>
	      	<br><br>
	      	<table id="example" class="table table-striped table-bordered" style="width:100%">
	 			<thead>
	        		<tr>
	        			<th>Id</th>
	        			<th>UserID</th>
	        			<th>UserName</th>
	        			<th>Colors</th>
	        			<th>Status</th>
	        			<th>Actions</th>
	        		</tr>
	        	</thead>
	        @foreach($colors as $color)
	        	<tbody>
	        		<tr>
	        			<td> {{$color['id']}} </td>
		        		<td> {{$color['user_id']}} </td>
		        		<td> {{$color['user_name']}} </td>
		        		<td> {{$color['name']}} </td>
		        		<td>
							<input data-id="{{$color->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $color->status ? 'checked' : '' }}>
						</td>
		        		<td>
		        			<button type="button" class="btn btn-success">Edit</button> &nbsp;&nbsp;
		        			<button type="button" class="btn btn-danger">Delete</button>
		        		</td>
		        	</tr>
	        	</tbody>  
	        @endforeach
  		
	      	</table>
	      </div>
	  </section>




	</div>

	

	@include('Admin.footer')

	

	
	
</body>
</html> --}}