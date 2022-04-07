<!DOCTYPE html>
<html>
<head>
	<title> Color | Form</title>
	<style>
	.center {
	  
	  margin-right: 100px;
	  margin-left: 100px;
	  margin-bottom: 100px;
	  
	  width: 124%;
	  border: 3px solid #73AD21;
	  padding: 10px;
	}
</style>
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
	            <h1 class="m-0">Color Form</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="/welcome">Home</a></li>
	              <li class="breadcrumb-item active">Color</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <section class="content">
	      <div class="container-fluid">
	        <!-- Small boxes (Stat box) -->
	           
	              
	                <form action="{{ url('add-color') }}" method="POST">
	                	@csrf
	                	<br>

	                	<div class="row">
							<div class="col-9">
								<label for="colFormLabelLg" class="col-sm-3 col-form-label col-form-label-lg"><b> Color Name</b></label>
							</div>
							<div class="col-9">
								<input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter Color Name">
								<span style="color: red">@error('name'){{$message}}@enderror</span>
							</div>
						</div>
						<div class="row-6">
							<center>
								<div class="col-12">
									<br>
									<input type="submit" class="float-xl" name="submit" value="Submit">
								</div>
							</center>
						</div>
						
						{{-- <br><br>
						&nbsp;Status: &emsp;&emsp;&emsp;&emsp;
								<input type="radio" id="yes" name="status" value="Y" checked><label for="yes"> Yes </label>
								&nbsp;&nbsp;
								<input type="radio" id="no" name="status" value="N"><label for="no"> No </label>
								&nbsp;&nbsp;
								<input type="radio" id="trash" name="status" value="T"><label for="trash"> Trash</label> --}}
					</form>
	            </div>
	          </div>
	          <!-- ./col -->
	          

	          
	        </div>
	        <!-- /.row -->
	        <!-- Main row -->
	       
	        <!-- /.row (main row) -->
	      </div><!-- /.container-fluid -->
	    </section>
	    <!-- /.content -->
	</div>
	  <!-- /.content-wrapper -->



	@include('Admin.footer')
</body>
</html>

<!-- <html>
 <head>
 </head>
 <body>
   <label for="colorpicker">Color Picker:</label>
   <input type="color" id="colorpicker" value="#0000ff">
 </body>
</html> -->
<!--    <label for="colorpicker">Color Picker:</label>
   <input type="color" id="colorpicker" value="#0000ff">
   <button type="submit" name="submit" value="submit">Add member</button>
 -->