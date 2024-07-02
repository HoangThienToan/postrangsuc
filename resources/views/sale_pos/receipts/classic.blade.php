{{-- for A5 --}}
<style>
    .font-sell {
        color: #000;
        line-height: 1.2;
        font-family: 'Times New Roman', Times, serif;
        max-width: 86%;
        margin: 10px auto !important;
    }

    .p-sell {
        padding-left: 8px;
        padding-right: 8px;
    }


    .p-total {
        padding: 6px 8px 0 0 !important;
    }

    .p-word {
        padding: 8px !important;
    }

    .m-2 {
        margin-bottom: 5px !important;
    }

    .d-none {
        display: none !important;
    }

    .between {
        display: flex !important;
        justify-content: space-between !important;
    }

    .around {
        display: flex !important;
        justify-content: space-around !important;
    }

    .center {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    .border {
        border: 1px solid #000;
    }

    h6 {
        font-family: monospace;
        width: 100%;
        text-align: center;
        line-height: 0.1em;
    }

    h6 span {
        background: #fff;
    }

    .print-image {
        width: 75%;
        position: absolute;
        top: 20%;
        right: 12%;
    }

    .height-response {
        width: 150px;
    }

    .width-response {
        width: 100%;
    }

    .font-response {
        font-size: 20px;
    }

    .font-title {
        font-size: 20px;
    }

    .pad-response {
        padding-bottom: 30px;
    }

    @media (max-width: 700px) {
        .height-response {
            width: 120px;
        }

        .width-response {
            width: 80%;
        }

        .pad-response {
            padding: 0;
        }

        .font-response {
            font-size: 14px !important;
        }

        .font-title {
            font-size: 14px;
        }

        .hide-response {
            display: none;
        }

        .print-image {
            width: 75%;
            position: absolute;
            top: 20%;
            right: 14%;
        }

        .font-sell {
            color: #000 !important;
            line-height: 1 !important;
            font-size: 10px !important;
            font-family: 'Times New Roman', Times, serif !important;
            max-width: 90% !important;
            margin: 0 auto !important;
        }

        .p-sell {
            padding-left: 8px;
            padding-right: 8px;
        }


        .p-total {
            padding: 6px 8px 0 0 !important;
        }

        .p-word {
            padding: 8px !important;
        }

        .m-2 {
            margin-bottom: 5px !important;
        }

        .d-none {
            display: none !important;
        }

        .between {
            display: flex !important;
            justify-content: space-between !important;
        }

        .around {
            display: flex !important;
            justify-content: space-around !important;
        }

        .center {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
        }

        .border {
            border: 1px solid #000;
        }

        h6 {
            font-family: monospace;
            width: 100%;
            text-align: center;
            line-height: 0.1em;
        }

        h6 span {
            background: #fff;
        }
    }
</style>
<img src="{{ asset('/uploads/media/mauhoadon1.png') }}" style="width: 100%; height:-webkit-fill-available; position:absolute; z-index:1234; top:-16px; right:0" alt="" class="hide-response">
<img src="{{ asset('/uploads/media/trongdong.jpg') }}" style="opacity: 0.3;" class="print-image">
<div style="" class="font-sell">
    <div class="row">
        <!-- Logo -->
        @php
        $date = date('d');
        $month = date('m');
        $year = date('Y');
        $time = date('H:i:s');
        @endphp
        {{-- Header logo --}}
        <div style="padding: 2px 0; display: flex; justify-content:space-around; align-items: center; border-bottom: 2px solid black; position:relative">
            {{-- @if (!empty($receipt_details->logo)) --}}
            <div>
                <img style="max-height: 80px; width: auto;" src="{{ asset('/uploads/media/VangtaIcon.png') }}" class="img img-responsive center-block">
                <h6>
                    <span>PhanmemVangta</span>
                </h6>
            </div>
            {{-- @endif --}}
            <center>
                <div>
                    <p class="font-title"><b>HÓA ĐƠN BÁN HÀNG</b> <i>(BILL OF SALE)</i></p>
                    <p>
                        Ngày <i>(Date)</i> <?= $date ?> tháng <i>(month)</i> <?= $month ?> năm <i>(year)</i>
                        <?= $year ?>
                    </p>
                    <p>
                        Mã CQT <i> (Tax AC) </i>: <b>......................</b>
                    </p>
                </div>
            </center>
            <div>
                <p>Số <i>(No.): </i><b>{{ $receipt_details->invoice_no }}</b></p>
                <p>Thời gian <i>(Hour): </i><b>{{ $time }}</b></p>
            </div>
        </div>
        <!-- Header text -->
        @if (!empty($receipt_details->header_text))
        <div class="col-xs-12">
            {!! $receipt_details->header_text !!}
        </div>
        @endif
        <!-- business information here -->
        <div>
            <div>
                <div style="display:flex; align-items:center; justify-content: space-between;border-bottom: 2px solid black; position: relative; padding-top:5px">
                    <div>

                        <p>
                            <!-- Shop & Location Name  -->
                            <b>Đơn vị bán hàng</b> <i>(Seller): </i>
                            @if (!empty($receipt_details->display_name))
                            <b class="font-response">{{ mb_strtoupper($receipt_details->display_name) }}</b>
                            @endif
                        </p>

                        <!-- Address -->
                        <p>
                            <b>Địa chỉ</b> <i>(Address): </i>
                            @if (!empty($receipt_details->address))
                            {!! $receipt_details->address !!}
                            @endif
                        </p>

                        {{-- Phone --}}
                        <p>
                            @php
                            $phone = $receipt_details->contact;
                            $phone = str_replace(
                            '<b>Số di động:</b>',
                            '<b>Số điện thoại</b> <i>(Phone)</i>: ',
                            $receipt_details->contact,
                            );
                            @endphp
                            @if (!empty($receipt_details->contact))
                            {!! $phone !!}
                            @endif
                        </p>
                        <p>
                            <b>Số tài khoản </b> <i>(Bank Account): </i>
                            @if ($receipt_details->accountNumber && $receipt_details->bankName)
                            {!! $receipt_details->accountNumber !!}, {!! $receipt_details->bankName !!}
                            @endif
                            {{-- @if (!empty($receipt_details->contact) && !empty($receipt_details->website))
                                ,
                            @endif
                            @if (!empty($receipt_details->website))
                                {{ $receipt_details->website }}
                            @endif
                            @if (!empty($receipt_details->location_custom_fields))
                            <br>{{ $receipt_details->location_custom_fields }}
                            @endif --}}
                        </p>
                        <p>
                            <b>Mã số thuế </b> <i>(Tax code): </i>
                        </p>
                    </div>
                    <div>
                        <span class="pull-right text-left " style="padding: 20px;">
                            <img src="data:image/png;base64,{{ base64_encode($receipt_details->qrInvoice) }}" alt="">
                        </span>
                    </div>
                </div>
                <div class="pull-right" style="display: none">
                    <span class="pull-left text-left">
                        <!-- Title of receipt -->
                        @if (!empty($receipt_details->invoice_heading))
                        <h3 class="text-center">
                            {!! $receipt_details->invoice_heading == 'Invoice' ? 'Hóa Đơn Giao Dịch' : $receipt_details->invoice_heading !!}
                        </h3>
                        @endif
                        <div class="text-center">
                            <b>{{ $receipt_details->date_label }}</b> {{ $receipt_details->invoice_date }}

                            @if (!empty($receipt_details->due_date_label))
                            <br><b>{{ $receipt_details->due_date_label }}</b>
                            {{ $receipt_details->due_date ?? '' }}
                            @endif

                            @if (!empty($receipt_details->brand_label) || !empty($receipt_details->repair_brand))
                            <br>
                            @if (!empty($receipt_details->brand_label))
                            <b>{!! $receipt_details->brand_label !!}</b>
                            @endif
                            {{ $receipt_details->repair_brand }}
                            @endif


                            @if (!empty($receipt_details->device_label) || !empty($receipt_details->repair_device))
                            <br>
                            @if (!empty($receipt_details->device_label))
                            <b>{!! $receipt_details->device_label !!}</b>
                            @endif
                            {{ $receipt_details->repair_device }}
                            @endif

                            @if (!empty($receipt_details->model_no_label) || !empty($receipt_details->repair_model_no))
                            <br>
                            @if (!empty($receipt_details->model_no_label))
                            <b>{!! $receipt_details->model_no_label !!}</b>
                            @endif
                            {{ $receipt_details->repair_model_no }}
                            @endif

                            @if (!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no))
                            <br>
                            @if (!empty($receipt_details->serial_no_label))
                            <b>{!! $receipt_details->serial_no_label !!}</b>
                            @endif
                            {{ $receipt_details->repair_serial_no }}<br>
                            @endif
                            @if (!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status))
                            @if (!empty($receipt_details->repair_status_label))
                            <b>{!! $receipt_details->repair_status_label !!}</b>
                            @endif
                            {{ $receipt_details->repair_status }}<br>
                            @endif

                            @if (!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty))
                            @if (!empty($receipt_details->repair_warranty_label))
                            <b>{!! $receipt_details->repair_warranty_label !!}</b>
                            @endif
                            {{ $receipt_details->repair_warranty }}
                            <br>
                            @endif

                            <!-- Waiter info -->
                            @if (!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff))
                            <br />
                            @if (!empty($receipt_details->service_staff_label))
                            <b>{!! $receipt_details->service_staff_label !!}</b>
                            @endif
                            {{ $receipt_details->service_staff }}
                            @endif
                            @if (!empty($receipt_details->shipping_custom_field_1_label))
                            <br><strong>{!! $receipt_details->shipping_custom_field_1_label !!} :</strong> {!! $receipt_details->shipping_custom_field_1_value ?? '' !!}
                            @endif

                            @if (!empty($receipt_details->shipping_custom_field_2_label))
                            <br><strong>{!! $receipt_details->shipping_custom_field_2_label !!}:</strong> {!! $receipt_details->shipping_custom_field_2_value ?? '' !!}
                            @endif

                            @if (!empty($receipt_details->shipping_custom_field_3_label))
                            <br><strong>{!! $receipt_details->shipping_custom_field_3_label !!}:</strong> {!! $receipt_details->shipping_custom_field_3_value ?? '' !!}
                            @endif

                            @if (!empty($receipt_details->shipping_custom_field_4_label))
                            <br><strong>{!! $receipt_details->shipping_custom_field_4_label !!}:</strong> {!! $receipt_details->shipping_custom_field_4_value ?? '' !!}
                            @endif

                            @if (!empty($receipt_details->shipping_custom_field_5_label))
                            <br><strong>{!! $receipt_details->shipping_custom_field_2_label !!}:</strong> {!! $receipt_details->shipping_custom_field_5_value ?? '' !!}
                            @endif
                            {{-- sale order --}}
                            @if (!empty($receipt_details->sale_orders_invoice_no))
                            <br>
                            <strong>@lang('restaurant.order_no'):</strong> {!! $receipt_details->sale_orders_invoice_no ?? '' !!}
                            @endif

                            @if (!empty($receipt_details->sale_orders_invoice_date))
                            <br>
                            <strong>@lang('lang_v1.order_dates'):</strong> {!! $receipt_details->sale_orders_invoice_date ?? '' !!}
                            @endif
                        </div>

                    </span>
                </div>
            </div>

            <p>
                @if (!empty($receipt_details->sub_heading_line1))
                {{ $receipt_details->sub_heading_line1 }}
                @endif
                @if (!empty($receipt_details->sub_heading_line2))
                <br>{{ $receipt_details->sub_heading_line2 }}
                @endif
                @if (!empty($receipt_details->sub_heading_line3))
                <br>{{ $receipt_details->sub_heading_line3 }}
                @endif
                @if (!empty($receipt_details->sub_heading_line4))
                <br>{{ $receipt_details->sub_heading_line4 }}
                @endif
                @if (!empty($receipt_details->sub_heading_line5))
                <br>{{ $receipt_details->sub_heading_line5 }}
                @endif
            </p>
            <p>
                @if (!empty($receipt_details->tax_info1))
                <b>{{ $receipt_details->tax_label1 }}</b> {{ $receipt_details->tax_info1 }}
                @endif

                @if (!empty($receipt_details->tax_info2))
                <b>{{ $receipt_details->tax_label2 }}</b> {{ $receipt_details->tax_info2 }}
                @endif
            </p>

            <!-- Invoice  number, Date  -->
            <div style="width: 100% !important; position: relative;">
                <span class="pull-left text-left word-wrap" style="width: 100% !important">
                    <!-- customer info -->
                    <p>
                        <b>Tên khách hàng </b> <i>(Customer's name): </i>
                        @if (!empty($receipt_details->customer_info))
                        {{ str_replace('<br>', '', $receipt_details->customer_name) }}
                        @endif
                    </p>
                    <p>
                        <b>Số điện thoại </b> <i>(Phone): </i>
                        @if (!empty($receipt_details->customer_mobile))
                        {{ str_replace('<br>', '', $receipt_details->customer_mobile) }}
                        @endif
                    </p>
                    <p>
                        <b>Địa chỉ </b> <i>(Address): </i>
                    </p>
                    <p>
                        <b>Hình thức thanh toán </b> <i>(Payment method): </i>
                        Tiền mặt/Chuyển khoản
                    </p>

                    @if (!empty($receipt_details->customer_tax_number))
                    <p>
                        <b>Mã số thuế </b><i>(Tax code): </i>
                        {{ str_replace('<br>', '', $receipt_details->customer_tax_number) }}
                    </p>
                    @endif
                    @if (!empty($receipt_details->client_id_label))
                    <b>{{ $receipt_details->client_id_label }}</b> {{ $receipt_details->client_id }}
                    @endif

                    @if (!empty($receipt_details->customer_custom_fields))
                    {!! $receipt_details->customer_custom_fields !!}
                    @endif
                    @if (!empty($receipt_details->sales_person_label))
                    <b>{{ $receipt_details->sales_person_label }}</b> {{ $receipt_details->sales_person }}
                    @endif
                    @if (!empty($receipt_details->customer_rp_label))
                    <strong>{{ $receipt_details->customer_rp_label }}</strong>
                    {{ $receipt_details->customer_total_rp }}
                    @endif
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        @includeIf('sale_pos.receipts.partial.common_repair_invoice')
    </div>
    @php
    $totalsell = 0;
    $totalbuy = 0;
    @endphp
    <div class="row">
        <div class="col-xs-12" style="padding: 0 0 10px 0">
            @if ($receipt_details->lines)
            {{-- <p>#Bán</p> --}}
            @php
            $totalquantity = 0;
            $p_width = 40;
            @endphp
            @if (!empty($receipt_details->item_discount_label))
            @php
            $p_width -= 15;
            @endphp
            @endif

            <table class=" table-responsive table-bordered table-slim table-image">
                <thead>
                    <tr>
                        <th class="text-center " width="13%">Loại hàng <i style="font-weight: normal">(Item)</i>
                        </th>
                        <th class="text-center " width="10%">SL <i style="font-weight: normal">(Quantity)</i>
                        </th>
                        <th class="text-center " width="10%">TL Tổng <i style="font-weight: normal">(Total)</i>
                        </th>
                        <th class="text-center " width="10%">TL hột <i style="font-weight: normal">(Weight)</i>
                        </th>
                        <th class="text-center " width="10%">TL vàng <i style="font-weight: normal">(Weight)</i>
                        </th>
                        <th class="text-center " width="14%">Hàm lượng <i style="font-weight: normal">(Purify)</i>
                        </th>
                        <th class="text-center " width="10%">Đơn giá /100(chỉ)</th>
                        <th class="text-center " width="10%">Giá công <i style="font-weight: normal">(Labor)</i>
                        </th>
                        <th class="text-center " width="13%">Thành tiền <i style="font-weight: normal">(Amount)</i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($receipt_details->lines as $line)
                    <tr>
                        @php
                        $quantity = intval($line['quantity']);
                        $totalquantity += $quantity;
                        $goden_weight = 0;
                        @endphp
                        @if ($line['total_weight'])
                        @php
                        $goden_weight = $line['total_weight'] - $line['seed_weight'];
                        $unit_price = str_replace(',', '', $line['unit_price']) * $quantity;
                        $totalline = ($line['price'] * $goden_weight) / 100 + $unit_price;
                        $totalsell += $totalline;
                        @endphp
                        @endif
                        <td class="text-center ">
                            {{ $line['name'] }} {{ $line['product_variation'] }}
                            {{ $line['variation'] }}
                        </td>
                        <td width="10%" class="text-center ">{{ $quantity }}</td>
                        <td width="10%" class="text-center ">{{ $line['total_weight'] }}</td>
                        <td width="10%" class="text-center ">{{ $line['seed_weight'] }}</td>
                        <td width="10%" class="text-center ">{{ $goden_weight }}</td>
                        <td width="10%" class="text-center ">{{ $line['golden_age'] }}</td>
                        <td width="10%" class="text-center ">
                            {{ number_format($line['price'], 0, ',', ',') }}
                        </td>
                        <td width="10%" class="text-center ">
                            {{ number_format($unit_price, 0, ',', ',') }}
                        </td>
                        <td width="10%" class="text-center ">
                            {{ number_format($totalline, 0, ',', ',') }}
                        </td>
                    </tr>

                    @if (!empty($line['modifiers']))
                    @foreach ($line['modifiers'] as $modifier)
                    <tr>
                        <td>
                            {{ $modifier['name'] }} {{ $modifier['variation'] }}
                            @if (!empty($modifier['sub_sku']))
                            , {{ $modifier['sub_sku'] }}
                            @endif
                            @if (!empty($modifier['cat_code']))
                            , {{ $modifier['cat_code'] }}
                            @endif
                            @if (!empty($modifier['sell_line_note']))
                            ({{ $modifier['sell_line_note'] }})
                            @endif
                        </td>
                        <td class=" text-right">{{ $modifier['quantity'] }}
                            {{ $modifier['units'] }}
                        </td>

                    </tr>
                    @endforeach
                    @endif

                    @empty
                    {{-- <tr>
                                <td colspan="4">&nbsp;</td>
                            </tr> --}}
                    @endforelse
                    @forelse($receipt_details->lines_buy as $lines_buy)
                    <tr>
                        @php
                        $totalline_buy = 0;
                        $goden_weight = 0;
                        @endphp
                        @if ($lines_buy['total_weight'])
                        @php
                        $goden_weight = $lines_buy['total_weight'] - $lines_buy['weight_seed'];
                        $totalline_buy = ($lines_buy['price'] * $goden_weight) / 100;
                        $totalbuy += $totalline_buy;
                        @endphp
                        @endif

                        <td width="10%" class="text-center">{{ $lines_buy['sectors'] }} (Thu lại)
                        </td>
                        <td width="10%" class="text-center"></td>
                        <td width="10%" class="text-center">{{ $lines_buy['total_weight'] }}</td>
                        <td width="10%" class="text-center">{{ $lines_buy['weight_seed'] }}</td>
                        <td width="10%" class="text-center">{{ round($goden_weight, 2) }}</td>
                        <td width="10%" class="text-center">
                            {{ $lines_buy['golden_age'] }}
                        </td>
                        <td width="10%" class="text-center">
                            {{ number_format($lines_buy['price'], 0, ',', ',') }}
                        </td>
                        <td width="10%" class="text-center"></td>
                        <td width="10%" class="text-center">
                            {{ number_format($totalline_buy, 0, ',', ',') }}
                        </td>
                    </tr>
                    @empty
                    {{-- <tr>
                                <td colspan="4">&nbsp;</td>
                            </tr> --}}
                    @endforelse
                    @php
                    if ($receipt_details->lines && $receipt_details->lines_buy) {
                    $buy_sell = count($receipt_details->lines) + count($receipt_details->lines_buy);
                    } elseif ($receipt_details->lines) {
                    $buy_sell = count($receipt_details->lines);
                    } else {
                    $buy_sell = count($receipt_details->lines_buy);
                    }
                    $tr = '<tr height="20px" class="hide-response">
                        <td class="text-center"></td>
                        <td width="10%" class="text-center"></td>
                        <td width="10%" class="text-center"></td>
                        <td width="10%" class="text-center"></td>
                        <td width="10%" class="text-center"></td>
                        <td width="10%" class="text-center"></td>
                        <td width="10%" class="text-center"></td>
                        <td width="10%" class="text-center"></td>
                        <td width="10%" class="text-center"></td>
                    </tr>';
                    @endphp
                    @if ($buy_sell < 3) @for ($i=0; $i < 6; $i++) {!! $tr !!} @endfor @elseif($buy_sell < 5) @for ($i=0; $i < 4; $i++) {!! $tr !!} @endfor @elseif($buy_sell < 7) @for ($i=0; $i < 2; $i++) {!! $tr !!} @endfor @endif </tbody>
            </table>
            @endif
        </div>
        <div style="position: relative; border: 1px solid black;">
            @if ($receipt_details->lines)
            <p class="p-sell pt-2 text-right">
                <b>Thành tiền bán </b><i style="font-weight: normal">(Sell amount): </i>
                {{ number_format($totalsell, 0, ',', ',') }}
            </p>
            @endif
            @if ($receipt_details->lines_buy)
            <p class="text-right p-sell">
                <b>Thành tiền mua </b><i style="font-weight: normal">(Buy amount): </i>
                {{ number_format($totalbuy, 0, ',', ',') }}
            </p>
            @endif
            {{-- @if ($receipt_details->lines_buy && $receipt_details->lines) --}}
            <p class="text-right p-sell">
                <b>Tổng tiền thanh toán </b><i style="font-weight: normal">(Total): </i>
                {{ number_format($totalsell - $totalbuy, 0, ',', ',') }}
            </p>
            {{-- @endif --}}
            <div class="p-word">
                <b>
                    Số tiền bằng chữ <i style="font-weight: normal">(Amount in words)</i>:
                </b>
                @if ($receipt_details->total > 0)
                {{ ucwords(preg_replace('/^âm/', '', $receipt_details->words)) }}
                @else
                <b>*Trả lại </b><i>(Refund):</i>
                {{ ucwords(preg_replace('/^âm/', '', $receipt_details->words)) }}
                @endif
            </div>
        </div>
    </div>

    <div class="row" style="display: none">
        <div class="col-md-12">
        </div>
        <div class="col-xs-6">

            <table class="table table-slim">
                @if ($receipt_details->lines)
                <tr>
                    <th class="text-left">Thành tiền bán</th>
                    <td class="text-right">{{ number_format($totalsell, 0, ',', ',') }}</td>
                </tr>
                @endif
                @if ($receipt_details->lines_buy)
                <tr>
                    <th class="text-left">Thành tiền mua</th>
                    <td class="text-right">{{ number_format($totalbuy, 0, ',', ',') }}</td>
                </tr>
                @endif
                @if ($receipt_details->lines_buy && $receipt_details->lines)
                <tr>
                    <th class="text-left">Tổng tiền</th>
                    <td class="text-right">{{ number_format($totalsell - $totalbuy, 0, ',', ',') }}</td>
                </tr>
                @endif
                @if (!empty($receipt_details->payments))
                @foreach ($receipt_details->payments as $payment)
                <!-- <tr>
    <td>{{ $payment['method'] }}</td>
    <td class="text-right">{{ $payment['amount'] }}</td>
    <td class="text-right">{{ $payment['date'] }}</td>
   </tr> -->
                @endforeach
                @endif

                <!-- Total Paid-->
                @if (!empty($receipt_details->total_paid))
                <!-- <tr>
    <th>
     {!! $receipt_details->total_paid_label !!}
    </th>
    <td class="text-right">
     {{ $receipt_details->total_paid }}
    </td>
   </tr> -->
                @endif

                <!-- Total Due-->
                @if (!empty($receipt_details->total_due))
                <!-- <tr>
    <th>
     {!! $receipt_details->total_due_label !!}
    </th>
    <td class="text-right">
     {{ $receipt_details->total_due }}
    </td>
   </tr> -->
                @endif

                @if (!empty($receipt_details->all_due))
                <!-- <tr>
    <th>
     {!! $receipt_details->all_bal_label !!}
    </th>
    <td class="text-right">
     {{ $receipt_details->all_due }}
    </td>
   </tr> -->
                @endif
            </table>
        </div>

        <div class="col-xs-6">
            <div class="table-responsive">
                <table class="table table-slim">
                    <tbody>
                        @if (!empty($receipt_details->total_quantity_label))
                        <tr class="color-555">
                            <th style="width:70%">
                                {!! $receipt_details->total_quantity_label !!}
                            </th>
                            <td class="text-right">
                                {{ $receipt_details->total_quantity }}
                            </td>
                        </tr>
                        @endif
                        @if (!empty($receipt_details->total_exempt_uf))
                        <tr>
                            <th style="width:70%">
                                @lang('lang_v1.exempt')
                            </th>
                            <td class="text-right">
                                {{ $receipt_details->total_exempt }}
                            </td>
                        </tr>
                        @endif
                        <!-- Shipping Charges -->
                        @if (!empty($receipt_details->shipping_charges))
                        <tr>
                            <th style="width:70%">
                                {!! $receipt_details->shipping_charges_label !!}
                            </th>
                            <td class="text-right">
                                {{ '₫ ' . number_format(floatval(str_replace(',', '', str_replace('₫ ', '', $receipt_details->shipping_charges))), 0, '.', ',') }}
                            </td>
                        </tr>
                        @endif

                        @if (!empty($receipt_details->packing_charge))
                        <tr>
                            <th style="width:70%">
                                {!! $receipt_details->packing_charge_label !!}
                            </th>
                            <td class="text-right">
                                {{ $receipt_details->packing_charge }}
                            </td>
                        </tr>
                        @endif

                        <!-- Discount -->
                        @if (!empty($receipt_details->discount))
                        <tr>
                            <th>
                                {!! $receipt_details->discount_label !!}
                            </th>

                            <td class="text-right">
                                (-) {{ $receipt_details->discount }}
                            </td>
                        </tr>
                        @endif

                        @if (!empty($receipt_details->reward_point_label))
                        <tr>
                            <th>
                                {!! $receipt_details->reward_point_label !!}
                            </th>

                            <td class="text-right">
                                (-) {{ $receipt_details->reward_point_amount }}
                            </td>
                        </tr>
                        @endif

                        <!-- Tax -->
                        @if (!empty($receipt_details->tax))
                        <tr>
                            <th>
                                {!! $receipt_details->tax_label !!}
                            </th>
                            <td class="text-right">
                                (+) {{ $receipt_details->tax }}
                            </td>
                        </tr>
                        @endif

                        @if ($receipt_details->round_off_amount > 0)
                        <tr>
                            <th>
                                {!! $receipt_details->round_off_label !!}
                            </th>
                            <td class="text-right">
                                {{ $receipt_details->round_off }}
                            </td>
                        </tr>
                        @endif
                        <!-- Total -->
                        @if (intval($receipt_details->total - ($totalsell - $totalbuy)) > 2)
                        <tr>
                            <th>
                                Tổng phụ phí
                            </th>
                            <td class="text-right">
                                {{ intval($receipt_details->total - ($totalsell - $totalbuy)) }}
                                @if (!empty($receipt_details->total_in_words))
                                <br>
                                <small>({{ $receipt_details->total_in_words }})</small>
                                @endif
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>


        <div class="col-xs-12">
            <p>{!! nl2br($receipt_details->additional_notes) !!}</p>
        </div>
    </div>
    <div class="col-md-12">
    </div>
    @if ($receipt_details->show_barcode)
    <div class="row">
        <div class="col-xs-12">
            {{-- Barcode --}}
            <img class="center-block" src="data:image/png;base64,{{ DNS1D::getBarcodePNG($receipt_details->invoice_no, 'C128', 2, 30, [39, 48, 54], true) }}">
        </div>
    </div>
    @endif

    @if (!empty($receipt_details->footer_text))
    <div class="row">
        <div class="col-xs-12">
            {!! $receipt_details->footer_text !!}
        </div>
    </div>
    @endif
    <div>
        <div class="p-word between" style="position: relative;" class="height-response">
            <p>Người mua hàng <i>(Customer)</i></p>
            <p>Người bán hàng <i>(Seller)</i></p>
            <div>
                <p>Chuyển khoản <i>(QR Code)</i></p>
                <div style="width:100%" class="center">
                    <!-- QR-code -->
                    @if ($receipt_details->total > 0 && $receipt_details->qrCode)
                    <div style="width:100%;display: flex;flex-direction: column;" class="center">
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
        <center style="position: relative" class="pad-response">
            <div>
                <small> <b><i>(Cần kiểm tra, đối chiếu hóa đơn) </i></b><i>(Need to check and compare
                        invoice)</i></small>
            </div>
            <div>
                <small><b>Tra cứu trực tuyến tại </b><i>(Retrieve invoice online at):
                    </i><b>{{ $receipt_details->website }}bill/invoice/</b></small>
            </div>
            <div>
                <small><b>Mã tra cứu </b><i>(Retrieve Code): </i><b>{{ $receipt_details->tokenInvoice }}</b></small>
            </div>
        </center>
    </div>

</div>