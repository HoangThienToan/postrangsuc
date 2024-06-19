<div class="row">
	<div class="col-md-12">
		<p><strong>@lang('sale.invoice_no'):</strong> {{$transaction->invoice_no}}</p>
	</div>
	<div class="col-md-4">
		<div class="form-group" style="width: 100% !important">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-user"></i>
				</span>
				<input type="hidden" id="default_customer_id" value="{{ $transaction->contact->id }}">
				<input type="hidden" id="default_customer_name" value="{{ $transaction->contact->name. ' (' .$transaction->contact->contact_id. ')' }}">
				<input type="hidden" id="default_customer_balance" value="{{$transaction->contact->balance}}">
				{!! Form::select('contact_id',
				[], null, ['class' => 'form-control mousetrap', 'id' => 'customer_id', 'placeholder' => 'Enter Customer name / phone', 'required', 'style' => 'width: 100%;']); !!}
				<span class="input-group-btn">
					<button type="button" class="btn btn-default bg-white btn-flat add_new_customer" data-name="" @if(!auth()->user()->can('customer.create')) disabled @endif><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
				</span>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-btn">
					<button type="button" class="btn btn-default bg-white btn-flat" data-toggle="modal" data-target="#configure_search_modal" title="{{__('lang_v1.configure_product_search')}}"><i class="fas fa-search-plus"></i></button>
				</div>
				{!! Form::text('search_product2', null, ['class' => 'form-control mousetrap', 'id' => 'search_product2', 'placeholder' => __('lang_v1.search_product_placeholder'),
				'autofocus' => true,
				]); !!}
				<span class="input-group-btn">

					<!-- Show button for weighing scale modal -->
					@if(isset($pos_settings['enable_weighing_scale']) && $pos_settings['enable_weighing_scale'] == 1)
					<button type="button" class="btn btn-default bg-white btn-flat" id="weighing_scale_btn" data-toggle="modal" data-target="#weighing_scale_modal" title="@lang('lang_v1.weighing_scale')"><i class="fa fa-digital-tachograph text-primary fa-lg"></i></button>
					@endif

					<button type="button" class="btn btn-default bg-white btn-flat pos_add_quick_product" data-href="{{action('ProductController@quickAdd')}}" data-container=".quick_add_product_modal"><i class="fa fa-plus-circle text-primary fa-lg"></i></button>
				</span>
			</div>
		</div>
	</div>
