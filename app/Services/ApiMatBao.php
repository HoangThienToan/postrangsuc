<?php

namespace App\Services;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;
use App\ElectronicBill;

class ApiMatBao
{
    protected $httpClient;
    protected $apiUrl;
    protected $payload;
    protected $EB_ID;

    public function __construct($sketches = true)
    {
        $this->httpClient = new Client();
        $business_id = session()->get('user.business_id');
        $ElectronicBill = ElectronicBill::where('business_id', $business_id)->where('status', 1)->first();
        $EB = $sketches ? false : $ElectronicBill;
        $this->EB_ID = $EB ? $EB->id : null;
        $this->apiUrl = $EB ? $EB->api_baseUrl . "/api/" : config('invoice.api_url') . "/api/";
        $this->payload = [
            'ApiUserName' => $EB ? $EB->api_username : config('invoice.api_username'),
            'ApiPassword' => $EB ? $EB->api_password : config('invoice.api_password'),
            'ApiInvPattern' => 2,
            'ApiInvSerial' => $EB ? "C24MQP" : "C24MNV",
            // 'ApiInvSerial' => "C24TAT",
        ];
    }

    //1
    public function publishInvoice($invoiceData)
    {
        $options = $this->processInvoiceData($invoiceData);
        $response = $this->request('POST', "v2/invoice/importAndPublishInv", $options);
        // dd($response);

        $response["data"][0]['electronic_bill_id'] = $this->EB_ID;
        $return = $response["status"] === "OK" ? $response["data"] : false;

        return $return;
    }

    //hủy hóa đơn cũ
    public function cancelInvoice($fkey)
    {
        $options = [
            'fkey' => $fkey,
        ];
        
        $response = $this->request('POST', "v2/invoice/CancelInvoice", $options);
        $return = $response["status"] === "OK" ? $response["data"] : false;
        return $return;
    }

    //điều chỉnh hóa đơn cũ
    public function invoiceAdjustment($invoiceData , $InvNo)
    {
        $options = $this->processInvoiceData($invoiceData);
        $options['InvNo'] = $InvNo;
        $options['InvPatternOld'] = 2;
        $options['InvSerialOld'] = 'C24MNV';

        $response = $this->request('POST', "v2/invoice/ChangeInvoice", $options);
        return $response;
    }

    //thay thế hóa đơn cũ

    public function replaceInvoice($data)
    {
        $response = $this->request('POST', "v2/invoice/ReplaceInvoice");
        return $response;
    }

    // lấy chìa hóa thực hiện liên kết || fkey sẽ liên tục thay đổi với mỗi lần gọi
    /**
     * Wrapper for $this->client->request
     * @return mixed|string
     */
    public function getFkey()
    {
        $response = $this->request('POST', "v2/invoice/GetFkey");
        $return = $response["messages"] === "Success" ? $response["fkey"] : false;
        return $return;
    }

    public function downloadPdf($fkey)
    {
        $options["signture_type"] = 1;
        $options["fkey"] = $fkey;
        $response = $this->request('POST', "v2/invoice/DownloadPdf", $options);
        $return = $response["status"] === "OK" ? $response["link_file"] : false;
        return $return;
    }

    //số của hóa đơn tiếp theo
    public function nextInvoiceNumber()
    {
        $response = $this->request('POST', "v2/invoice/GetInvoiceNo");
        $return = $response["messages"] === "Success" ? $response["invno_formatted"] : false;
        return $return;
    }

    //nháp
    public function importDraftInvoice($invoiceData)
    {
        $options = $this->processInvoiceData($invoiceData);

        $response = $this->request('POST', "v3/invoice/GetInvoiceNo", $options);
        $return = $response["status"] === "OK" ? $response["data"] : false;

        return $return;
    }

    //lấy thông tin hóa đơn theo mã fkey
    public function getInvoiceInformation($fkey)
    {
        $response = $this->request('POST', "v2/invoice/GetInvoiceNoByFkey");
        return $response;
    }

    //lấy danh sách thông tin hóa đơn theo danh sách mã fkey
    public function getInvoiceListInformation($fkey)
    {
        $options["fkey"] = [$fkey];
        $response = $this->request('POST', "v2/invoice/GetInvoiceNoByMultiFkey");
        return $response;
    }

    //phát hành phiếu xuất kho
    public function goodsDeliveryNote($data)
    {
        $response = $this->request('POST', "v2/invoice/importAndPublishPXK");
        return $response;
    }

