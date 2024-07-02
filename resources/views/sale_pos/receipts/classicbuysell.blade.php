<!-- business information here -->
<div class="row">
	<!-- Logo -->
	@php
	//dd($receipt_details);
	//dd();
	$debt_old = ($receipt_details->gold_debt_old*99.99)/($receipt_details->standard);
	@endphp
	@if(!empty($receipt_details->logo))
	<img style="max-height: 120px; width: auto;" src="{{$receipt_details->logo}}" class="img img-responsive center-block">
	@endif

	<!-- Header text -->
	@if(!empty($receipt_details->header_text))
	<div class="col-xs-12">
		{!! $receipt_details->header_text !!}
	</div>
	@endif

	<!-- business information here -->
	<div class="col-xs-12 text-center">
		<div class="col-xs-12">
			<div class="pull-left">
				<h2 class="text-center">
					<!-- Shop & Location Name  -->
					@if(!empty($receipt_details->display_name))
					{{$receipt_details->display_name}}
					@endif
				</h2>

				<!-- Address -->
				<p>
					@if(!empty($receipt_details->address))
					<small class="text-center">
						{!! $receipt_details->address !!}
					</small>
					@endif
					@if(!empty($receipt_details->contact))
					<br />{!! $receipt_details->contact !!}
					@endif
					@if(!empty($receipt_details->contact) && !empty($receipt_details->website))
					,
					@endif
					@if(!empty($receipt_details->website))
					{{ $receipt_details->website }}
					@endif
					@if(!empty($receipt_details->location_custom_fields))
					<br>{{ $receipt_details->location_custom_fields }}
					@endif
				</p>
			</div>
			<div class="pull-right">
				<span class="pull-left text-left">
					<!-- Title of receipt -->
					@if(!empty($receipt_details->invoice_heading))
					<h3 class="text-center">
						{!! ($receipt_details->invoice_heading == 'Invoice') ? 'Hóa Đơn Giao Dịch' : $receipt_details->invoice_heading!!}
					</h3>
					@endif
					<div class="text-center">
						<b>{{$receipt_details->date_label}}</b> {{$receipt_details->invoice_date}}

						@if(!empty($receipt_details->due_date_label))
						<br><b>{{$receipt_details->due_date_label}}</b> {{$receipt_details->due_date ?? ''}}
						@endif

						@if(!empty($receipt_details->brand_label) || !empty($receipt_details->repair_brand))
						<br>
						@if(!empty($receipt_details->brand_label))
						<b>{!! $receipt_details->brand_label !!}</b>
						@endif
						{{$receipt_details->repair_brand}}
						@endif


						@if(!empty($receipt_details->device_label) || !empty($receipt_details->repair_device))
						<br>
						@if(!empty($receipt_details->device_label))
						<b>{!! $receipt_details->device_label !!}</b>
						@endif
						{{$receipt_details->repair_device}}
						@endif

						@if(!empty($receipt_details->model_no_label) || !empty($receipt_details->repair_model_no))
						<br>
						@if(!empty($receipt_details->model_no_label))
						<b>{!! $receipt_details->model_no_label !!}</b>
						@endif
						{{$receipt_details->repair_model_no}}
						@endif

						@if(!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no))
						<br>
						@if(!empty($receipt_details->serial_no_label))
						<b>{!! $receipt_details->serial_no_label !!}</b>
						@endif
						{{$receipt_details->repair_serial_no}}<br>
						@endif
						@if(!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status))
						@if(!empty($receipt_details->repair_status_label))
						<b>{!! $receipt_details->repair_status_label !!}</b>
						@endif
						{{$receipt_details->repair_status}}<br>
						@endif

						@if(!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty))
						@if(!empty($receipt_details->repair_warranty_label))
						<b>{!! $receipt_details->repair_warranty_label !!}</b>
						@endif
						{{$receipt_details->repair_warranty}}
						<br>
						@endif

						<!-- Waiter info -->
						@if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff))
						<br />
						@if(!empty($receipt_details->service_staff_label))
						<b>{!! $receipt_details->service_staff_label !!}</b>
						@endif
						{{$receipt_details->service_staff}}
						@endif
						@if(!empty($receipt_details->shipping_custom_field_1_label))
						<br><strong>{!!$receipt_details->shipping_custom_field_1_label!!} :</strong> {!!$receipt_details->shipping_custom_field_1_value ?? ''!!}
						@endif

						@if(!empty($receipt_details->shipping_custom_field_2_label))
						<br><strong>{!!$receipt_details->shipping_custom_field_2_label!!}:</strong> {!!$receipt_details->shipping_custom_field_2_value ?? ''!!}
						@endif

						@if(!empty($receipt_details->shipping_custom_field_3_label))
						<br><strong>{!!$receipt_details->shipping_custom_field_3_label!!}:</strong> {!!$receipt_details->shipping_custom_field_3_value ?? ''!!}
						@endif

						@if(!empty($receipt_details->shipping_custom_field_4_label))
						<br><strong>{!!$receipt_details->shipping_custom_field_4_label!!}:</strong> {!!$receipt_details->shipping_custom_field_4_value ?? ''!!}
						@endif

						@if(!empty($receipt_details->shipping_custom_field_5_label))
						<br><strong>{!!$receipt_details->shipping_custom_field_2_label!!}:</strong> {!!$receipt_details->shipping_custom_field_5_value ?? ''!!}
						@endif
						{{-- sale order --}}
						@if(!empty($receipt_details->sale_orders_invoice_no))
						<br>
						<strong>@lang('restaurant.order_no'):</strong> {!!$receipt_details->sale_orders_invoice_no ?? ''!!}
						@endif

						@if(!empty($receipt_details->sale_orders_invoice_date))
						<br>
						<strong>@lang('lang_v1.order_dates'):</strong> {!!$receipt_details->sale_orders_invoice_date ?? ''!!}
						@endif
					</div>

				</span>
				<span class="pull-right text-left " style="padding: 20px;">
					<img width="100%" src="data:image/png;base64,{{ base64_encode($receipt_details->qrInvoice) }}" alt="">
				</span>
			</div>

		</div>

		<p>
			@if(!empty($receipt_details->sub_heading_line1))
			{{ $receipt_details->sub_heading_line1 }}
			@endif
			@if(!empty($receipt_details->sub_heading_line2))
			<br>{{ $receipt_details->sub_heading_line2 }}
			@endif
			@if(!empty($receipt_details->sub_heading_line3))
			<br>{{ $receipt_details->sub_heading_line3 }}
			@endif
			@if(!empty($receipt_details->sub_heading_line4))
			<br>{{ $receipt_details->sub_heading_line4 }}
			@endif
			@if(!empty($receipt_details->sub_heading_line5))
			<br>{{ $receipt_details->sub_heading_line5 }}
			@endif
		</p>
		<p>
			@if(!empty($receipt_details->tax_info1))
			<b>{{ $receipt_details->tax_label1 }}</b> {{ $receipt_details->tax_info1 }}
			@endif

			@if(!empty($receipt_details->tax_info2))
			<b>{{ $receipt_details->tax_label2 }}</b> {{ $receipt_details->tax_info2 }}
			@endif
		</p>



		<!-- Invoice  number, Date  -->
		<p style="width: 100% !important" class="word-wrap">
			<span style="width: 100% !important" class="pull-left text-left ">
				@if(!empty($receipt_details->invoice_no_prefix))
				<span>
					<b>{!! $receipt_details->invoice_no_prefix !!}</b>
					{{$receipt_details->invoice_no}}
				</span>
				@endif

				@if(!empty($receipt_details->types_of_service))
				<br />
				<span class="pull-left text-left">
					<strong>{!! $receipt_details->types_of_service_label !!}:</strong>
					{{$receipt_details->types_of_service}}
					<!-- Waiter info -->
					@if(!empty($receipt_details->types_of_service_custom_fields))
					@foreach($receipt_details->types_of_service_custom_fields as $key => $value)
					<br><strong>{{$key}}: </strong> {{$value}}
					@endforeach
					@endif
				</span>
				@endif

				<!-- Table information-->
				@if(!empty($receipt_details->table_label) || !empty($receipt_details->table))
				<br />
				<span class="pull-left text-left">
					@if(!empty($receipt_details->table_label))
					<b>{!! $receipt_details->table_label !!}</b>
					@endif
					{{$receipt_details->table}}

					<!-- Waiter info -->
				</span>
				@endif

				<!-- customer info -->
				<span class="pull-right">
					@if(!empty($receipt_details->customer_info))
					<b>{{ $receipt_details->customer_label }}</b> {!! $receipt_details->customer_info !!}
					@endif
					@if(!empty($receipt_details->client_id_label))
					<br />
					<b>{{ $receipt_details->client_id_label }}</b> {{ $receipt_details->client_id }}
					@endif
					@if(!empty($receipt_details->customer_tax_label))
					<br />
					<b>{{ $receipt_details->customer_tax_label }}</b> {{ $receipt_details->customer_tax_number }}
					@endif
					@if(!empty($receipt_details->customer_custom_fields))
					<br />{!! $receipt_details->customer_custom_fields !!}
					@endif
					@if(!empty($receipt_details->sales_person_label))
					<br />
					<b>{{ $receipt_details->sales_person_label }}</b> {{ $receipt_details->sales_person }}
					@endif
					@if(!empty($receipt_details->customer_rp_label))
					<br />
					<strong>{{ $receipt_details->customer_rp_label }}</strong> {{ $receipt_details->customer_total_rp }}
					@endif
				</span>

			</span>


		</p>
	</div>