</div>
<div class="row">
	@if(!empty($pos_settings['show_invoice_layout']))
	<div class="col-md-4">
		<div class="form-group">
			{!! Form::select('invoice_layout_id',
			$invoice_layouts, $transaction->location->invoice_layout_id, ['class' => 'form-control select2', 'placeholder' => __('lang_v1.select_invoice_layout'), 'id' => 'invoice_layout_id']); !!}
		</div>
	</div>
	@endif
	<input type="hidden" name="pay_term_number" id="pay_term_number" value="{{$transaction->pay_term_number}}">
	<input type="hidden" name="pay_term_type" id="pay_term_type" value="{{$transaction->pay_term_type}}">

	@if(!empty($commission_agent))
	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::select('commission_agent',
			$commission_agent, $transaction->commission_agent, ['class' => 'form-control select2', 'placeholder' => __('lang_v1.commission_agent')]); !!}
		</div>
	</div>
	@endif
	@if(!empty($pos_settings['enable_transaction_date']))
	<div class="col-md-4 col-sm-6">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</span>
				{!! Form::text('transaction_date', @format_datetime($transaction->transaction_date), ['class' => 'form-control', 'readonly', 'required', 'id' => 'transaction_date']); !!}
			</div>
		</div>
	</div>
	@endif
	@if(config('constants.enable_sell_in_diff_currency') == true)
	<div class="col-md-4 col-sm-6">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fas fa-exchange-alt"></i>
				</span>
				{!! Form::text('exchange_rate', @num_format($transaction->exchange_rate), ['class' => 'form-control input-sm input_number', 'placeholder' => __('lang_v1.currency_exchange_rate'), 'id' => 'exchange_rate']); !!}
			</div>
		</div>
	</div>
	@endif
	@if(!empty($transaction->selling_price_group_id))
	<div class="col-md-4 col-sm-6">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fas fa-money-bill-alt"></i>
				</span>
				{!! Form::hidden('price_group', $transaction->selling_price_group_id, ['id' => 'price_group']) !!}
				{!! Form::text('price_group_text', $transaction->price_group->name, ['class' => 'form-control', 'readonly']); !!}
				<span class="input-group-addon">
					@show_tooltip(__('lang_v1.price_group_help_text'))
				</span>
			</div>
		</div>
	</div>
	@endif

	@if(in_array('types_of_service', $enabled_modules) && !empty($transaction->types_of_service))
	<div class="col-md-4 col-sm-6">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fas fa-external-link-square-alt text-primary service_modal_btn"></i>
				</span>
				{!! Form::text('types_of_service_text', $transaction->types_of_service->name, ['class' => 'form-control', 'readonly']); !!}

				{!! Form::hidden('types_of_service_id', $transaction->types_of_service_id, ['id' => 'types_of_service_id']) !!}
				<span class="input-group-addon">
					@show_tooltip(__('lang_v1.types_of_service_help'))
				</span>
			</div>
			<small>
				<p class="help-block @if(empty($transaction->selling_price_group_id)) hide @endif" id="price_group_text">@lang('lang_v1.price_group'): <span>@if(!empty($transaction->selling_price_group_id)){{$transaction->price_group->name}}@endif</span></p>
			</small>
		</div>
	</div>
	<div class="modal fade types_of_service_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		@if(!empty($transaction->types_of_service))
		@include('types_of_service.pos_form_modal', ['types_of_service' => $transaction->types_of_service])
		@endif
	</div>
	@endif
	@if($transaction->status == 'draft' && !empty($pos_settings['show_invoice_scheme']))
	<div class="col-sm-3">
		<div class="form-group">
			{!! Form::select('invoice_scheme_id', $invoice_schemes, $default_invoice_schemes->id, ['class' => 'form-control', 'placeholder' => __('lang_v1.select_invoice_scheme')]); !!}
		</div>
	</div>
	@endif
	<!-- Call restaurant module if defined -->
	@if(in_array('tables' ,$enabled_modules) || in_array('service_staff' ,$enabled_modules))
	<span id="restaurant_module_span" data-transaction_id="{{$transaction->id}}">
		<div class="col-md-3"></div>
	</span>
	@endif
	@if(in_array('subscription', $enabled_modules))
	<div class="col-md-4 col-sm-6">
		<label>
			{!! Form::checkbox('is_recurring', 1, $transaction->is_recurring, ['class' => 'input-icheck', 'id' => 'is_recurring']); !!} @lang('lang_v1.subscribe')?
		</label><button type="button" data-toggle="modal" data-target="#recurringInvoiceModal" class="btn btn-link"><i class="fa fa-external-link-square-alt"></i></button>@show_tooltip(__('lang_v1.recurring_invoice_help'))
	</div>
	@endif
