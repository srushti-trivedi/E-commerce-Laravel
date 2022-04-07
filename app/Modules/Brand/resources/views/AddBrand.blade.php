<!DOCTYPE html>
<html>
<head>
	<title> Brand | ADD</title>
	<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
	
	
</head>
<body>
	@include('Admin.header')
	@include('Admin.slidebar')
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Brand Add</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="/welcome">Home</a></li>
	              <li class="breadcrumb-item active">Brand</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <section class="content">
	    	<div class="container-fluid">
	    		<form action="add-brand" method="POST">
	    			@csrf

					<div class="row">
						<div class="col-9">
							<label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Brand Name</label>
						</div>
						<div class="col-9">
							<input type="text" class="form-control form-control-lg" id="brandname" name="brandname" placeholder="Enter Brand Name">
							<span style="color: red">@error('brandname'){{$message}}@enderror</span>
						</div>
					</div>
					<div class="row-6">
						<center>
							<div class="col-12">
								<br>
								<input type="submit" class="float-xl" name="Submit" value="Submit">
							</div>
						</center>
					</div>
					

					{{-- Name: <input type="text" id="brandname" name="brandname"><br>
					Status: <input type="text" id="status" name="status"><br> --}}
					{{-- <div class="input-group input-group-lg">
						<input type="submit" value="Submit">
					</div> --}}
				</form>
			</div>
		</section>
	</div>
	@include('Admin.footer')
</body>
</html>