    //phát hành phiếu xuất kho nháp
    public function draftGoodsDeliveryNote($data)
    {
        $response = $this->request('POST', "v3/invoice/importInvTempPXK");
        return $response;
    }

    //tạo mới hoặc sửa đổi thông tin khách hàng
    public function createOrUpdateCustomerInformation($data)
    {
        $response = $this->request('POST', "v1/customer/updateCustomer");
        return $response;
    }

    //xóa hóa đơn nháp
    public function deleteDraftInvoice($data)
    {
        $response = $this->request('POST', "v3/invoice/deleteInvTemp");
        return $response;
    }

    //phát hành hóa đơn nháp thành chính thức
    public function issuingInvoice($data)
    {
        $response = $this->request('POST', "v1/digitalsignature/signinv");
        return $response;
    }

    //Ký XML
    public function signXML($data)
    {
        $response = $this->request('POST', "v2/digitalsignature/signxml256");
        return $response;
    }

    //dowloadFileXML
    public function dowloadFileXML($data)
    {
        $uri = "v2/invoice/DownloadXml";
        $response = $this->request('POST', "v2/invoice/DownloadXml");
        return $response;
    }

    //
    public function badMessage($data)
    {
        $response = $this->request('POST', "v3/invoice/thongBaoSaiSot");
        return $response;
    }

    //Lấy thông tin xml chưa ký
    public function GetXmlNotSign($data)
    {
        $response = $this->request('POST', "v2/invoice/GetXmlNotSign");
        return $response;
    }


    //20.Cập nhật thông tin XML đã ký
    public function UpdateXmlSigned($data)
    {
        $response = $this->request('POST', "v2/invoice/UpdateXmlSigned");
        return $response;
    }

    //Tạo thông tin Webhook
    public function createWebhook($data)
    {
        $response = $this->request('POST', "v3/invoice/createWebhook");
        return $response;
    }

    //22.Tạo biên bản hủy, điều chỉnh, thay thế
    public function CUD($data)
    {
        $response = $this->request('POST', "v2/invoice/CreateBBHoaDon");
        return $response;
    }