</div>
<!-- include module fields -->
@if(!empty($pos_module_data))
@foreach($pos_module_data as $key => $value)
@if(!empty($value['view_path']))
@includeIf($value['view_path'], ['view_data' => $value['view_data']])
@endif
@endforeach
@endif
<div class="row">
	<div class="col-sm-12 pos_product_div">
		<div class="">
			<h3>#Bán</h3>
		</div>
		<input type="hidden" name="sell_price_tax" id="sell_price_tax" value="{{$business_details->sell_price_tax}}">

		<!-- Keeps count of product rows -->
		<input type="hidden" id="product_row_count" value="{{count($sell_details)}}">
		@php
		$hide_tax = '';
		if( session()->get('business.enable_inline_tax') == 0){
		$hide_tax = 'hide';
		}
		@endphp
		<table class="table table-condensed table-bordered table-striped table-responsive" id="pos_table">
			<thead>
				<tr>
					<th class="tex-center @if(!empty($pos_settings['inline_service_staff'])) col-md-1 @else col-md-2 @endif">
						@lang('sale.product') @show_tooltip(__('lang_v1.tooltip_sell_product_column'))
					</th>
					<th class="text-center col-md-2">
						@lang('sale.qty')
					</th>
					<th class="text-center col-md-2">
						TL tổng
					</th>
					<th class="text-center col-md-2">
						TL hạt
					</th>
					<th class="text-center col-md-1">
						TL KL quý
					</th>
					<th class="text-center col-md-1">
						%
					</th>
					<th class="text-center col-md-2">
						Giá thành/100(chỉ)
					</th>
					<th class="text-center col-md-2">
						Tiền Công
					</th>
					<th class="text-center col-md-2">
						@lang('sale.subtotal')
					</th>
					<th class="text-center"><i class="fas fa-times" aria-hidden="true"></i></th>
				</tr>
			</thead>
			<tbody>
				@foreach($sell_details as $sell_line)

				@include('sale_pos.product_row_edit',
				['product' => $sell_line,
				'row_count' => $loop->index,
				'tax_dropdown' => $taxes,
				'sub_units' => !empty($sell_line->unit_details) ? $sell_line->unit_details : [],
				'action' => 'edit'
				])
				@endforeach
			</tbody>
		</table>
		<div class="">
			<h3>#Mua</h3>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<div class="form-group">
					<input type="hidden" value="1" class="purchase_quantity">
					<button type="button" class="btn add_product"><i class="fa fa-plus"></i> @lang( 'product.add_new_product' ) </button>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive">
					<table class="table table-condensed table-bordered table-th-green text-center table-striped" id="purchase_entry_table">
						<thead>
							<tr>
								<th>#</th>
								<th>@lang( 'product.commodities' )</th>
								<th class="text-center">
									Tl Tổng
								</th>
								<th class="text-center">
									@lang('sale.seed_weight')
								</th>
								<th class="text-center">
									TL KL quý
								</th>
								<th class="text-center">
									%
								</th>
								<th class="text-center">
									Giá thành/100(chỉ)
								</th>
								<th class="text-center">
									Thành tiền
								</th>
								<th><i class=" fa fa-trash" aria-hidden="true"></i></th>
							</tr>
						</thead>
						<tbody>
							@if(isset($buy_details))
							@foreach ($buy_details as $key => $value)
							@php
							//dd(($buy_details[$key]));
							if (!empty($buy_details[$key]['sectors'])) {
							$sectors = $buy_details[$key]['sectors'];
							} else{
							$sectors = "";
							};

							@endphp
							<tr class="product_row" data-row_index="{{$key}}">
								<td><input type="hidden" name="buy[{{$key}}][buy_id_edit]" class="form-control" value="{{$buy_details[$key]['buy_id_edit']}}"><span class="sr_number">{{$key + 1}}</span></td>
								<td><input type="text" name="buy[{{$key}}][sectors]" class="form-control" value="{{$sectors}}"></td>
								<td><input type="number" name="buy[{{$key}}][weight]" class="form-control weight" value="{{$buy_details[$key]['total_weight']}}"></td>
								<td class="text-center"><input type="number" name="buy[{{$key}}][seed_weight]" class="form-control seed_weight" value="{{$buy_details[$key]['weight_seed']}}"></td>
								<td class="text-center"><input type="hidden" class="form-control goden_weight" value="{{$buy_details[$key]['total_weight']-$buy_details[$key]['weight_seed']}}"><span class="goden_weight">{{$buy_details[$key]['total_weight']-$buy_details[$key]['weight_seed']}}</span></td>
								<td class="text-center"><input type="number" name="buy[{{$key}}][golden_age]" class="form-control golden_age" value="{{$buy_details[$key]['golden_age']}}"></td>
								<td class="text-center"><input type="number" name="buy[{{$key}}][price]" class="form-control price" value="{{$buy_details[$key]['price']}}"></td>
								<td class="text-center"><input type="hidden" name="buy[{{$key}}][buy_total]" class="buy_total display_currency" data-currency_symbol="true" value="{{($buy_details[$key]['total_weight']-$buy_details[$key]['weight_seed'])*$buy_details[$key]['price']/100}}"><span class="buy_total">{{(($buy_details[$key]['total_weight']-$buy_details[$key]['weight_seed'])*$buy_details[$key]['price']/100)}}</span></td>
								<td><i class="fa fa-times remove_purchase_entry_row text-danger" title="Remove" style="cursor:pointer;"></i></td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
				<div class="hide">
					<hr />
					<div class="pull-right col-md-5">
						<table class="pull-right col-md-12">
							<tr class="hide">
								<th class="col-md-7 text-right">@lang( 'purchase.total_before_tax' ):</th>
								<td class="col-md-5 text-left">
									<span id="total_st_before_tax" class="display_currency"></span>
									<input type="hidden" id="st_before_tax_input" value=0>
								</td>
							</tr>
							<tr>
								<th class="col-md-7 text-right">@lang( 'purchase.total_amount_of_gold' ):</th>
								<td class="col-md-5 text-left">
									<span id="total_subtotal_buy" class="display_currency"></span>
									<!-- This is total before purchase tax-->
									<input type="hidden" id="total_subtotal_input_buy" value=0 name="total_before_tax">
								</td>
							</tr>
						</table>
					</div>

					<input type="hidden" id="row_count" value="0">
				</div>
			</div>
		</div>
	</div>
</div>