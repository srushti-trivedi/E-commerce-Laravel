				<div class="col-left sidebar col-lg-3 col-md-3 left-color color">
					<div class="anav-container">
						<div class="block block-anav">
							<div class="block-title"> <strong><span> BY Brands</span></strong></div>
							<ul style="" class="nav-accordion">
								 @foreach ($brands as $brand)
                                    <ul style="" class="nav-accordion font-weight-normal">
                                        <input type="checkbox" name="category[]" id="brand_check"
                                            value="{{ $brand->id }}" class="category_check"><a href="#"
                                            class="level-top"><span>&nbsp;{{ $brand->brandname }}</span></a><br><br><br>
                                         </ul>
                                @endforeach
							</ul>
						</div><!--- .block-anav-->
					</div><!--- .anav-container-->
					<div class="block block-layered-nav block-layered-nav--no-filters">
						<div class="block-title"> <strong><span>Shop By</span></strong></div>
						<div class="block-content toggle-content">
							<p class="block-subtitle block-subtitle--filter">Filter</p>
							<dl id="narrow-by-list">
								<dt class="even">By Price</dt>
								<dd class="even">
									<div class="slider-ui-wrap">
										<div id="price-range" class="slider-ui" slider-min="0" slider-max="1000" slider-min-start="25" slider-max-start="689"></div>
									</div>
									<form action="" id="priceform" class="price-range-form" method="">
                                            @csrf
                                            Min &nbsp;₹<input type="text" class="range_value range_value_min"
                                                target="#price-range" name="minimum" id="minimum" />
                                            -
                                            ₹<input type="text" class="range_value range_value_max" target="#price-range"
                                                name="maximum" id="maximum" /> Max &nbsp; <br><br>
                                            <div class="text-right">
                                                <input type="submit" class="btn-submit text-center" id="onsubmit"
                                                    value="ok">


                                            </div>
                                        </form>
								</dd>
								
								</dd>
								<dt class="even">By Colors</dt>
								<dd class="even">
									<ol class="configurable-swatch-list">
                                        @foreach ($colors as $color)
                                            <li>
                                            	<input type="checkbox" class="color_check"  name="color_check"  id="checkbox" value="{{ $color->id }}"><span>&nbsp;{{ $color->name }}</span> 
                                            </li>
                                        @endforeach
                                    </ol>
								</dd>
								{{-- <dt class="last odd">By Memory</dt>
								<dd class="last odd">
									<ol class="configurable-swatch-list configurable-size">
										<li> <a href="#" class="swatch-link"> <span class="swatch-label">2 GB</span></a></li>
										<li> <a href="#" class="swatch-link"> <span class="swatch-label">4 GB</span></a></li>
										<li> <a href="#" class="swatch-link"> <span class="swatch-label">6 GB</span></a></li>
										<li> <a href="#" class="swatch-link"> <span class="swatch-label">8 GB</span></a></li>
									</ol>
								</dd> --}}
							</dl>
						</div>
					</div><!--- .block-layered-nav-->
				</div><!--- .sidebar-->		
				<div class="col-main col-lg-9 col-md-9 content-color color">
					<div class="page-title category-title">
						<h1>Mobiles</h1>
					</div>
					<p class="category-image"><img src="http://placehold.it/875x360" alt="phone" title="phone"></p>
					<div class="category-products">
						<div class="toolbar">
							<div class="sorter">
								<p class="view-mode">
									<label>View </label>
										<a href="#" id="Grid" title="Grid" class="grid">
											<i class="icon-grid icons"></i> 
										</a> 
										<a href="#"  id="List" title="List" class="redirectjs active"> 
											<i class="icon-list icons"></i> 
										</a>
								</p>

								<div class="sort-by">
									<label>Sort By</label>
                                    <select id="sort_by">
                                        <option value="product_name"> Position</option>
                                        <option value="product_name"> Name</option>
                                        <option value="price"> Price</option>
                                    </select>
									<a href="#" title="Set Descending Direction"><img src="{{asset('abani/assets/images/i_asc_arrow.gif')}}" alt="Set Descending Direction" class="v-middle"></a>
								</div>
								<div class="limiter">
									<label>Order By</label>
                                    <select id="order_by">
                                        <option value="ASC"> Position</option>
                                        <option value="ASC"> Ascending</option>
                                        <option value="DESC">Descending</option>
                                    </select>
								</div>
								{{-- <div class="pager">
									<div class="pages">
										<strong>Page:</strong>
										<ol>
											<li class="current">1</li>
											<li><a href="#">2</a></li>
											<li class="bor-none"> <a class="next i-next" href="#" title="Next"> <i class="fa fa-angle-right">&nbsp;</i> </a></li>
										</ol>
									</div>
								</div> --}}
							</div>
						</div><!--- .toolbar-->

						<div id="listviwGridview">
						
						</div>


						<div class="page-nav-bottom">
							<div class="left">Items 13 to 24 of 38 total</div>
							<div class="right">
								<ul class="page-nav-category">
									<li><a href="#"><i class="fa fa-angle-left"></i></a></li>
									<li><a href="#">1</a></li>
									<li><a class="selected" href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
								</ul>
							</div>
						</div><!--- .page-nav-bottom-->
					</div><!--- .category-products-->
				</div><!--- .col-main-->


				<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

				<script>
					// $(document).ready(function(){
					// 	listgrid();
					// 	$('#List').on('click',function(){
					// 		$('#List').removeClass('grid').addClass('redirectjs active');
					// 		$('#Grid').removeClass('redirectjs active').addClass('grid');

					// 		listgrid();
					// 	});

					// 	$('#Grid').on('click',function(){
					// 		$('#Grid').removeClass('grid').addClass('redirectjs active');
					// 		$('#List').removeClass('redirectjs active').addClass('grid');

					// 		listgrid();
					// 	});
					// });

					// function listgrid(){
					// 	url = '{{ url("/frontListGrid") }}';
						
					// 	$.ajaxSetup({
					// 	    headers: {
					// 	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					// 	    }
					// 	});

					// 	$.ajax({
					// 		type: "GET",
					// 		datatype: 'html',
					// 		url: url,
					// 		data: {
					// 			view: $('#List').hasClass('active'),
					// 		},
					// 		success: function(data){
					// 			$('#listviwGridview').html(data);
					// 		}
					// 	});
					// }

					var category = [];
		        	var color = [];

		        	$('.category_check').click(function(){

		                if($(".category_check").is(':checked'))
		                {
		                    category.push($(this).val());
		                    console.log(category);
		                }
		                else
		                {
		                    category.pop($(this).val());
		                }
		                filter();
		            });

		            $('.color_check').click(function() {

		                if ($(this).is(':checked'))
		                {
		                	color.push($(this).val());
		                	console.log(color);
		                }
		                else
		                {
		                    color.pop($(this).val());

		                }
		                filter();
		            });
		            function filter() {

			            var minimum = $('#minimum').val();
			            var maximum = $('#maximum').val();
			            var sort_by = $('#sort_by').val();
			            var order_by =$('#order_by').val();
			            
			            $.ajax({
			                url: "{{ url('/frontFilter') }}",
			                type: "GET",
			                datatype: 'html',
			                data: {

			                    view: $('#Grid').hasClass('active'),

			                    'minimum': minimum,
			                    'maximum': maximum,
			                    'category':category,                    
			                    'color': color,
			                    'sort_by':sort_by,
			                    'order_by':order_by,
			                },
			                success: function(data) {
			                    $("#listviwGridview").html(data);
			                }
			            });
			        }

			        $(document).ready(function() {
			            filter();
			        });

			        $('#List').on('click',function(){
						$('#List').removeClass('grid').addClass('redirectjs active');
						$('#Grid').removeClass('redirectjs active').addClass('grid');

						filter();
					});

					$('#Grid').on('click',function(){
						$('#Grid').removeClass('grid').addClass('redirectjs active');
						$('#List').removeClass('redirectjs active').addClass('grid');

						filter();
					});


			        $("#onsubmit").click(function(e) {
			            e.preventDefault();
			            filter();
			        });

			        $('#sort_by,#order_by').click(function(){
			            
			            filter();

			        });
				</script>				