</div>

<div class="row">
	@includeIf('sale_pos.receipts.partial.common_repair_invoice')
</div>

<div class="row">
	@php
	$totalExchange = 0;
	$totalquantity = 0;
	@endphp
	@if($receipt_details->lines)
	<div class="col-xs-12">
		<p>#Bán</p>
		@php
		$p_width = 40;
		@endphp
		@if(!empty($receipt_details->item_discount_label))
		@php
		$p_width -= 15;
		@endphp
		@endif

		<table class="table table-responsive table-bordered table-slim">
			<thead>
				<tr>
					<th class="text-center" width="25%">Mã hàng</th>
					<th class="text-center" width="10%">SL</th>
					<th class="text-center" width="10%">TL Tổng</th>
					<th class="text-center" width="10%">TL hột</th>
					<th class="text-center" width="10%">TL vàng</th>
					<th class="text-center" width="10%">Tuổi vàng</th>
					<th class="text-center" width="15%">TL quy đổi</th>
					<th class="text-center" width="20%">Giá công</th>
				</tr>
			</thead>
			<tbody>
				@forelse($receipt_details->lines as $line)
				<tr>
					@if($line['quantity'])
					@php
					$quantity = intval($line['quantity']);
					$totalquantity += $quantity;
					$goden_weight = 0;
					$exchange = 0;
					@endphp
					@endif
					@if($line['total_weight'])
					@php
					$goden_weight = $line['total_weight'] - $line['seed_weight'];
					if($line['golden_age'] && $line['golden_age'] != 0){
					$exchange = (($goden_weight * $line['golden_age']) / $receipt_details->standard) * $line['quantity'];
					$totalExchange += $exchange;
					}
					@endphp
					@endif
					<td class="text-center">
						@if(!empty($line['image']))
						<img src="{{$line['image']}}" alt="Image" width="50" style="float: left; margin-right: 8px;">
						@endif
						{{$line['name']}} {{$line['product_variation']}} {{$line['variation']}}
						@if(!empty($line['sub_sku'])), {{$line['sub_sku']}} @endif @if(!empty($line['brand'])), {{$line['brand']}} @endif @if(!empty($line['cat_code'])), {{$line['cat_code']}}@endif
						@if(!empty($line['product_custom_fields'])), {{$line['product_custom_fields']}} @endif
						@if(!empty($line['sell_line_note']))
						<br>
						<small>
							{{$line['sell_line_note']}}
						</small>
						@endif
						@if(!empty($line['lot_number']))<br> {{$line['lot_number_label']}}: {{$line['lot_number']}} @endif
						@if(!empty($line['product_expiry'])), {{$line['product_expiry_label']}}: {{$line['product_expiry']}} @endif

						@if(!empty($line['warranty_name'])) <br><small>{{$line['warranty_name']}} </small>@endif @if(!empty($line['warranty_exp_date'])) <small>- {{@format_date($line['warranty_exp_date'])}} </small>@endif
						@if(!empty($line['warranty_description'])) <small> {{$line['warranty_description'] ?? ''}}</small>@endif
					</td>
					<td width="10%" class="text-center">{{$quantity}}</td>
					<td width="10%" class="text-center">{{$line['total_weight']*$line['quantity']}}</td>
					<td width="10%" class="text-center">{{$line['seed_weight']*$line['quantity']}}</td>
					<td width="10%" class="text-center">{{$goden_weight*$line['quantity']}}</td>
					<td width="10%" class="text-center">{{$line['golden_age']}}</td>
					<td width="10%" class="text-center">{{round($exchange, 2)}}</td>
					<td width="10%" class="text-center">{{ number_format(intval(str_replace(',', '', $line['line_total'])) , 0, '.', ',') }}</td>
				</tr>
				@if(!empty($line['modifiers']))
				@foreach($line['modifiers'] as $modifier)
				<tr>
					<td>
						{{$modifier['name']}} {{$modifier['variation']}}
						@if(!empty($modifier['sub_sku'])), {{$modifier['sub_sku']}} @endif @if(!empty($modifier['cat_code'])), {{$modifier['cat_code']}}@endif
						@if(!empty($modifier['sell_line_note']))({{$modifier['sell_line_note']}}) @endif
					</td>
					<td class=" text-right">{{$modifier['quantity']}} {{$modifier['units']}} </td>

				</tr>
				@endforeach
				@endif
				@empty
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				@endforelse
			</tbody>
		</table>
		<!-- <div class="col-xs-6">
			<table class="table table-slim">
				<tbody>
					<tr>
						<th class="text-left">Tổng sl:</th>
						<td class="text-right">{{$totalquantity}}</td>
					</tr>
					<tr>
						<th class="text-left">TL tổng:</th>
						<td class="text-right">{{$totalExchange}}</td>
					</tr>
				</tbody>
			</table>
		</div> -->

	</div>
	@endif
	@php
	$totalExchangeBuy = 0;
	@endphp
	@if($receipt_details->lines_buy)
	<div class="col-xs-12">
		<p>#Mua</p>
		@php
		$p_width = 40;
		@endphp
		@if(!empty($receipt_details->item_discount_label))
		@php
		//dd($lines_buy);
		$p_width -= 15;
		@endphp
		@endif

		<table class="table table-responsive table-bordered table-slim">
			<thead>
				<tr>
					<th class="text-center" width="25%">Loại sản phẩm</th>
					<th class="text-center" width="15%">TL Tổng</th>
					<th class="text-center" width="10%">TL hột</th>
					<th class="text-center" width="15%">TL vàng</th>
					<th class="text-center" width="15%">Tuổi vàng</th>
					<th class="text-center" width="20%">TL quy đổi</th>
				</tr>
			</thead>
			<tbody>


				@forelse($receipt_details->lines_buy as $lines_buy)
				<tr>
					@if(!$lines_buy['total_weight'])
					@php
					$goden_weight = 0;
					$exchange = 0;
					@endphp
					@else
					@if($lines_buy['golden_age'] && $lines_buy['golden_age'] != 0)
					@php
					$goden_weight = $lines_buy['total_weight'] - $lines_buy['weight_seed'];
					$exchange = ($goden_weight * $lines_buy['golden_age']) / $receipt_details->standard;
					$totalExchangeBuy += $exchange;
					@endphp
					@else
					@php
					$goden_weight = 0;
					$exchange = 0;
					@endphp
					@endif
					@endif
					<td width="10%" class="text-center">{{$lines_buy['sectors']}}</td>
					<td width="10%" class="text-center">{{$lines_buy['total_weight']}}</td>
					<td width="10%" class="text-center">{{$lines_buy['weight_seed']}}</td>
					<td width="10%" class="text-center">{{round($goden_weight, 2)}}</td>
					<td width="10%" class="text-center">{{$lines_buy['golden_age']}}</td>
					<td width="10%" class="text-center">{{round($exchange, 2)}}</td>
				</tr>
				@empty
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	@endif
</div>

