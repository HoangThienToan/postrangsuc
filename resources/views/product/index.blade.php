@extends('layouts.app')
@section('title', __('sale.products'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@lang('sale.products')
        <small>@lang('lang_v1.manage_products')</small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @component('components.filters', ['title' => __('report.filters')])
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('type', __('product.product_type') . ':') !!}
                    {!! Form::select('type', ['single' => __('lang_v1.single'), 'variable' => __('lang_v1.variable'), 'combo' => __('lang_v1.combo')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_type', 'placeholder' => __('lang_v1.all')]); !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('category_id', __('product.category') . ':') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_category_id', 'placeholder' => __('lang_v1.all')]); !!}
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('unit_id', __('product.unit') . ':') !!}
                    {!! Form::select('unit_id', $units, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_unit_id', 'placeholder' => __('lang_v1.all')]); !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('tax_id', __('product.tax') . ':') !!}
                    {!! Form::select('tax_id', $taxes, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_tax_id', 'placeholder' => __('lang_v1.all')]); !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('brand_id', __('product.brand') . ':') !!}
                    {!! Form::select('brand_id', $brands, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'product_list_filter_brand_id', 'placeholder' => __('lang_v1.all')]); !!}
                </div>
            </div>
            <div class="col-md-3" id="location_filter">
                <div class="form-group">
                    {!! Form::label('location_id', __('purchase.business_location') . ':') !!}
                    {!! Form::select('location_id', $business_locations, null, ['class' => 'form-control select2', 'style' => 'width:100%', 'placeholder' => __('lang_v1.all')]); !!}
                </div>
            </div>
            <div class="col-md-3">
                <br>
                <div class="form-group">
                    {!! Form::select('active_state', ['active' => __('business.is_active'), 'inactive' => __('lang_v1.inactive')], null, ['class' => 'form-control select2', 'style' => 'width:100%', 'id' => 'active_state', 'placeholder' => __('lang_v1.all')]); !!}
                </div>
            </div>

            <!-- include module filter -->
            @if(!empty($pos_module_data))
            @foreach($pos_module_data as $key => $value)
            @if(!empty($value['view_path']))
            @includeIf($value['view_path'], ['view_data' => $value['view_data']])
            @endif
            @endforeach
            @endif

            <div class="col-md-3">
                <div class="form-group">
                    <br>
                    <label>
                        {!! Form::checkbox('not_for_selling', 1, false, ['class' => 'input-icheck', 'id' => 'not_for_selling']); !!} <strong>@lang('lang_v1.not_for_selling')</strong>
                    </label>
                </div>
            </div>
            @if($is_woocommerce)
            <div class="col-md-3">
                <div class="form-group">
                    <br>
                    <label>
                        {!! Form::checkbox('woocommerce_enabled', 1, false,
                        [ 'class' => 'input-icheck', 'id' => 'woocommerce_enabled']); !!} {{ __('lang_v1.woocommerce_enabled') }}
                    </label>
                </div>
            </div>
            @endif
            @endcomponent
        </div>
    </div>
    @can('product.view')
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#product_list_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cubes" aria-hidden="true"></i> @lang('lang_v1.all_products')</a>
                    </li>
                    @can('stock_report.view')
                    <li>
                        <a href="#product_stock_report" data-toggle="tab" aria-expanded="true"><i class="fa fa-hourglass-half" aria-hidden="true"></i> @lang('report.stock_report')</a>
                    </li>
                    @endcan
                    <li>
                        <a href="#product_inventory" data-toggle="tab" aria-expanded="true"><i class="fa fa-clipboard" aria-hidden="true"></i></i> Kiểm kê kho</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="product_list_tab">
                        @can('product.create')
                        <a class="btn btn-primary pull-right" href="{{action('ProductController@create')}}">
                            <i class="fa fa-plus"></i> @lang('messages.add')</a>
                        <br><br>
                        @endcan
                        @include('product.partials.product_list')
                    </div>
                    @can('stock_report.view')
                    <div class="tab-pane" id="product_stock_report">
                        @include('report.partials.stock_report_table')
                    </div>
                    @endcan
                    <div class="tab-pane" id="product_inventory">
                        <div class="box box-solid">
                            <div class="box-header">
                                <h3 class="box-title">{{ __('stock_adjustment.search_products') }}</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <br>
                                    {!! Form::checkbox('auto_hide', 1, true,
                                    [ 'class' => 'input-icheck', 'id' => 'auto_hide']); !!} Tự động ẩn nếu kiểm hàng không có vấn đề
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                                {!! Form::text('search_product', null, ['class' => 'form-control', 'id' => 'search_product_for_inventory', 'placeholder' => 'Tìm sản phẩm để kiểm kê kho']); !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <input type="hidden" id="product_row_index" value="0">
                                        <input type="hidden" id="total_amount" name="final_total" value="0">
                                        {!! Form::open(['url' => action('ProductController@saveInventory'), 'method' => 'post',
                                        'id' => 'product_inventory','class' => 'product_form']) !!}
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-condensed" id="inventory_product_table">
                                                <thead>
                                                    <tr>
                                                        <th class="col-sm-2 text-center">
                                                            @lang('sale.product')
                                                        </th>
                                                        <th class=" text-center">
                                                            @lang('sale.qty') kiểm kho
                                                        </th>
                                                        <th class=" text-center">
                                                            @lang('sale.qty') thực tế
                                                        </th>
                                                        <th class="col-sm-2 text-center">
                                                            @lang('sale.unit_price') (Công)
                                                        </th>
                                                        <th class="col-sm-2 text-center">
                                                            @lang('sale.subtotal')
                                                        </th>
                                                        <th class="col-sm-2 text-center">
                                                            Tình trạng
                                                        </th>
                                                        <th class="text-center"><i class="fa fa-trash" aria-hidden="true"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="text-center">
                                                        <td>
                                                            <div class="pull-right"><b>Tổng mã hàng:</b> <span id="row_index">0.00</span></div>
                                                        </td>
                                                        <td>
                                                            <div > <span id="total_argument">0.00</span></div>
                                                        </td>
                                                        <td>
                                                            <div class="pull-right"><b>Tổng SL:</b> <span id="total_qty">0.00</span></div>
                                                        </td>
                                                        <td></td>

                                                        <td>
                                                            <div class="pull-right"><b>@lang('stock_adjustment.total_amount'):</b> <span id="total_inventory">0.00</span></div>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-9">
                                                <br>
                                                {!! Form::checkbox('delete_redundancy', 1, false,
                                                [ 'class' => 'input-icheck', 'id' => 'delete_redundancy']); !!} Hãy kiểm tra đủ số hàng của bạn trước, tùy chọn này sẽ xóa tất cả sản phẩm dư thừa nếu không nằm trong danh sách các sản phẩm (nếu nó chưa từng được giao dịch), chúng tôi không khuyến cáo sử dụng nó vì không thể hoàn trả lại những sản phẩm đã xóa.
                                            </div>
                                            <button type="submit" class="btn btn-primary pull-right ">Lưu</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div> <!--box end-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    <input type="hidden" id="is_rack_enabled" value="{{$rack_enabled}}">

    <div class="modal fade product_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade" id="view_product_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

    <div class="modal fade" id="opening_stock_modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    </div>

    @include('product.partials.edit_product_location_modal')

</section>
<!-- /.content -->

@endsection

@section('javascript')
<script src="{{ asset('js/product.js?v=' . $asset_v) }}"></script>
<script src="{{ asset('js/opening_stock.js?v=' . $asset_v) }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        product_table = $('#product_table').DataTable({
            processing: true,
            serverSide: true,
            aaSorting: [
                [12, 'desc']
            ],
            scrollY: "75vh",
            scrollX: true,
            scrollCollapse: true,
            "ajax": {
                "url": "/products",
                "data": function(d) {
                    d.type = $('#product_list_filter_type').val();
                    d.category_id = $('#product_list_filter_category_id').val();
                    d.brand_id = $('#product_list_filter_brand_id').val();
                    d.unit_id = $('#product_list_filter_unit_id').val();
                    d.tax_id = $('#product_list_filter_tax_id').val();
                    d.active_state = $('#active_state').val();
                    d.not_for_selling = $('#not_for_selling').is(':checked');
                    d.location_id = $('#location_id').val();
                    if ($('#repair_model_id').length == 1) {
                        d.repair_model_id = $('#repair_model_id').val();
                    }

                    if ($('#woocommerce_enabled').length == 1 && $('#woocommerce_enabled').is(':checked')) {
                        d.woocommerce_enabled = 1;
                    }

                    d = __datatable_ajax_callback(d);
                }
            },
            "ajax": {
                "url": "/products",
                "data": function(d) {
                    d.type = $('#product_list_filter_type').val();
                    d.category_id = $('#product_list_filter_category_id').val();
                    d.brand_id = $('#product_list_filter_brand_id').val();
                    d.unit_id = $('#product_list_filter_unit_id').val();
                    d.tax_id = $('#product_list_filter_tax_id').val();
                    d.active_state = $('#active_state').val();
                    d.not_for_selling = $('#not_for_selling').is(':checked');
                    d.location_id = $('#location_id').val();
                    if ($('#repair_model_id').length == 1) {
                        d.repair_model_id = $('#repair_model_id').val();
                    }

                    if ($('#woocommerce_enabled').length == 1 && $('#woocommerce_enabled').is(':checked')) {
                        d.woocommerce_enabled = 1;
                    }

                    d = __datatable_ajax_callback(d);
                }
            },

            columnDefs: [{
                "targets": [0, 1, 2],
                "orderable": false,
                "searchable": false
            }],

            columns: [{
                    data: 'mass_delete'
                },
                {
                    data: 'image',
                    name: 'products.image'
                },
                {
                    data: 'action',
                    name: 'action'
                },
                {
                    data: 'product',
                    name: 'products.name'
                },
                {
                    data: 'product_locations',
                    name: 'product_locations'
                },
                @can('view_purchase_price') {
                    data: 'purchase_price',
                    name: 'max_purchase_price',
                    searchable: false
                },
                @endcan
                @can('access_default_selling_price') {
                    data: 'selling_price',
                    name: 'max_price',
                    searchable: false
                },
                @endcan {
                    data: 'current_stock',
                    searchable: false
                },
                {
                    data: 'type',
                    name: 'products.type'
                },
                {
                    data: 'category',
                    name: 'c1.name'
                },
                {
                    data: 'brand',
                    name: 'brands.name'
                },
                {
                    data: 'tax',
                    name: 'tax_rates.name',
                    searchable: false
                },
                {
                    data: 'sku',
                    name: 'products.sku'
                },
                {
                    data: 'weight',
                    name: 'products.weight'
                },
                {
                    data: 'seed_weight',
                    name: 'products.seed_weight'
                },
                {
                    data: 'golden_age',
                    name: 'products.golden_age'
                },
                {
                    data: 'product_custom_field1',
                    name: 'products.product_custom_field1'
                },
                {
                    data: 'product_custom_field2',
                    name: 'products.product_custom_field2'
                },
                {
                    data: 'product_custom_field3',
                    name: 'products.product_custom_field3'
                },
                {
                    data: 'product_custom_field4',
                    name: 'products.product_custom_field4'
                }

            ],
            createdRow: function(row, data, dataIndex) {
                if ($('input#is_rack_enabled').val() == 1) {
                    var target_col = 0;
                    @can('product.delete')
                    target_col = 1;
                    @endcan
                    $(row).find('td:eq(' + target_col + ') div').prepend('<i style="margin:auto;" class="fa fa-plus-circle text-success cursor-pointer no-print rack-details" title="' + LANG.details + '"></i>&nbsp;&nbsp;');
                }
                $(row).find('td:eq(0)').attr('class', 'selectable_td');
            },
            fnDrawCallback: function(oSettings) {
                __currency_convert_recursively($('#product_table'));
            },
        });
        // Array to track the ids of the details displayed rows
        var detailRows = [];

        $('#product_table tbody').on('click', 'tr i.rack-details', function() {
            var i = $(this);
            var tr = $(this).closest('tr');
            var row = product_table.row(tr);
            var idx = $.inArray(tr.attr('id'), detailRows);

            if (row.child.isShown()) {
                i.addClass('fa-plus-circle text-success');
                i.removeClass('fa-minus-circle text-danger');

                row.child.hide();

                // Remove from the 'open' array
                detailRows.splice(idx, 1);
            } else {
                i.removeClass('fa-plus-circle text-success');
                i.addClass('fa-minus-circle text-danger');

                row.child(get_product_details(row.data())).show();

                // Add to the 'open' array
                if (idx === -1) {
                    detailRows.push(tr.attr('id'));
                }
            }
        });

        $('table#product_table tbody').on('click', 'a.delete-product', function(e) {
            e.preventDefault();
            swal({
                title: LANG.sure,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var href = $(this).attr('href');
                    $.ajax({
                        method: "DELETE",
                        url: href,
                        dataType: "json",
                        success: function(result) {
                            if (result.success == true) {
                                toastr.success(result.msg);
                                product_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        }
                    });
                }
            });
        });

        $(document).on('click', '#delete-selected', function(e) {
            e.preventDefault();
            var selected_rows = getSelectedRows();

            if (selected_rows.length > 0) {
                $('input#selected_rows').val(selected_rows);
                swal({
                    title: LANG.sure,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $('form#mass_delete_form').submit();
                    }
                });
            } else {
                $('input#selected_rows').val('');
                swal('@lang("lang_v1.no_row_selected")');
            }
        });

        $(document).on('click', '#deactivate-selected', function(e) {
            e.preventDefault();
            var selected_rows = getSelectedRows();

            if (selected_rows.length > 0) {
                $('input#selected_products').val(selected_rows);
                swal({
                    title: LANG.sure,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var form = $('form#mass_deactivate_form')

                        var data = form.serialize();
                        $.ajax({
                            method: form.attr('method'),
                            url: form.attr('action'),
                            dataType: 'json',
                            data: data,
                            success: function(result) {
                                if (result.success == true) {
                                    toastr.success(result.msg);
                                    product_table.ajax.reload();
                                    form
                                        .find('#selected_products')
                                        .val('');
                                } else {
                                    toastr.error(result.msg);
                                }
                            },
                        });
                    }
                });
            } else {
                $('input#selected_products').val('');
                swal('@lang("lang_v1.no_row_selected")');
            }
        })

        $(document).on('click', '#edit-selected', function(e) {
            e.preventDefault();
            var selected_rows = getSelectedRows();

            if (selected_rows.length > 0) {
                $('input#selected_products_for_edit').val(selected_rows);
                $('form#bulk_edit_form').submit();
            } else {
                $('input#selected_products').val('');
                swal('@lang("lang_v1.no_row_selected")');
            }
        })

        $('table#product_table tbody').on('click', 'a.activate-product', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            $.ajax({
                method: "get",
                url: href,
                dataType: "json",
                success: function(result) {
                    if (result.success == true) {
                        toastr.success(result.msg);
                        product_table.ajax.reload();
                    } else {
                        toastr.error(result.msg);
                    }
                }
            });
        });

        $(document).on('change', '#product_list_filter_type, #product_list_filter_category_id, #product_list_filter_brand_id, #product_list_filter_unit_id, #product_list_filter_tax_id, #location_id, #active_state, #repair_model_id',
            function() {
                if ($("#product_list_tab").hasClass('active')) {
                    product_table.ajax.reload();
                }

                if ($("#product_stock_report").hasClass('active')) {
                    stock_report_table.ajax.reload();
                }
            });

        $(document).on('ifChanged', '#not_for_selling, #woocommerce_enabled', function() {
            if ($("#product_list_tab").hasClass('active')) {
                product_table.ajax.reload();
            }

            if ($("#product_stock_report").hasClass('active')) {
                stock_report_table.ajax.reload();
            }
        });

        $('#product_location').select2({
            dropdownParent: $('#product_location').closest('.modal')
        });
    });

    $(document).on('shown.bs.modal', 'div.view_product_modal, div.view_modal',
        function() {
            var div = $(this).find('#view_product_stock_details');
            if (div.length) {
                $.ajax({
                    url: "{{action('ReportController@getStockReport')}}" + '?for=view_product&product_id=' + div.data('product_id'),
                    dataType: 'html',
                    success: function(result) {
                        div.html(result);
                        __currency_convert_recursively(div);
                    },
                });
            }
            __currency_convert_recursively($(this));
        });
    var data_table_initailized = false;
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        if ($(e.target).attr('href') == '#product_stock_report') {
            if (!data_table_initailized) {
                //Stock report table
                var stock_report_cols = [{
                        data: 'sku',
                        name: 'variations.sub_sku'
                    },
                    {
                        data: 'product',
                        name: 'p.name'
                    },
                    {
                        data: 'location_name',
                        name: 'l.name'
                    },
                    {
                        data: 'unit_price',
                        name: 'variations.sell_price_inc_tax'
                    },
                    {
                        data: 'stock',
                        name: 'stock',
                        searchable: false
                    },
                    @can('view_product_stock_value') {
                        data: 'stock_price',
                        name: 'stock_price',
                        searchable: false
                    },
                    {
                        data: 'stock_value_by_sale_price',
                        name: 'stock_value_by_sale_price',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'potential_profit',
                        name: 'potential_profit',
                        searchable: false,
                        orderable: false
                    },
                    @endcan {
                        data: 'total_sold',
                        name: 'total_sold',
                        searchable: false
                    },
                    {
                        data: 'total_transfered',
                        name: 'total_transfered',
                        searchable: false
                    },
                    {
                        data: 'total_adjusted',
                        name: 'total_adjusted',
                        searchable: false
                    }
                ];
                if ($('th.current_stock_mfg').length) {
                    stock_report_cols.push({
                        data: 'total_mfg_stock',
                        name: 'total_mfg_stock',
                        searchable: false
                    });
                }
                stock_report_table = $('#stock_report_table').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollY: "75vh",
                    scrollX: true,
                    scrollCollapse: true,
                    ajax: {
                        url: '/reports/stock-report',
                        data: function(d) {
                            d.location_id = $('#location_id').val();
                            d.category_id = $('#product_list_filter_category_id').val();
                            d.brand_id = $('#product_list_filter_brand_id').val();
                            d.unit_id = $('#product_list_filter_unit_id').val();
                            d.type = $('#product_list_filter_type').val();
                            d.active_state = $('#active_state').val();
                            d.not_for_selling = $('#not_for_selling').is(':checked');
                            if ($('#repair_model_id').length == 1) {
                                d.repair_model_id = $('#repair_model_id').val();
                            }
                        }
                    },
                    columns: stock_report_cols,
                    fnDrawCallback: function(oSettings) {
                        __currency_convert_recursively($('#stock_report_table'));
                    },
                    "footerCallback": function(row, data, start, end, display) {
                        var footer_total_stock = 0;
                        var footer_total_sold = 0;
                        var footer_total_transfered = 0;
                        var total_adjusted = 0;
                        var total_stock_price = 0;
                        var footer_stock_value_by_sale_price = 0;
                        var total_potential_profit = 0;
                        var footer_total_mfg_stock = 0;
                        for (var r in data) {
                            footer_total_stock += $(data[r].stock).data('orig-value') ?
                                parseFloat($(data[r].stock).data('orig-value')) : 0;

                            footer_total_sold += $(data[r].total_sold).data('orig-value') ?
                                parseFloat($(data[r].total_sold).data('orig-value')) : 0;

                            footer_total_transfered += $(data[r].total_transfered).data('orig-value') ?
                                parseFloat($(data[r].total_transfered).data('orig-value')) : 0;

                            total_adjusted += $(data[r].total_adjusted).data('orig-value') ?
                                parseFloat($(data[r].total_adjusted).data('orig-value')) : 0;

                            total_stock_price += $(data[r].stock_price).data('orig-value') ?
                                parseFloat($(data[r].stock_price).data('orig-value')) : 0;

                            footer_stock_value_by_sale_price += $(data[r].stock_value_by_sale_price).data('orig-value') ?
                                parseFloat($(data[r].stock_value_by_sale_price).data('orig-value')) : 0;

                            total_potential_profit += $(data[r].potential_profit).data('orig-value') ?
                                parseFloat($(data[r].potential_profit).data('orig-value')) : 0;

                            footer_total_mfg_stock += $(data[r].total_mfg_stock).data('orig-value') ?
                                parseFloat($(data[r].total_mfg_stock).data('orig-value')) : 0;
                        }

                        $('.footer_total_stock').html(__currency_trans_from_en(footer_total_stock, false));
                        $('.footer_total_stock_price').html(__currency_trans_from_en(total_stock_price));
                        $('.footer_total_sold').html(__currency_trans_from_en(footer_total_sold, false));
                        $('.footer_total_transfered').html(__currency_trans_from_en(footer_total_transfered, false));
                        $('.footer_total_adjusted').html(__currency_trans_from_en(total_adjusted, false));
                        $('.footer_stock_value_by_sale_price').html(__currency_trans_from_en(footer_stock_value_by_sale_price));
                        $('.footer_potential_profit').html(__currency_trans_from_en(total_potential_profit));
                        if ($('th.current_stock_mfg').length) {
                            $('.footer_total_mfg_stock').html(__currency_trans_from_en(footer_total_mfg_stock, false));
                        }
                    },
                });
                data_table_initailized = true;
            } else {
                stock_report_table.ajax.reload();
            }
        } else {
            product_table.ajax.reload();
        }
    });

    $(document).on('click', '.update_product_location', function(e) {
        e.preventDefault();
        var selected_rows = getSelectedRows();

        if (selected_rows.length > 0) {
            $('input#selected_products').val(selected_rows);
            var type = $(this).data('type');
            var modal = $('#edit_product_location_modal');
            if (type == 'add') {
                modal.find('.remove_from_location_title').addClass('hide');
                modal.find('.add_to_location_title').removeClass('hide');
            } else if (type == 'remove') {
                modal.find('.add_to_location_title').addClass('hide');
                modal.find('.remove_from_location_title').removeClass('hide');
            }

            modal.modal('show');
            modal.find('#product_location').select2({
                dropdownParent: modal
            });
            modal.find('#product_location').val('').change();
            modal.find('#update_type').val(type);
            modal.find('#products_to_update_location').val(selected_rows);
        } else {
            $('input#selected_products').val('');
            swal('@lang("lang_v1.no_row_selected")');
        }
    });

    $(document).on('submit', 'form#edit_product_location_form', function(e) {
        e.preventDefault();
        var form = $(this);
        var data = form.serialize();

        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            dataType: 'json',
            data: data,
            beforeSend: function(xhr) {
                __disable_submit_button(form.find('button[type="submit"]'));
            },
            success: function(result) {
                if (result.success == true) {
                    $('div#edit_product_location_modal').modal('hide');
                    toastr.success(result.msg);
                    product_table.ajax.reload();
                    $('form#edit_product_location_form')
                        .find('button[type="submit"]')
                        .attr('disabled', false);
                } else {
                    toastr.error(result.msg);
                }
            },
        });
    });


    $(document).ready(function() {
        $("#auto_hide").parent(1).find("ins").click(function() {
            let elements = $("#inventory_product_table tbody").find('input.quantity_status');
            if ($("#auto_hide").is(":checked")) {
                elements.each(function() {
                    if ($(this).val() === "Đủ") {
                        $(this).closest('tr').hide();
                    } else if ($(this).val() === "Thừa") {
                        $(this).closest('tr').show();
                    }
                });
            } else {
                elements.each(function() {
                    $(this).closest('tr').show();
                });
            }
        })

        //Add products
        if ($('#search_product_for_inventory').length > 0) {
            //Add Product
            $('#search_product_for_inventory')
                .autocomplete({
                    source: function(request, response) {
                        $.getJSON(
                            '/products/list', {
                                location_id: $('#location_id').val(),
                                term: request.term
                            },
                            response
                        );
                    },
                    minLength: 2,
                    response: function(event, ui) {
                        if (ui.content.length == 1) {
                            ui.item = ui.content[0];
                            if (ui.item.qty_available > 0 && ui.item.enable_stock == 1) {
                                $(this)
                                    .data('ui-autocomplete')
                                    ._trigger('select', 'autocompleteselect', ui);
                                $(this).autocomplete('close');
                            }
                        } else if (ui.content.length == 0) {
                            swal(LANG.no_products_found);
                        }
                    },
                    focus: function(event, ui) {
                        if (ui.item.qty_available <= 0) {
                            return false;
                        }
                    },
                    select: function(event, ui) {
                        if (ui.item.qty_available > 0) {
                            $(this).val(null);
                            inventory_product_row(ui.item.variation_id);
                        } else {
                            alert(LANG.out_of_stock);
                        }
                    },
                })
                .autocomplete('instance')._renderItem = function(ul, item) {
                    if (item.qty_available <= 0) {
                        var string = '<li class="ui-state-disabled">' + item.name;
                        if (item.type == 'variable') {
                            string += '-' + item.variation;
                        }
                        string += ' (' + item.sub_sku + ') (Out of stock) </li>';
                        return $(string).appendTo(ul);
                    } else if (item.enable_stock != 1) {
                        return ul;
                    } else {
                        var string = '<div>' + item.name;
                        if (item.type == 'variable') {
                            string += '-' + item.variation;
                        }
                        string += ' (' + item.sub_sku + ') </div>';
                        return $('<li>')
                            .append(string)
                            .appendTo(ul);
                    }
                };
        }

        $('select#location_id').change(function() {
            if ($(this).val()) {
                $('#search_product_for_inventory').removeAttr('disabled');
            } else {
                $('#search_product_for_inventory').attr('disabled', 'disabled');
            }
            $('table#inventory_product_table tbody').html('');
            $('#product_row_index').val(0);
            update_table_total();
        });

        $(document).on('change', 'input.product_quantity', function() {
            update_table_row($(this).closest('tr'));
        });
        $(document).on('change', 'input.product_unit_price', function() {
            update_table_row($(this).closest('tr'));
        });

        $(document).on('click', '.remove_product_row', function() {
            swal({
                title: LANG.sure,
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(willDelete => {
                if (willDelete) {
                    $(this)
                        .closest('tr')
                        .remove();
                    update_table_total();
                }
            });
        });

        //Date picker
        $('#transaction_date').datetimepicker({
            format: moment_date_format + ' ' + moment_time_format,
            ignoreReadonly: true,
        });

        $('form#product_inventory').validate();

        inventory_table = $('#inventory_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/stock-adjustments',
            columnDefs: [{
                targets: 0,
                orderable: false,
                searchable: false,
            }, ],
            aaSorting: [
                [1, 'desc']
            ],
            columns: [{
                    data: 'action',
                    name: 'action'
                },
                {
                    data: 'transaction_date',
                    name: 'transaction_date'
                },
                {
                    data: 'ref_no',
                    name: 'ref_no'
                },
                {
                    data: 'location_name',
                    name: 'BL.name'
                },
                {
                    data: 'adjustment_type',
                    name: 'adjustment_type'
                },
                {
                    data: 'final_total',
                    name: 'final_total'
                },
                {
                    data: 'total_amount_recovered',
                    name: 'total_amount_recovered'
                },
                {
                    data: 'additional_notes',
                    name: 'additional_notes'
                },
                {
                    data: 'added_by',
                    name: 'u.first_name'
                },
            ],
            fnDrawCallback: function(oSettings) {
                __currency_convert_recursively($('#inventory_table'));
            },
        });
        var detailRows = [];

        $(document).on('click', 'button.delete_inventory', function() {
            swal({
                title: LANG.sure,
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(willDelete => {
                if (willDelete) {
                    var href = $(this).data('href');
                    $.ajax({
                        method: 'DELETE',
                        url: href,
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                toastr.success(result.msg);
                                inventory_table.ajax.reload();
                            } else {
                                toastr.error(result.msg);
                            }
                        },
                    });
                }
            });
        });
    });

    function inventory_product_row(variation_id) {
        var row_index = parseInt($('#product_row_index').val());
        var location_id = $('select#location_id').val();
        $.ajax({
            method: 'POST',
            url: '/products/get_product_row',
            data: {
                row_index: row_index,
                variation_id: variation_id,
                location_id: location_id
            },
            dataType: 'json',
            success: function(result) {
                var targetRow = $("#inventory_product_table").find("tr").filter(function() {
                    return $(this).attr("row_id") === result.sku;
                });
                if (!targetRow.length) {
                    let newProduct = $('table#inventory_product_table tbody').prepend(result.view).children().first();
                    let argument = newProduct.find("input.input_quantity_argument").val();
                    let autoHide = $("#auto_hide").val();
                    if (autoHide && argument == 1) {
                        newProduct.hide();
                    }
                    $('#product_row_index').val(row_index + 1);
                    $('span#row_index').text(row_index + 1);
                } else {
                    let inputQuantity = targetRow.find("input.input_quantity");
                    let productUnitPrice = targetRow.find("input.product_unit_price");
                    let productLineTotal = targetRow.find("input.product_line_total");
                    let quantity = parseInt(inputQuantity.val()) + 1;
                    inputQuantity.val(quantity);
                    productLineTotal.val(__number_f(parseInt(__read_number(productUnitPrice)) * quantity));
                    targetRow.prependTo($('#inventory_product_table'));
                    update_table_row(targetRow)
                }
                update_table_total();
            },
        });
    }

    function update_table_total() {
        var table_total = 0;
        var total_qty = 0;
        var total_argument = 0;
        $('table#inventory_product_table tbody tr').each(function() {
            var this_total_argument = parseFloat(__read_number($(this).find('input.input_quantity_argument')));
            var this_total = parseFloat(__read_number($(this).find('input.product_line_total')));
            var this_total_qty = parseFloat(__read_number($(this).find('input.product_quantity')));
            if (this_total) {
                table_total += this_total;
            }
            if (this_total_qty) {
                total_qty += this_total_qty;
            }
            if (this_total_argument) {
                total_argument += this_total_argument;
            }
        });
        $('input#total_amount').val(table_total);
        $('span#total_inventory').text(__number_f(table_total));
        $('span#total_qty').text(__number_f(total_qty));
        $('span#total_argument').text(__number_f(total_argument));
    }

    function update_table_row(tr) {
        var quantity = parseFloat(__read_number(tr.find('input.product_quantity')));
        var unit_price = parseFloat(__read_number(tr.find('input.product_unit_price')));
        var row_total = 0;
        if (quantity && unit_price) {
            row_total = quantity * unit_price;
        }

        //status
        let inputQuantityStatus = tr.find("input.quantity_status");
        let quantityArgument = tr.find("input.input_quantity_argument");
        let autoHide = $("#auto_hide").val();
        let statusQuantity = __read_number(quantityArgument) - quantity;
        if (statusQuantity > 0) {
            inputQuantityStatus.val("Thiếu");
        } else if (statusQuantity == 0) {
            if (autoHide) {
                tr.hide();
            }
            inputQuantityStatus.val("Đủ");
        } else {
            tr.show();
            inputQuantityStatus.val("Thừa");
        }


        tr.find('input.product_line_total').val(__number_f(row_total));
        update_table_total();
    }



    $(document).on('shown.bs.modal', '.view_modal', function() {
        __currency_convert_recursively($('.view_modal'));
    });
</script>
<script type="text/javascript">
    __page_leave_confirmation('#product_inventory');
</script>
@endsection