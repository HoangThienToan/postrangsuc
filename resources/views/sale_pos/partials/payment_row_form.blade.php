<div class="payment_row">
	<div class="row">
		<input type="hidden" class="payment_row_index" value="{{ $row_index}}">
		@if(!isset($payment_line['method']))
		@php
		$payment_line['method'] = 'aaaa';
		$payment_line['amount'] = '0';

		@endphp
		@endif
		@php

		$col_class = 'col-md-6';
		if(!empty($accounts)){
		$col_class = 'col-md-4';
		}
		$readonly = $payment_line['method'] == 'advance' ? true : false;
		@endphp
		<div class="{{$col_class}}">
			<div class="form-group">
				{!! Form::label("pri" ,__('sale.gold_price/100') . ':*') !!}
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fas fa-money-bill-alt"></i>
					</span>
					{!! Form::text("pri", @num_format($transaction->gold_price ?? 0), ['class' => 'form-control input_number', 'required', 'id' => "pri", 'placeholder' => __('sale.gold_price/100'), 'readonly' => $readonly]); !!}
				</div>
			</div>
		</div>
		<div class="{{$col_class}}">
			<div class="form-group">
				{!! Form::label("wages" ,__('sale.payment_of_wages') . ':*') !!}
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fas fa-money-bill-alt"></i>
					</span>
					{!! Form::text("wages", $transaction->wages_paid ?? 0.00, ['class' => 'form-control input_number', 'required', 'id' => "wages", 'placeholder' => __('sale.payment_of_wages'), 'readonly' => $readonly]); !!}
					{!! Form::hidden("wages_save", @num_format($transaction->wages_paid ?? 0.00), ['id' => "wages_save"]); !!}
				</div>
			</div>
		</div>
		<div class="{{$col_class}}">
			<div class="form-group">
				{!! Form::label("gold_want_to_pay" ,__('sale.amount_of_gold_want_to_pay') . ':*') !!}
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fas fa-coins"></i>
					</span>
					{!! Form::text("gold_want_to_pay", @num_format($transaction->gold_paid ?? 0), ['class' => 'form-control input_number', 'required', 'id' => "gold_want_to_pay", 'placeholder' => __('sale.amount_of_gold_want_to_pay'), 'readonly' => $readonly]); !!}
				</div>
			</div>
		</div>
		<div class="{{$col_class}}">
			<div class="form-group">
				{!! Form::label("amount_$row_index" ,__('sale.payment_of_gold') . ':*') !!}
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fas fa-money-bill-alt"></i>
					</span>
					{!! Form::text("payment[$row_index][amount]", @num_format($payment_line['amount']), ['class' => 'form-control payment-amount input_number', 'required', 'id' => "amount_$row_index", 'placeholder' => __('sale.amount'), 'readonly']); !!}
				</div>
			</div>
		</div>

		@if(!empty($show_date))
		<div class="{{$col_class}}">
			<div class="form-group">
				{!! Form::label("paid_on_$row_index" , __('lang_v1.paid_on') . ':*') !!}
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</span>
					{!! Form::text("payment[$row_index][paid_on]", isset($payment->paid_on) ? @format_datetime($payment->paid_on) : @format_datetime('now'), ['class' => 'form-control paid_on', 'readonly', 'required']); !!}
				</div>
			</div>
		</div>
		@endif
		<div class="{{$col_class}}">
			<div class="form-group">
				{!! Form::label("method_$row_index" , __('lang_v1.payment_method') . ':*') !!}
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fas fa-money-bill-alt"></i>
					</span>
					@php
					$_payment_method = empty($payment_line['method']) && array_key_exists('cash', $payment_types) ? 'cash' : $payment_line['method'];
					@endphp
					{!! Form::select("payment[$row_index][method]", $payment_types, $payment->method ?? 'cash', ['class' => 'form-control col-md-12 payment_types_dropdown', 'required', 'id' => !$readonly ? "method_$row_index" : "method_advance_$row_index", 'style' => 'width:100%;', 'disabled' => $readonly]); !!}

					@if($readonly)
					{!! Form::hidden("payment[$row_index][method]", $payment_line['method'], ['class' => 'payment_types_dropdown', 'required', 'id' => "method_$row_index"]); !!}
					@endif
				</div>
			</div>
		</div>
		@if(!empty($accounts))
		<div class="{{$col_class}}">
			<div class="form-group @if($readonly) hide @endif">
				{!! Form::label("account_$row_index" , __('lang_v1.payment_account') . ':') !!}
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fas fa-money-bill-alt"></i>
					</span>
					{!! Form::select("payment[$row_index][account_id]", $accounts, !empty($payment_line['account_id']) ? $payment_line['account_id'] : '' , ['class' => 'form-control select2 account-dropdown', 'id' => !$readonly ? "account_$row_index" : "account_advance_$row_index", 'style' => 'width:100%;', 'disabled' => $readonly]); !!}
				</div>
			</div>
		</div>
		@endif
		<div class="clearfix"></div>
		@include('sale_pos.partials.payment_type_details')
		<div class="col-md-12">
			<div class="form-group">
				{!! Form::label("note_$row_index", __('sale.payment_note') . ':') !!}
				{!! Form::textarea("payment[$row_index][note]", $payment->note ?? null, ['class' => 'form-control', 'rows' => 3, 'id' => "note_$row_index"]); !!}
			</div>
		</div>
	</div>
</div>