<div class="row">
	<div class="col-md-12">
		<hr />
	</div>
	<div class="col-xs-6">

		<table class="table table-slim">
			<tr>
				<th class="text-left">Tiêu chuẩn</th>
				<td class="text-right">{{$receipt_details->standard}}%</td>
			</tr>
			@if($receipt_details->lines)
			<tr>
				<th class="text-left">Vàng bán</th>
				<td class="text-right">{{ round($totalExchange, 2) }}</td>
			</tr>
			@endif
			<tr>
				<th class="text-left">Nợ cũ</th>
				<td class="text-right">{{round($debt_old, 2)}}</td>
			</tr>
			@if($receipt_details->lines_buy)
			<tr>
				<th class="text-left">Vàng mua</th>
				<td class="text-right">{{ round($totalExchangeBuy, 2) }}</td>
			</tr>
			@endif
			<tr>
				<th class="text-left">Còn lại</th>
				<td class="text-right">{{ round(($totalExchange + $debt_old)- $totalExchangeBuy, 2)}}</td>
			</tr>
			<tr>
				<th class="text-left">Khách thanh toán</th>
				<td class="text-right">{{$receipt_details->gold_paid}}</td>
			</tr>
			<tr>
				<th class="text-left">Khách nợ lại</th>
				<td class="text-right">{{$receipt_details->last_debt_gold}}</td>
			</tr>

			<tr>
				<th class="text-left">Đơn giá/100(chỉ)</th>
				<td class="text-right">{{ '₫ ' .  number_format($receipt_details->gold_price, 0, '.', ',') }}</td>
			</tr>
			<tr>
				<th class="text-left">Thành tiền</th>
				<td class="text-right">{{ '₫ ' .  number_format(($receipt_details->gold_paid * $receipt_details->gold_price)/100, 0, '.', ',') }}</td>
			</tr>
			@if(!empty($receipt_details->payments))
			@foreach($receipt_details->payments as $payment)
			<!-- <tr>
				<td>{{$payment['method']}}</td>
				<td class="text-right">{{$payment['amount']}}</td>
				<td class="text-right">{{$payment['date']}}</td>
			</tr> -->
			@endforeach
			@endif

			<!-- Total Paid-->
			@if(!empty($receipt_details->total_paid))
			<!-- <tr>
				<th>
					{!! $receipt_details->total_paid_label !!}
				</th>
				<td class="text-right">
					{{$receipt_details->total_paid}}
				</td>
			</tr> -->
			@endif

			<!-- Total Due-->
			@if(!empty($receipt_details->total_due))
			<!-- <tr>
				<th>
					{!! $receipt_details->total_due_label !!}
				</th>
				<td class="text-right">
					{{$receipt_details->total_due}}
				</td>
			</tr> -->
			@endif

			@if(!empty($receipt_details->all_due))
			<!-- <tr>
				<th>
					{!! $receipt_details->all_bal_label !!}
				</th>
				<td class="text-right">
					{{$receipt_details->all_due}}
				</td>
			</tr> -->
			@endif
		</table>
	</div>

	<div class="col-xs-6">
		<div class="table-responsive">
			<table class="table table-slim">
				<tbody>
					@if(!empty($receipt_details->total_quantity_label))
					<tr class="color-555">
						<th style="width:70%">
							{!! $receipt_details->total_quantity_label !!}
						</th>
						<td class="text-right">
							{{$receipt_details->total_quantity}}
						</td>
					</tr>
					@endif
					<tr>
						<th style="width:70%">
							Tiền công
						</th>
						<td class="text-right">
							{{ '₫ ' . number_format(floatval(str_replace(',', '', str_replace('₫ ', '', $receipt_details->subtotal))), 0, '.', ',') }}
						</td>
					</tr>
					<tr>
						<th style="width:70%">
							Nợ cũ
						</th>
						<td class="text-right">
							{{ '₫ ' . number_format(floatval(str_replace(',', '', str_replace('₫ ', '', $receipt_details->wages_debt_old))), 0, '.', ',') }}
						</td>
					</tr>
					@if(!empty($receipt_details->total_exempt_uf))
					<tr>
						<th style="width:70%">
							@lang('lang_v1.exempt')
						</th>
						<td class="text-right">
							{{$receipt_details->total_exempt}}
						</td>
					</tr>
					@endif
					<!-- Shipping Charges -->
					@if(!empty($receipt_details->shipping_charges))
					<tr>
						<th style="width:70%">
							{!! $receipt_details->shipping_charges_label !!}
						</th>
						<td class="text-right">
							{{ '₫ ' . number_format(floatval(str_replace(',', '', str_replace('₫ ', '', $receipt_details->shipping_charges))), 0, '.', ',') }}
						</td>
					</tr>
					@endif

					@if(!empty($receipt_details->packing_charge))
					<tr>
						<th style="width:70%">
							{!! $receipt_details->packing_charge_label !!}
						</th>
						<td class="text-right">
							{{$receipt_details->packing_charge}}
						</td>
					</tr>
					@endif

					<!-- Discount -->
					@if( !empty($receipt_details->discount) )
					<tr>
						<th>
							{!! $receipt_details->discount_label !!}
						</th>

						<td class="text-right">
							(-) {{$receipt_details->discount}}
						</td>
					</tr>
					@endif

					@if( !empty($receipt_details->reward_point_label) )
					<tr>
						<th>
							{!! $receipt_details->reward_point_label !!}
						</th>

						<td class="text-right">
							(-) {{$receipt_details->reward_point_amount}}
						</td>
					</tr>
					@endif

					<!-- Tax -->
					@if( !empty($receipt_details->tax) )
					<tr>
						<th>
							{!! $receipt_details->tax_label !!}
						</th>
						<td class="text-right">
							(+) {{$receipt_details->tax}}
						</td>
					</tr>
					@endif

					@if( $receipt_details->round_off_amount > 0)
					<tr>
						<th>
							{!! $receipt_details->round_off_label !!}
						</th>
						<td class="text-right">
							{{$receipt_details->round_off}}
						</td>
					</tr>
					@endif

					<!-- Total -->
					<tr>
						<th>
							Tổng phụ phí
						</th>
						<td class="text-right">
							{{ '₫ ' . number_format(floatval(str_replace(',', '', str_replace('₫ ', '', $receipt_details->last_debt_wages +  $receipt_details->wages_paid))), 0, '.', ',') }}
							@if(!empty($receipt_details->total_in_words))
							<br>
							<small>({{$receipt_details->total_in_words}})</small>
							@endif
						</td>
					</tr>
					<tr>
						<th style="width:70%">
							Khách nợ lại
						</th>
						<td class="text-right">
							{{ '₫ ' . number_format($receipt_details->last_debt_wages, 0, '.', ',')}}
						</td>
					</tr>
					<tr>
						<th style="width:70%">
							Khách thanh toán
						</th>
						<td class="text-right">
							{{ '₫ ' . number_format($receipt_details->wages_paid, 0, '.', ',')}}
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>


	<div class="col-xs-12">
		<p>{!! nl2br($receipt_details->additional_notes) !!}</p>
	</div>