    public function processInvoiceData($data_invoice)
    {
        // dd($data_invoice);
        $lines = $data_invoice->lines;
        $totals = [
            'price' => 0,
            'line_total_uf' => 0,
            'quantity_uf' => 0,
            'unit_price_uf' => 0,
            'price_exc_tax' => 0,
            'unit_price_inc_tax_uf' => 0,
            'line_discount_uf' => 0,

        ];
        $direct_sale = $data_invoice->is_direct_sale;
        foreach ($lines as $line) {
            $totals['price'] += $line['price'];
            $totals['line_total_uf'] += $line['line_total_uf'];
            $totals['quantity_uf'] += $line['quantity_uf'];
            $totals['price_exc_tax'] += $line['price_exc_tax'];
            $totals['unit_price_inc_tax_uf'] += $line['unit_price_inc_tax_uf'];
            $totals['line_discount_uf'] += $line['line_discount_uf']* $line['quantity_uf'];
        }
        $data["Fkey"] = isset($data_invoice->Fkey) ? $data_invoice->Fkey : $this->getFkey();
        // $data["Fkey"] = '9C628DFC6C';
        // $data["MaKH"]  = '';
        $direct_sale ? $data["Buyer"] = $data_invoice->customer_name :  $data["CusName"] = $data_invoice->customer_name;
        $data["CusEmail"]  = isset($data_invoice->CusEmail) ? $data_invoice->CusEmail : '';
        $data["CusEmailCC"]  = isset($data_invoice->CusEmail) ? $data_invoice->CusEmail : '';
        $data["CusAddress"]  = isset($data_invoice->CusAddress) ? $data_invoice->CusAddress : '';
        $data["CusPhone"] = isset($data_invoice->customer_mobile) ? $data_invoice->customer_mobile : '';
        $data["CusTaxCode"] = isset($data_invoice->customer_tax_number) ? $data_invoice->customer_tax_number : '';

        $payments_primitive = isset($data_invoice->payments_primitive[0]) ? $data_invoice->payments_primitive[0] : [];
        if ($payments_primitive) {
            $data["CusBankName"] = isset($payments_primitive["card_holder_name"]) ? $payments_primitive["card_holder_name"] : '';
            $data["CusBankNo"] = isset($payments_primitive["bank_account_number"]) ? $payments_primitive["bank_account_number"] : '';
        }
        $payments = isset($data_invoice->payments[0]) ? $data_invoice->payments[0] : [];
        if ($payments) {
            $data["PaymentMethod"] = isset($payments["method"]) ? $payments["method"] : '';
            $data["ArisingDate"] = isset($payments["date"]) ? (\DateTime::createFromFormat("m/d/Y", $payments["date"]) ? \DateTime::createFromFormat("m/d/Y", $payments["date"])->format("d/m/Y") : '') : '';
        }

        // $data["VATAmount"] = isset($data_invoice->tax) ? $data_invoice->tax : '';
        // $data["Total"] = isset($data_invoice->total) ? $this->dataInt($data_invoice->total) : '';
        // $data["Amount"] = isset($data_invoice->total) ? $this->dataInt($data_invoice->total)+$totals['line_discount_uf'] : 0;
        $discount = str_replace(array('₫', ','), '', $data_invoice->discount);

        $discount = (float) $discount;
        $data["DiscountAmount"] = $direct_sale ? $totals['line_discount_uf'] : $discount;

        $data["Amount"] = isset($data_invoice->total) ? $this->dataInt($data_invoice->total) : 0;
        $data["Total"] = isset($data_invoice->total) ? $this->dataInt($data_invoice->total) : 0;
        // $data["Total"] = isset($data_invoice->total) ? $this->dataInt($data_invoice->total) + $data["DiscountAmount"] : 0;


        $words = isset($data_invoice->words) ? $data_invoice->words : '';
        $words = ($data["Amount"] < 0) ? 'Hoàn tiền (Refunds): ' . $words : $words;

        $data["AmountInWords"] = $words;
        $data["Note"] = isset($data_invoice->additional_notes) ? $data_invoice->additional_notes : '';
        $data["AmountInWords"] = isset($data_invoice->words) ? $data_invoice->words : '';
        $data["Note"] = isset($data_invoice->additional_notes) ? $data_invoice->additional_notes : '';
        // $data["SO"] = $this->nextInvoiceNumber() ? $this->nextInvoiceNumber() : '';
        // $data["SO"] = $data_invoice->invoice_no;
        //6144
        // $data["InvType"] = '';
        $data["DonViTienTe"] = "704";
        // $data["TyGia"] = '';
        // $data["CMND"] = '';
        // $data["Extra"] = '';
        // $data["Extra1"] = '';
        $data["CreateBy"] = isset($data_invoice->location_name) ? $data_invoice->location_name : '';
        // $data["Option"]=  [];
        // $data["ProdAttr"] =  1;

        $data["Products"] = [];

        if (isset($data_invoice->lines)) {
            //lines
            foreach ($data_invoice->lines as &$product) {
                if ($direct_sale) {
                    $filteredProduct = [
                        // 'Code' => $product['cat_code'],
                        'ProdName' => $product['name'],
                        'ProdUnit' => 'món',
                        'ProdQuantity' => $product['quantity_uf'],
                        // 'VATRate' => $product['tax_percent'] ? $product['tax_percent'] : 0,
                        // 'VATAmount' => $product['tax'] ? $product['tax'] : 0,

                        // 'DiscountAmount' => $this->dataInt($product['line_discount_uf']),
                        'ProdPrice' => $this->dataInt($product['unit_price_before_discount_uf']),
                        'Total' => $this->dataInt($product['unit_price_before_discount_uf']) * $product['quantity_uf'],
                        // 'Amount' => $this->dataInt($product['unit_price_inc_tax_uf']),
                    ];
                } else {
                    $ProdPrice = $this->dataInt($product['unit_price_before_discount_uf']) + (($product['total_weight'] - $product['seed_weight']) / 100 * $product['price']/ $product['quantity_uf']);
                    $filteredProduct = [
                        // 'Code' => $product['cat_code'],
                        'ProdName' => $product['name'],
                        'ProdUnit' => 'món',
                        'ProdQuantity' => $product['quantity_uf'],
                        // 'VATRate' => $product['tax_percent'] ? $product['tax_percent'] : 0,
                        // 'VATAmount' => $product['tax'] ? $product['tax'] : 0,

                        // 'DiscountAmount' => $this->dataInt($product['line_discount_uf']),
                        'ProdPrice' => $ProdPrice,
                        'Total' => $ProdPrice * $product['quantity_uf'],
                        // 'Amount' => $this->dataInt($product['unit_price_inc_tax_uf']),
                    ];
                }


                $data["Products"][] = $filteredProduct;
            }
            // gold
            if ($direct_sale) {
                $directProduct = [
                    'Code' => $product['cat_code'],
                    'ProdName' => 'Vàng',
                    'Extra' => $data_invoice->standard * 10,
                    // 'Extra1' => $data_invoice->final_weight,
                    'ProdUnit' => 'chỉ',
                    'ProdQuantity' => $data_invoice->final_weight / 100,
                    // 'VATRate' => $product['tax_percent'] ? $product['tax_percent'] : 0,
                    // 'VATAmount' => $product['tax'] ? $product['tax'] : 0,
                    // 'DiscountAmount' => $this->dataInt($product['line_discount_uf']),
                    'ProdPrice' => $data_invoice->gold_price,
                    'Total' => $data_invoice->total - $totals['line_total_uf'],
                    // 'Amount' => $this->dataInt($product['unit_price_inc_tax_uf']),
                ];
                if (($data_invoice->total - $totals['line_total_uf']) < 0) {
                    $directProduct['ProdName'] = 'Vàng (Thu lại)';
                    $directProduct['ProdQuantity'] = abs($data_invoice->final_weight / 100);
                    $directProduct['Total'] = abs($data_invoice->total - $totals['line_total_uf']);
                }

                $data["Products"][] = $directProduct;
            } else {
                //buy
                foreach ($data_invoice->lines_buy as &$product) {
                    $ProdPrice = ($product['total_weight'] - $product['weight_seed']) / 100 * $product['price'];

                    $indirectProduct = [
                        // 'Code' => $product['cat_code'],
                        'ProdName' => $product['sectors']. " (Thu lại)",
                        'ProdUnit' => 'món',
                        'ProdQuantity' => 1,
                        // 'VATRate' => $product['tax_percent'] ? $product['tax_percent'] : 0,
                        // 'VATAmount' => $product['tax'] ? $product['tax'] : 0,

                        // 'DiscountAmount' => $this->dataInt($product['line_discount_uf']),
                        'ProdPrice' => $ProdPrice,
                        'Total' => $ProdPrice,
                        // 'Amount' => $this->dataInt($product['unit_price_inc_tax_uf']),
                        // 'Amount' => $product['line_total_uf'],
                    ];


                    $data["Products"][] = $indirectProduct;
                }
            }
        }
        // dd($data);

        return $data;
    }

