
@extends('master')

@section('title')
	<title> Product | List </title>
@endsection

@section('content')
	<!-- Edit Modal -->
	{{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
	</div> --}}
	<!-- End Edit Modal -->

	<!-- Add Modal -->
	{{-- <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
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
	</div> --}}
	<!-- End Add Modal -->

	<!-- Delete Modal -->
	<div class="modal fade" id="ArchiveModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="AddModalLabel"> Delete Product</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <form action="{{ url('archive-product') }}" method="POST">
	      	@csrf
	      	@method('DELETE')
	      	
	      	<div class="modal-body">
	      		<div class="form-group mb-3">
	      			<p>Confirm to Delete Product ? </p>
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
	            <h1 class="m-0">Products</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="/welcome">Home</a></li>
	              <li class="breadcrumb-item active">Product</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->

	          @if(session('status'))
				    <div class="alert alert-success">{{session('status')}}</div>
			  @endif

	      </div><!-- /.container-fluid -->
	      <a href=" {{ url('productform') }} ">
	      	<button type="button" class="btn btn-primary float-start" data-bs-toggle="modal" data-bs-target="#AddModal"><i class="fa fa-plus"></i> &nbsp; |  Add Product</button>
	      </a>
	      <a href=" {{ url('trash-product') }} ">
	      	<button class="btn btn-danger float-end" ><i class="fa fa-trash"></i> &nbsp; | Trash</button>
	      </a>
	    </div>
	    
	    <!-- /.content-header -->

	    
	    <!-- Main content -->
	    <section class="content">
	    	@csrf

	    	<br><br>
			<table id="example">  
			{{-- <table  class="display" style="width:100%" > --}}
				<thead>
					<tr align="center">
						<th> ID </th>
						<th> Image</th>
						<th> Product Name </th>
						<th> UserName </th>
						<th> URL </th>
						<th> UPC </th>
						<th> Price </th>
						<th> Stock </th>
						<th> Propertise </th>
						{{-- <th> Description </th>
						<th> Color </th>
						<th> Catagory </th> --}}
						<th> Status </th>
						<th>Action</th>
						
					</tr>
				</thead>

				<tbody>
				@foreach($products as $product)
					<tr align="center">
						<td rowspan="1" colspan="1">{{ $product['id'] }}</td>
						<td rowspan="1" colspan="1">
							<img src="{{ asset('uploads/cover/'.$product->coverImg) }}" width="70px" height="70px" alt="Image"><br>
						</td>
						<td>{{ $product['product_name'] }}</td>
						<td>{{ $product['user_name'] }}</td>
						<td>{{ $product['url'] }}</td>
						<td>{{ $product['upc'] }}</td>          
						<td>{{ $product['price'] }}</td>
						<td>{{ $product['stock'] }}</td>
						<td>
							Color : {{ $product['name'] }}<br>
							Catagory : {{ $product['brandname'] }}
						</td>
						{{-- <td>{{ $product['description'] }}</td>
						<td>{{ $product['name'] }}</td>
						<td>{{ $product['brandname'] }}</td> --}}
						<td>
							@if($product->status == "Y")
								<input data-id="{{$product->id}}" class="status" type="checkbox" data-on="Active" data-off="InActive" data-toggle="toggle" checked>
							@else
								<input data-id="{{$product->id}}" class="status" type="checkbox" data-onstyle="info" data-offstyle="secondary" data-toggle="toggle" data-on="Active" data-off="InActive">
							@endif
						</td>
						<td>
							{{-- <button type="button" value="{{$product->id}}" class="btn btn-success editBtn "><i class="fas fa-edit"></i> &nbsp;Edit</button> &nbsp;&nbsp; --}}
							<a href="{{ url('edit-product/'.$product->id) }}" class="btn btn-success"><i class="fas fa-edit"></i> &nbsp;Edit</a> &nbsp;&nbsp;
							
		        			<button type="button" value="{{$product->id}}" class="btn btn-danger archiveBtn "><i class="fas fa-archive"></i> &nbsp;&nbsp; Archive</button>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</section>
	</div>
@endsection

@section('listscript')
	<script>
        $(function() {
        	$('#example').DataTable();
        	$(document).on('click','.toggle-group',function(){
                var status = $(this).parent().find('.status').prop('checked') == true ? 'Y' : 'N'; 
                var id = $(this).parent().find('.status').data('id'); 

                // url = '{{ url("/") }}/changeStatusProduct';
                url = '{{ url("changeStatusProduct") }}';
                 
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: url,
                    data: {'status': status, 'id': id},
                    success: function(data){
                      console.log(data.success)
                    }
                });
            });

            $(document).on('click','.archiveBtn',function() {
				
				var product_id = $(this).val();
				//alert(product_id);
				$('#ArchiveModal').modal('show');
				$('#archiveid').val(product_id);
			});
			
			$(document).on('click','.editBtn', function(){
			
				var product_id = $(this).val();
				// alert(product_id);
				$('#editModal').modal('show');

				// $.ajax({
				// 	type: "GET",
				// 	url: "/edit-brand/"product_id,
				// 	success: function (response) {
				// 		//console.log(response.brand.brandname);
				// 		$('#brandname').val(response.brand.brandname);
				// 		$('#product_id').val(product_id);
				// 	}
				// });
			});
        })
    </script>
@endsection

