
@extends('master')

@section('title')
	<title> Product | Trash </title>
@endsection

@section('content')

	<!-- Restore Modal -->
	<div class="modal fade" id="RestoreModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="AddModalLabel"> Restore Product</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <form action="{{ url('restore-product') }}" method="POST">
	      	@csrf
	      	
	      	
	      	<div class="modal-body">
	      		<div class="form-group mb-3">
	      			<p>Confirm to restore Product ? </p>
	      			<input type="hidden" id="restoreid" name="restoreid">
	      		</div>
	      	</div>
	      	<div class="modal-footer">
	      		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Yes, Restore</button>
		    </div>
	      </form>
	      
	    </div>
	  </div>
	</div>
	<!-- End Restore Modal -->

	<!-- Destory Modal -->
	<div class="modal fade" id="DestoryModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="AddModalLabel"> Permenet Delete Product</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <form action="{{ url('deleteTrash-product') }}" method="POST">
	      	@csrf
	      	@method('DELETE')
	      	
	      	<div class="modal-body">
	      		<div class="form-group mb-3">
	      			<p>Confirm to  Permenet Delete Product ? </p>
	      			<input type="hidden" id="destoryid" name="destoryid">
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
	<!-- End Destory Modal -->

	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Product Trash</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="/welcome">Home</a></li>
	              <li class="breadcrumb-item active"><a href="productlist">Product</a></li>
	              <li class="breadcrumb-item active">Trash</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->

	          @if(session('status'))
				    <div class="alert alert-success">{{session('status')}}</div>
			  @endif

	      </div><!-- /.container-fluid -->
	      <a href=" {{ url('productlist') }} ">
	      	<button type="button" class="btn btn-primary float-start"><i class="fas fa-reply"></i> &nbsp; |  Back</button>
	      </a>
	      <br>
	    </div>
	    <!-- /.content-header -->

	    
	    <!-- Main content -->
	    <section class="content">
	    	@csrf


			<table id="example" class="display" style="width:100%">
				<thead>
					<tr align="center">
						<th> ID </th>
						<th> Image </th>
						<th> Name </th>
						<th> UserName </th>
						<th> URL </th>
						<th> UPC </th>
						<th> Price </th>
						<th> Stock </th>
						<th> Propertise </th>
						{{-- <th> Status </th> --}}
						<th> Action </th>
					</tr>
				</thead>

				<tbody>
				@foreach($products as $product)
					<tr align="center">
						<td>{{ $product['id'] }}</td>
						<td rowspan="1" colspan="1">
							<img src="{{ asset('uploads/cover/'.$product->coverImg) }}" width="70px" height="70px" alt="Image"><br>
						</td>
						<td>{{ $product['name'] }}</td>
						<td>{{ $product['user_name'] }}</td>
						<td>{{ $product['url'] }}</td>
						<td>{{ $product['upc'] }}</td>
						<td>{{ $product['price'] }}</td>
						<td>{{ $product['stock'] }}</td>
						<td>
							Color : {{ $product['name'] }}<br>
							Catagory : {{ $product['brandname'] }}
						</td>
						{{-- <td>
							<input data-id="{{$product->id}}" class="toggle-class" type="checkbox" data-onstyle="dark" data-offstyle="light" data-toggle="toggle" data-on="Trash" data-off="InActive" checked>
						</td> --}}
						<td>
							<button type="button" value="{{$product->id}}" class="btn btn-success restoreBtn "><i class="fas fa-recycle"></i> &nbsp; Restore</button> &nbsp;&nbsp;
		        			<button type="button" value="{{$product->id}}" class="btn btn-danger destoryBtn "><i class="fa fa-trash"></i> &nbsp;&nbsp; Delete</button>
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
		    $('.toggle-class').change(function() {
		        var status = $(this).prop('checked') == true ? 'Y' : 'N'; 
		        var id = $(this).data('id'); 

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
		    })
	  	})
	</script>

	<script>
		$(document).ready(function(){

			$('#example').DataTable();
			
			$(document).on('click','.restoreBtn', function(){

				var product_id = $(this).val();
				// alert(product_id);
				$('#RestoreModal').modal('show');
				$('#restoreid').val(product_id);

			});

			$(document).on('click','.destoryBtn',function() {
				
				var product_id = $(this).val();
				//alert(product_id);
				$('#DestoryModal').modal('show');
				$('#destoryid').val(product_id);

			});
		});
	</script>
@endsection