    function dataInt($data, $st = 0)
    {
        return round(floatval($data), $st);
    }


    /**
     * Wrapper for $this->client->request
     * @param string $method
     * @param string $uri
     * @param array $options
     * @param bool $asJson
     * @param bool $wantsGetContents
     * @return mixed|string
     */
    protected function request($method, $uri, array $options = [], $asJson = true)
    {
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $Request['json'] = array_replace_recursive($options, $this->payload);
        $Request['headers'] = $headers;
        $fullUri = $this->apiUrl . $uri;
        $response = $this->httpClient->treatmentRequest($method, $fullUri, $Request);

        if ($asJson) {
            return json_decode($response->getBody(), true);
        }

        return $response->getBody();
    }
}

/**
 * Client wrapper around Guzzle.
 *
 * @package reques\Http
 */
class Client extends GuzzleClient
{
    public $retryLimit   = 10;
    public $retryWaitSec = 10;

    /**
     * Sends a response to the API, automatically handling decoding JSON and errors.
     *
     * @param string $method
     * @param null $uri
     * @param array $options
     * @param bool $asJson
     * @return mixed|string
     */
    public function treatmentRequest(string $method, $uri = '', array $options = []): ResponseInterface
    {
        $response = parent::request($method, $uri, $options);

        // Support for 503 "too busy errors". Retry multiple times before failure
        $retries = 0;
        $wait    = $this->retryWaitSec;
        while ($response->getStatusCode() === 503 and $this->retryLimit > $retries) {
            $retries++;
            sleep($wait);
            $response = parent::request($method, $uri, $options);
            // Wait 20% longer if it fails again
            $wait *= 1.2;
        }
        if ($response->getStatusCode() !== 200) {
            // ErrorHandler::handleErrorResponse($response);
        }

        return $response;
    }
}
