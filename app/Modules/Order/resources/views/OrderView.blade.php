@extends('master')

@section('title')
	<title> Order | List </title>
@endsection

@section('content')
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0">Orders</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="/welcome">Home</a></li>
	              <li class="breadcrumb-item active">Order</li>
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
	    	@csrf

	    	<br><br>
			<table id="example">  
			{{-- <table  class="display" style="width:100%" > --}}
				<thead>
					<tr align="center">
						<th> ID </th>
						<th> Name </th>
						<th> Quantity </th>
						<th> Price </th>
						<th> Status </th>
						<th> Action </th>
					</tr>
				</thead>

				<tbody>
				@foreach($orderView as $order)
					<tr align="center">
						<td rowspan="1" colspan="1">{{ $order->id }}</td>
						<td>{{ $order->users->user_name }}</td>
						<td>{{ $order->quantity }}</td>          
						<td>{{ $order->total_price }}</td>
						<td>
							@if($order->status == "Y")
								<input data-id="{{$order->id}}" class="status" type="checkbox" data-on="Active" data-off="Pending" data-toggle="toggle" checked>
							@else
								<input data-id="{{$order->id}}" class="status" type="checkbox" data-onstyle="info" data-offstyle="secondary" data-toggle="toggle" data-on="Active" data-off="Pending">
							@endif
						</td>
						<td>
							<a href="/invoice/{{$order->id}}">
								<i class='fas fa-info-circle' style='font-size:36px'></i>
							</a>
							 
							{{-- <button type="button" value="{{$order->id}}" class="btn btn-danger archiveBtn "><i class='fas fa-eye' style='font-size:36px;color:cyan'></i> &nbsp;&nbsp; Archive</button> --}}
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
	$(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection