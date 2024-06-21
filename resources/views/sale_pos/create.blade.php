@extends('layouts.app')

@section('title', __('sale.pos_sale'))

@section('content')
    <section class="content no-print">
        <input type="hidden" id="amount_rounding_method" value="{{ $pos_settings['amount_rounding_method'] ?? '' }}">
        @if (!empty($pos_settings['allow_overselling']))
            <input type="hidden" id="is_overselling_allowed">
        @endif
        @if (session('business.enable_rp') == 1)
            <input type="hidden" id="reward_point_enabled">
        @endif
        @php
            $is_discount_enabled = $pos_settings['disable_discount'] != 1 ? true : false;
            $is_rp_enabled = session('business.enable_rp') == 1 ? true : false;
        @endphp
        {!! Form::open(['url' => action('BuySellPosController@store'), 'method' => 'post', 'id' => 'add_pos_sell_form']) !!}
        <div class="row mb-12">
            <div class="col-md-12">
                <div class="row">
                    <div
                        class="@if (empty($pos_settings['hide_product_suggestion'])) col-md-8 @else col-md-10 col-md-offset-1 @endif no-padding pr-12">
                        <div class="box box-solid mb-12">
                            <div class="box-body pb-0">
                                {!! Form::hidden('location_id', $default_location->id ?? null, [
                                    'id' => 'location_id',
                                    'data-receipt_printer_type' => !empty($default_location->receipt_printer_type)
                                        ? $default_location->receipt_printer_type
                                        : 'browser',
                                    'data-default_payment_accounts' => $default_location->default_payment_accounts ?? '',
                                ]) !!}
                                <!-- sub_type -->
                                {!! Form::hidden('sub_type', isset($sub_type) ? $sub_type : null) !!}
                                <input type="hidden" id="item_addition_method"
                                    value="{{ $business_details->item_addition_method }}">
                                <input type="hidden" name="sales_form" id="sales_form" value="retail">

                                @include('sale_pos.partials.pos_form')
                                @include('sale_pos.partials.pos_form_totals')

                                @include('sale_pos.partials.payment_modal')

                                @if (empty($pos_settings['disable_suspend']))
                                    @include('sale_pos.partials.suspend_note_modal')
                                @endif

                                @if (empty($pos_settings['disable_recurring_invoice']))
                                    @include('sale_pos.partials.recurring_invoice_modal')
                                @endif
                            </div>
                        </div>
                    </div>
                    @if (empty($pos_settings['hide_product_suggestion']) && !isMobile())
                        <div class="col-md-4 no-padding">
                            @include('sale_pos.partials.pos_sidebar')

                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('sale_pos.partials.pos_form_actions')
        {!! Form::close() !!}
    </section>

    <!-- This will be printed -->
    <section class="invoice print_section" id="receipt_section">
    </section>
    <div class="modal fade contact_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        @include('contact.create', ['quick_add' => true])
    </div>
    @if (empty($pos_settings['hide_product_suggestion']) && isMobile())
        @include('sale_pos.partials.mobile_product_suggestions')
    @endif
    <!-- /.content -->
    <div class="modal fade register_details_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <div class="modal fade close_register_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>
    <!-- quick product modal -->
    <div class="modal fade quick_add_product_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle"></div>

    @include('sale_pos.partials.configure_search_modal')

    @include('sale_pos.partials.recent_transactions_modal')

    @include('sale_pos.partials.weighing_scale_modal')

@stop
@section('css')
    <!-- include module css -->
    @if (!empty($pos_module_data))
        @foreach ($pos_module_data as $key => $value)
            @if (!empty($value['module_css_path']))
                @includeIf($value['module_css_path'])
            @endif
        @endforeach
    @endif
@stop
@section('javascript')
    <script src="{{ asset('js/pos.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/printer.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/product.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/opening_stock.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/purchase.js?v=' . $asset_v) }}"></script>
    <script src="{{ asset('js/buysell.js?v=' . $asset_v) }}"></script>

    <script src="">
        $(document).ready(function() {
            $('.price').on('input', function() {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
                // Add comma in number
                $(this).val($(this).val().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            })
        });
    </script>
    @include('sale_pos.partials.keyboard_shortcuts')
    <!-- Call restaurant module if defined -->
    @if (in_array('tables', $enabled_modules) ||
            in_array('modifiers', $enabled_modules) ||
            in_array('service_staff', $enabled_modules))
        <script src="{{ asset('js/restaurant.js?v=' . $asset_v) }}"></script>
        <script src="">
            const iframe = document.getElementById('myFrame');
            iframe.addEventListener('load', function() {
                const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                const anchorTags = iframeDocument.getElementsByTagName('a');
                for (let i = 0; i < anchorTags.length; i++) {
                    anchorTags[i].addEventListener('click', function(event) {
                        event.preventDefault();
                    });
                }
            });
        </script>
    @endif
    <style>
        .swal-footer {
            text-align: right;
            padding-top: 13px;
            margin-top: 13px;
            padding: 13px 16px;
            border-radius: inherit;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            display: flex;
            justify-content: center;
        }

        .swal-button--confirm {
            background: rgba(25, 135, 84);
            color: #fff;
        }

        .swal-button--cancel {
            background: #dc3545;
            color: #fff;

        }
    </style>
    <!-- include module js -->
    @if (!empty($pos_module_data))
        @foreach ($pos_module_data as $key => $value)
            @if (!empty($value['module_js_path']))
                @includeIf($value['module_js_path'], ['view_data' => $value['view_data']])
            @endif
        @endforeach
    @endif
@endsection
