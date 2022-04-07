@extends('master')

@section('title')
	<title> PhoneWorld | Product | Form </title>
@endsection

@section('content')
	
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0"> Products </h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="/welcome">Home</a></li>
	              <li class="breadcrumb-item active">Products</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->

	          @if(session('status'))
				    <div class="alert alert-success">{{session('status')}}</div>
			  @endif

	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <section class="content">
	    	<div class="container-fluid">
	    		<div class="card">
	    			<div class="card-body">
			   			<form action="{{ url('add-product') }}"enctype='multipart/form-data' method="POST">
			   				@csrf
			   				
			   				<div class="row">
			   					<div class="col-md-12">
				   					<div class="row">
	    								<div class="col-2">
	    									<label> Product Name </label>
	    								</div>
									    <div class="col-3">
									    	<input type="text" class="form-control" placeholder="Enter Product Name" name="product_name" id="product_input_name" autocomplete="off">
											<span style="color: red">@error('product_name'){{$message}}@enderror</span>
	 								   </div>
	  								</div>
	  							</div>
  								&nbsp;&nbsp;&nbsp;
  								<div class="col-md-12">
  									
	  								<div class="input-group mb-3">
	  									{{-- <label for="formFileLg" class="form-label"> URL </label>&nbsp;&nbsp; --}}
				   						<div class="input-group-prepend">
				   							<span class="input-group-text" id="basic-addon3" >URL</span>
				   						</div>
				   						<input type="text" class="form-control" id="basic-url" name="url" placeholder="Enter your URL" aria-describedby="basic-addon3">
				   					</div>
								</div>	
									&nbsp;&nbsp;&nbsp;
			   					<div class="col-md-12">
		   						
		   							<label> UPC </label>&nbsp;
			   						<input type="text" class="form-control-sm" placeholder="Enter UPC" name="upc" autocomplete="off">
												   						
			   						&nbsp;&nbsp;&nbsp;

			   						<label> Stock </label>&nbsp;
			   						<input type="number" class="form-control-sm" placeholder="Enter Stock" name="stock" autocomplete="off">
			   								   					   						
			   						&nbsp;&nbsp;&nbsp;
			   						<label> Brand </label>&nbsp;
			   						<select class="form-select-sm " name="brand_id">
			   							<option value="">&nbsp; Select Brand &nbsp;</option>
			   							@foreach($cateogrys as $cateogry)
			   								<option value="{{ $cateogry->id }}">{{ $cateogry->brandname }}</option>
			   							@endforeach
			   						</select>
			   						
			   						&emsp;&emsp;&emsp;
			   						<label> Color </label>&nbsp;
			   						<select class="form-select-sm " name="color_id">
			   							<option value="">&nbsp; Select Color &nbsp;</option>
			   							@foreach($colors as $color)
			   								<option value="{{ $color->id }}">{{ $color->name }}</option>
			   							@endforeach
			   						</select>
			   						
			   						&emsp;&emsp;&emsp;
			   						<label> Price </label>&nbsp;
									{{-- <div class="input-group mb-3">
										&nbsp;&nbsp;&nbsp;
			   							<label> Price </label>&nbsp;
			   							<span class="input-group-text form-control-sm">$</span>
			   							<input type="text" class="form-control-sm" placeholder="Enter Price" name="price">
			   						</div> --}}
			   						<input type="number" class="form-control-sm" placeholder="Enter Price" name="price"  autocomplete="off">
			   						
			   					</div>
			   					<div>
			   						&emsp;&emsp;
			   						<span style="color: red">@error('upc'){{$message}}@enderror</span>
			   						&emsp;&emsp;&emsp;&emsp;
			   						<span style="color: red">@error('stock'){{$message}}@enderror</span>
			   						<span style="color: red">@error('brand_id'){{$message}}@enderror</span>
			   						&emsp;&emsp;
			   						<span style="color: red">@error('color_id'){{$message}}@enderror</span>
			   						&emsp;&emsp;
			   						<span style="color: red">@error('price'){{$message}}@enderror</span>
			   					</div>
			   						{{-- &nbsp;
			   					<div class="col-md-12">
			   						<div class="input-group">
			   							<div class="custom-file">
			   								<input type="file" class="custom-file-input" id="inputGroupFile02">
			   								<label class="custom-file-label" for="inputGroupFile02">Choose file</label>
			   							</div>
			   							<div class="input-group-append">
									    	<span class="input-group-text" id="">Upload</span>
									 	</div>
									</div>
								</div> --}}
								&nbsp;&nbsp;&nbsp;
								<div class="col-md-12">
				   						<label for="coverImg" class="form-label">Cover Image</label>
				   						<input class="form-control form-control-lg" id="coverImg" type="file" name="coverImg" autocomplete="off">
										<span style="color: red">@error('coverImg'){{$message}}@enderror</span>
			   					</div>

			   					&nbsp;&nbsp;&nbsp;
			   					<div class="col-md-12">
			   						<label> Description </label>
			   						<textarea class="form-control" name="description" placeholder="Enter Description About some Product " rows="1" autocomplete="off"></textarea>
			   						<span style="color: red">@error('description'){{$message}}@enderror</span>
			   					</div>

			   					&nbsp;&nbsp;&nbsp;
								<div class="col-md-12">
				   						<label for="multiple" class="form-label">Multiple Images</label>
				   						<input class="form-control form-control-sm" id="multiple" type="file" name="multiple[]" multiple  autocomplete="off">
										<span style="color: red">@error('multiple'){{$message}}@enderror</span>
			   					</div>

			   				</div>{{-- row --}}
			   				<div class="row">
			   					<div class="col-md-12">
			   						<center>
			   							<br>
			   							<input type="submit" class="float-xl" name="Submit" value="Submit">
			   						</center>
			   					</div>
			   				</div>
			   			</form>
			   		</div>
			   	</div>
			</div>
		</section>
	</div>		   				
@endsection

@section('listscript')

	<script>
		$(document).ready(function(){
			$('#product_input_name').change(function(){
				var url = 'http://127.0.0.1:8000/products/';
				let name = $(this).val();
				let ext = name.split("-").join("");
				url =+ ext;
				console.log(url);
				$('#basic-url').val(url);

			});
 		});
	</script>
@endsection