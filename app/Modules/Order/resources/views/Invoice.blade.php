@extends('master')

@section('title')
  <title> Order | Invoice </title>
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class='fas fa-tablet-alt' style='font-size:24px'></i> PhoneWorld.
                    {{-- <small class="float-right">Date: 2/10/2014</small> --}}
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  @php 
                    $billingAddress = getBillingAddress($address->billing_id);
                    $shippingAddress = getShippingAddress($address->shipping_id); 
                  @endphp
                  Billing Address
                  @foreach($billingAddress as $b_add)
                  <address>
                    <strong>{{ $b_add->fname}}</strong><br>
                    City: {{ $b_add->city }} <br>
                    {{ $b_add->state }}, {{ $b_add->country }} {{ $b_add->zipcode }} <br>
                    Phone: {{ $b_add->phone_no }}<br>
                    Email: {{ $b_add->email }}
                   </address>
                  @endforeach
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  @foreach($shippingAddress as $s_add)
                  <address>
                    <strong>{{ $s_add->fname}}</strong><br>
                    City: {{ $s_add->city }} <br>
                    {{ $s_add->state }}, {{ $s_add->country }} {{ $s_add->zipcode }} <br>
                    Phone: {{ $s_add->phone_no }}<br>
                    Email: {{ $s_add->email }}
                   </address>
                  @endforeach
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice </b><br>
                  
                  <b>Order ID:</b> {{ $order->id }}<br>
                  <b>Payment Due:</b> {{ $order->created_at }} <br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                      @php $count =0;@endphp
                      @foreach($invoice as $key=>$value)
                      <tr>
                        <td>{{ $count =+1 }}</td>
                        <td>{{ $value->product_name}}</td>
                        <td>{{ $value->quantity}}</td>
                        <td>
                          Color : {{ $value->name }}<br>
                          Catagory : {{ $value->brandname }}
                        </td>
                        <td>₹:{{ $value->total_price }}.00</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  Cash On Delivery.
                  {{-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   Cash On Delivery
                  </p> --}}
                </div>
                <!-- /.col -->
                <div class="col-6">
                 
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Total:</th>
                        <td>₹:{{ $order->total_price}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  
                  <button type="button" class="btn btn-primary float-right" onclick="window.print()" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection