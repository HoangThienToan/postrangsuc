<table class="table table-bordered table-striped ajax_view" id="buysell_table" style="width: 100%;">
    <thead>
        <tr>
            <th>@lang('messages.action')</th>
            <th>@lang('messages.date')</th>
            <th>@lang('buysell.list_buy_sell_product')</th>
            <th>@lang('buysell.business_location')</th>
            <th>@lang('buysell.contact_business_name')</th>
            <th>@lang('buysell.contact_name')</th>
            <th>@lang('buysell.product_name')</th>
            <th>@lang('buysell.grand_total')</th>
            <th>@lang('buysell.buy_sell_status')</th>
            <th>@lang('buysell.payment_status')</th>
            <th>@lang('buysell.buysell_due') &nbsp;&nbsp;<i class="fa fa-info-circle text-info no-print" data-toggle="tooltip" data-placement="bottom" data-html="true" data-original-title="{{ __('messages.purchase_due_tooltip')}}" aria-hidden="true"></i></th>
            <th>@lang('buysell.added_by')</th>
            <!-- <th>test</th> -->
        </tr>
    </thead>
    <tfoot>
        <tr class="bg-gray font-17 text-center footer-total">
            <td colspan="6"><strong>@lang('sale.total'):</strong></td>
            <td class="footer_purchase_total"></td>
            <td class="footer_status_count"></td>
            <td class="footer_payment_status_count"></td>
            <td class="text-left"><small>@lang('report.purchase_due') - <span class="footer_total_due"></span><br>
            @lang('lang_v1.purchase_return') - <span class="footer_total_purchase_return_due"></span>
            </small></td>
            <td></td>
        </tr>
    </tfoot>
</table>



