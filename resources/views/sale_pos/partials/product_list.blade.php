@forelse($products as $product)
<!-- <div class="col-md-3 col-xs-4 product_list no-print">
	<div class="product_box" data-variation_id="{{$product->id}}" title="{{$product->name}} @if($product->type == 'variable')- {{$product->variation}} @endif {{ '(' . $product->sub_sku . ')'}} @if(!empty($show_prices)) @lang('lang_v1.default') - @format_currency($product->selling_price) @foreach($product->group_prices as $group_price) @if(array_key_exists($group_price->price_group_id, $allowed_group_prices)) {{$allowed_group_prices[$group_price->price_group_id]}} - @format_currency($group_price->price_inc_tax) @endif @endforeach @endif">

		<div class="image-container" style="background-image: url(
					@if(count($product->media) > 0)
						{{$product->media->first()->display_url}}
					@elseif(!empty($product->product_image))
						{{asset('/uploads/img/' . rawurlencode($product->product_image))}}
					@else
						{{asset('/img/default.png')}}
					@endif
				);
			background-repeat: no-repeat; background-position: center;
			background-size: contain;">

		</div>

		<div class="text_div">
			<small class="text text-muted">{{$product->name}}
				@if($product->type == 'variable')
				- {{$product->variation}}
				@endif
			</small>

			<small class="text-muted">
				({{$product->sub_sku}})
			</small>
		</div>

	</div>
</div> -->
@empty
<!-- <input type="hidden" id="no_products_found">
<div class="col-md-12">
	<h4 class="text-center">
		@lang('lang_v1.no_products_to_display')
	</h4>
</div> -->
@endforelse
<div class="box-body col-md-12">
	<div class="table-responsive">

		<table class="table-bordered table table-hover w-100" id="TablePrice">

			<thead style="background: #cb5757 !important; color:white">
				<tr>
					<th width="40%" class="text-center">Loại hàng | ĐVT: 1.000đ/100(chỉ)</th>
					<th width="28%" class="text-center">Giá mua</th>
					<th width="28%" class="text-center">Giá bán</th>
					<th width="4%" class="text-center" id='apply' style="background: #d81b60; cursor: pointer;">Áp dụng</th>
				</tr>
			</thead>
			<tbody class="data-table product_list no-print">
				@forelse($classifies_price as $classifies_price)
				<tr class="product_box" data-variation_id="{{$classifies_price->id}}" title="{{$classifies_price->name}}">
					<th width="40%" class="commodities">
						{{$classifies_price->commodities}}
					</th>
					<td width="28%" class="text-right dropdown">
						<div class="classifies_buy" data-toggle="dropdown" data-target="dropdownMenuBuy0" data-boundary="window">
							₫ {{number_format($classifies_price->buy??0, 0, '.', ',')}}
						</div>
						<input type="number" class="classifies_buy form-control" value="{{$classifies_price->buy??0}}" style="display: none;" aria-invalid="false">
					</td>
					<td width="28%" class="text-right dropdown">
						<div class="classifies_sell" data-toggle="dropdown" data-target="dropdownMenuBuy0" data-boundary="window">
							₫ {{number_format($classifies_price->sell??0, 0, '.', ',')}}
						</div>
						<input type="number" class="classifies_sell form-control" value="{{$classifies_price->sell??0}}" style="display: none;">
					</td>
					<td class="classifies_edit">
						<i class="glyphicon glyphicon-edit"></i>
					</td>
				</tr>
				@empty
				<tr></tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>