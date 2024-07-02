<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<!-- <table id="labels" style="border-spacing: 0.1cm 0.1cm; overflow: hidden !important;"> -->
<table align="center" valign="center" style="border-spacing: 2.5cm 0cm; ">
	@foreach($page_products as $page_product)
	@php
	//dd($business);
	@endphp
	@if($loop->index % $barcode_details->stickers_in_one_row == 0)
	<!-- create a new row -->
	<tr>
		<!-- <columns column-count="{{$barcode_details->stickers_in_one_row}}" column-gap="{{$barcode_details->col_distance*1}}"> -->
		@endif
		<td align="center" valign="center">
			<div style="overflow: hidden !important;flex-direction: column;display: flex; flex-wrap: wrap;align-content: center;width: 10.99cm; height: 1.20cm;">
				<!-- <div style="overflow: hidden !important;display: flex; flex-wrap: wrap;align-content: center;width: 11cm; height: 3cm;"> -->


				<div style="display:flex; width:100%">
					<div class="" style="display:flex;width:52%">
						<div class="" style="width:52%; margin-right:1px;display: flex;flex-direction: column;">
							<div class="" style="display:flex">
								<div class="" style="width:50%;text-align: left;">
									{{-- Product Name --}}
									@if(!empty($print['name']))
									<span style="display: block !important;">
										{{$page_product->product_actual_name}}

										@if(!empty($print['lot_number']) && !empty($page_product->lot_number))
										<span style="">
											({{$page_product->lot_number}})
										</span>
										@endif
									</span>
									@endif
									{{-- Product weight --}}
									<span style="display: block !important;">
										KLT: {{$page_product->weight ? $page_product->weight : 0}}
									</span>
									<span style="display: block !important;">
										H: {{$page_product->seed_weight ? $page_product->seed_weight : 0}}
									</span>
								</div>
								<div class="" style="width:50% ;text-align: left;">
									<span style="display: block !important;">
										HLV: {{$page_product->golden_age ? $page_product->golden_age : ''}}
									</span>
									<span style="display: block !important;">
										KH: {{$page_product->description ? $page_product->description : ''}}
									</span>
									<span style="display: block !important;">
										C: {{$page_product->default_sell_price ? substr(intval($page_product->default_sell_price), 0, -3) . 'K' : 0}}
									</span>
								</div>
							</div>
							<div class="" style="border-top: 1px solid;width: 80%;">
							</div>
							<div class="" style=";text-align: left;font-size: {{9*$factor}}px;font-weight:900">
								KLV: {{ ($page_product->weight ?? 0) - ($page_product->seed_weight ?? 0) }}
							</div>
						</div>
						<div class="" style="width:48%;">
							<div class="">
								<span style="direction: rtl;">
									{{$business_name}}

								</span>


							</div>
							<div class="">
								<span style="font-size: {{5*$factor}}px;line-height:6px">
									{{$business_location}}
								</span>
							</div>
							<div class="" style="display:flex">
								<span style="white-space: nowrap;font-size:5px;overflow: visible; line-height:6px">
									NSX: {{$page_product->brand ? $page_product->brand : ''}} | ĐC: {{$page_product->address ? $page_product->address : ''}}</span>
								<!-- <i style="white-space: nowrap;font-size:10px">
									@php
									$space = str_repeat(" ", 20);
									@endphp
									{{$business_location . str_repeat('&nbsp;', 35).'phanmemvangta.com'}}
								</i> -->

							</div>
							<div class="" style="display:flex; margin-top:2px">
								{{-- Barcode --}}
								<img style="max-width:90% !important;height: {{$barcode_details->height*0.20}}in !important;" src="data:image/png;base64,{{DNS1D::getBarcodePNG($page_product->sub_sku, $page_product->barcode_type, 2,40,array(0, 0, 0), true)}}">
								<!-- <img style="max-width:90% !important;height: {{$barcode_details->height*0.20}}in !important;" src="data:image/png;base64,{{DNS1D::getBarcodePNG(111111, $page_product->barcode_type, 2,40,array(0, 0, 0), true)}}"> -->

							</div>
						</div>
					</div>
					<div class="" style="width:48%">

					</div>




				</div>


			</div>

		</td>

		@if($loop->iteration % $barcode_details->stickers_in_one_row == 0)
	</tr>

	@endif
	@endforeach
</table>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->



<style type="text/css">
	body {
		font-family: "{{$text_type}}",
		sans-serif;
	}

	span {
		line-height: 9px;
		font-weight: 700;

		font-size: {{8*$factor}}px;
		/* font-size: {{8*$factor}}px; */


	}

	b,
	span {
		display: inline-block;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		max-width: 100%;
	}

	tbody {
		display: flex;
		flex-direction: column;

	}

	tr {
		display: flex;
		flex-wrap: wrap;
	}

	td {
		width: 100%;
	}

	@media print {
		p {
			padding: 0;
			margin: 0;
		}

		body {
			margin: 0;
		}

		table {
			size: 10.99cm 1cm;
			margin: 0;
		}

		td {
			page-break-after: always;

		}

		@page {
			/* size: {{$paper_width}}in{{$paper_height}}in; */
			size: 10.99cm 1cm;

			/*width: {{$barcode_details->paper_width}}in !important;*/
			/*height:@if($barcode_details->paper_height != 0){{$barcode_details->paper_height}}in !important @else auto @endif;*/
			/* margin-top: {{$margin_top}}in !important;
			margin-bottom: {{$margin_top}}in !important;

			margin-left: {{$margin_left}}in !important;

			margin-right: {{$margin_left}}in !important; */
			margin-top: 0.13cm !important;
			margin-bottom: 0 !important;

			margin-left: 0 !important;

			margin-right: 0 !important;
		}
	}
</style>