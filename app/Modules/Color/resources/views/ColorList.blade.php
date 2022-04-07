@extends('master')

@section('title')
	<title> Color | List </title>
@endsection

@section('content')
	{{-- <style>
		.w-5{
			display: none;
		}	
	</style> --}}

	<!-- Edit Modal -->
	<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel"> Edit Color</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <form action="{{ url('update-color') }}" method="POST">
	      	@csrf
	      	@method('PUT')
	      	
	      	<input type="hidden" name="color_id" id="color_id">
	      	<div class="modal-body">
	      		<div class="form-group mb-3">
	      			<label for="">Color Name</label>
	      			<input type="text" id="name" name="name" required class="form-control">
	      			<span style="color: red">@error('name'){{$message}}@enderror</span>
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
	        <h5 class="modal-title" id="AddModalLabel"> Add Color</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <form action="{{ url('add-color') }}" method="POST">
	      	@csrf
	      	
	      	
	      	<div class="modal-body">
	      		<div class="form-group mb-3">
	      			<label for="">Color Name</label>
	      			<input type="text" id="name" name="name" required class="form-control">
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
	        <h5 class="modal-title" id="AddModalLabel"> Delete Color</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

	      <form action="{{ url('archive-color') }}" method="POST">
	      	@csrf
	      	@method('DELETE')
	      	
	      	<div class="modal-body">
	      		<div class="form-group mb-3">
	      			<p>Confirm to Delete Color ? </p>
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
	            <h1 class="m-0">Colors</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="/welcome">Home</a></li>
	              <li class="breadcrumb-item active">Colors</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->

	          @if(session('status'))
				    <div class="alert alert-success">{{session('status')}}</div>
			  @endif

	      </div><!-- /.container-fluid -->
	      <button type="button" class="btn btn-primary float-start" data-bs-toggle="modal" data-bs-target="#AddModal"><i class="fa fa-plus"></i> &nbsp; |  Add Color</button>
	      <a href=" {{ url('trash-color') }} ">
	      	<button class="btn btn-danger float-end" ><i class="fa fa-trash"></i> &nbsp; | Trash</button>
	      </a>
	    </div>
	    <!-- /.content-header -->

	    
	    <!-- Main content -->
	    <section class="content">
	    	@csrf

	    	{{-- paginate --}}
	    	{{-- <div class="container">
			    @foreach ($colors as $user)
			        {{ $user->name }}
			    @endforeach
			</div>
			 
			{{ $colors->links() }} --}}
			{{--end paginate --}}

			<table id="example">
				<thead>
					<tr align="center">
						<th> ID </th>
						<th> Name </th>
						<th> UserName </th>
						<th> Status </th>
						<th> Action </th>
					</tr>
				</thead>

				<tbody>
				@foreach($colors as $color)
					<tr align="center">
						<td>{{ $color['id'] }}</td>
						<td>{{ $color['name'] }}</td>
						<td>{{ $color['user_name'] }}</td>
						<td>
							@if($color->status == "Y")
								<input data-id="{{$color->id}}" class="toggle-class" type="checkbox" data-onstyle="info" data-offstyle="secondary" data-toggle="toggle" data-on="Active" data-off="InActive" checked>
							@else
								<input data-id="{{$color->id}}" class="toggle-class" type="checkbox" data-onstyle="info" data-offstyle="secondary" data-toggle="toggle" data-on="Active" data-off="InActive">
							@endif
						</td>
						<td>
							<button type="button" value="{{$color->id}}" class="btn btn-success editBtn "><i class="fas fa-edit"></i> &nbsp;Edit</button> &nbsp;&nbsp;
		        			<button type="button" value="{{$color->id}}" class="btn btn-danger archiveBtn "><i class="fas fa-archive"></i> &nbsp;&nbsp; Archive</button>
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

                // url = '{{ url("/") }}/changeStatusColor';
                url = '{{ url("changeStatusColor") }}';
                 
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

			$(document).on('click','.archiveBtn',function() {
				
				var color_id = $(this).val();
				//alert(color_id);
				$('#ArchiveModal').modal('show');
				$('#archiveid').val(color_id);

			});
			
			$(document).on('click','.editBtn', function(){
			
				var color_id = $(this).val();
				//alert(brand_id);
				$('#editModal').modal('show');

				$.ajax({
					type: "GET",
					url: "/edit-color/"+color_id,
					success: function (response) {
						// console.log(response.color.name);
						$('#name').val(response.color.name);
						$('#color_id').val(color_id);
					}
				});
			});
		});
	</script>
@endsection