</div>
<div class="col-md-12">
	<hr />
</div>
<div class="col-md-12">
	<div class="border-total-amount">
		<div class="col-md-12" style="display: flex;">
			<div style="width:70%">
				<div>
					@if($receipt_details->total > 0)
					<b>
						Tổng thu:
					</b>
					@else
					<b>
						Tổng trả:
					</b>
					@endif
					{{ '₫ ' . number_format(abs($receipt_details->total), 0, '.', ',')}}
				</div>
				<div>
					<b>
						Thành tiền bằng chữ:
					</b>
					{{ ucwords(preg_replace('/^âm/', '', $receipt_details->words))}}
				</div>
			</div>

			<div style="width:30%">
				<!-- QR-code -->
				@if ($receipt_details->total > 0 && $receipt_details->qrCode)
				<div style="width:100%;display: flex;flex-direction: column;" class="center">
					<!-- QR-code -->
					@if ($receipt_details->total > 0 && $receipt_details->qrCode)
					<p class="qr-code">
						<img width="100%" src="data:image/png;base64,{{ base64_encode($receipt_details->qrCode) }}" alt="">

					</p>
					<span>{{urldecode($receipt_details->accountHolderName)}}</span>
					<span>{{urldecode($receipt_details->accountNumber)}}</span>
					@endif
				</div>
				@endif
			</div>
		</div>


	</div>
	<div class="spacer"></div>
</div>
@if($receipt_details->show_barcode)
<div class="row">
	<div class="col-xs-12">
		{{-- Barcode --}}
		<img class=" center-block" src="data:image/png;base64,{{DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2,30,array(39, 48, 54), true)}}">
	</div>
</div>
@endif

@if(!empty($receipt_details->footer_text))
<div class="row">
	<div class="col-xs-12">
		{!! $receipt_details->footer_text !!}
	</div>
</div>
@endif