<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title> Brand | List </title>

	<!-- datatable -->
	<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
	
	<script>
    	$(document).ready(function() {
		    $('#example').DataTable();
		} );
    </script>
    
    {{-- css and js --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    {{-- end css and js --}}
	
    {{-- switch --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    {{-- end switch --}}

    {{-- modal --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	{{-- end modal --}}
    
</head>
<body>
	@include('Admin.header')
	@include('Admin.slidebar')

	<!-- Edit Modal -->
	<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel"> Edit Brand</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <form action="{{ url('update-brand') }}" method="POST">
	      	@csrf
	      	@method('PUT')
	      	
	      	<input type="hidden" name="brand_id" id="brand_id">
	      	<div class="modal-body">
	      		<div class="form-group mb-3">
	      			<label for="">Brand Name</label>
	      			<input type="text" id="brandname" name="brandname" required class="form-control">
	      		</div>
	      	</div>
	      	<div class="modal-footer">
	      		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Update</button>
		    </div>
	      </form>
	      
	    </div>
	  </div>
	</div>
	<!-- End Edit Modal -->

	<!-- Add Modal -->
	<div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="AddModalLabel"> Add Brand</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <form action="{{ url('add-brand') }}" method="POST">
	      	@csrf
	      	
	      	
	      	<div class="modal-body">
	      		<div class="form-group mb-3">
	      			<label for="">Brand Name</label>
	      			<input type="text" id="brandname" name="brandname" required class="form-control">
	      		</div>
	      	</div>
	      	<div class="modal-footer">
	      		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save</button>
		    </div>
	      </form>
	      
	    </div>
	  </div>
	</div>
	<!-- End Add Modal -->

	<!-- Delete Modal -->
	<div class="modal fade" id="ArchiveModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="AddModalLabel"> Delete Brand</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <form action="{{ url('archive-brand') }}" method="POST">
	      	@csrf
	      	@method('DELETE')
	      	
	      	<div class="modal-body">
	      		<div class="form-group mb-3">
	      			<p>Confirm to Delete Brand ? </p>
	      			<input type="hidden" id="archiveid" name="archiveid">
	      		</div>
	      	</div>
	      	<div class="modal-footer">
	      		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Yes, Delete</button>
		    </div>
	      </form>
	      
	    </div>
	  </div>
	</div>
	<!-- End Delete Modal -->

	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Brands</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="/welcome">Home</a></li>
	              <li class="breadcrumb-item active">Brand</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->

	          @if(session('status'))
				    <div class="alert alert-success">{{session('status')}}</div>
			  @endif

	      </div><!-- /.container-fluid -->
	      <button type="button" class="btn btn-primary float-start" data-bs-toggle="modal" data-bs-target="#AddModal"><i class="fa fa-plus"></i> &nbsp; |  Add Brand</button>
	      <a href=" {{ url('trash-brand') }} ">
	      	<button class="btn btn-danger float-end" ><i class="fa fa-trash"></i> &nbsp; | Trash</button>
	      </a>
	    </div>
	    <!-- /.content-header -->

	    
	    <!-- Main content -->
	    <section class="content">
	    	@csrf


			<table id="example" class="display" style="width:100%">
				<thead>
					<tr>
						<th> ID </th>
						<th> Name </th>
						<th> UserName </th>
						<th> Status </th>
						<th> Action </th>
					</tr>
				</thead>

				<tbody>
				@foreach($brands as $brand)
					<tr>
						<td>{{ $brand['id'] }}</td>
						<td>{{ $brand['brandname'] }}</td>
						<td>{{ $brand['user_name'] }}</td>
						<td>
							<input data-id="{{$brand->id}}" class="toggle-class" type="checkbox" data-onstyle="info" data-offstyle="secondary" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $brand->status ? 'checked' : '' }}>
						</td>
						<td>
							<button type="button" value="{{$brand->id}}" class="btn btn-success editBtn "><i class="fas fa-edit"></i> &nbsp;Edit</button> &nbsp;&nbsp;
		        			<button type="button" value="{{$brand->id}}" class="btn btn-danger archiveBtn "><i class="fas fa-archive"></i> &nbsp;&nbsp; Archive</button>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</section>
	</div>


@include('Admin.footer')
</body>

<script>
	$(function() {
	    $('.toggle-class').change(function() {
	        var status = $(this).prop('checked') == true ? 'Y' : 'N'; 
	        var id = $(this).data('id'); 

	        url = '{{ url("/") }}/changeStatus';
	         
	        $.ajax({
	            type: "GET",
	            dataType: "json",
	            url: url,
	            data: {'status': status, 'id': id},
	            success: function(data){
	              console.log(data.success)
	            }
	        });
	    })
  	})
</script>

<script>
	$(document).ready(function(){

		$(document).on('click','.archiveBtn',function() {
			
			var brand_id = $(this).val();
			//alert(brand_id);
			$('#ArchiveModal').modal('show');
			$('#archiveid').val(brand_id);

		});
		
		$(document).on('click','.editBtn', function(){
		
			var brand_id = $(this).val();
			//alert(brand_id);
			$('#editModal').modal('show');

			$.ajax({
				type: "GET",
				url: "/edit-brand/"+brand_id,
				success: function (response) {
					//console.log(response.brand.brandname);
					$('#brandname').val(response.brand.brandname);
					$('#brand_id').val(brand_id);
				}
			});
		});
	});
</script>

</html>





