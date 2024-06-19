<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Business;
use App\BusinessLocation;
use App\Category;
use App\Media;
use App\Product;
use App\ProductVariation;
use App\PurchaseLine;
use App\SellingPriceGroup;
use App\TaxRate;
use App\Unit;
use App\Utils\ModuleUtil;
use App\Utils\ProductUtil;
use App\Variation;
use App\VariationGroupPrice;
use App\VariationLocationDetails;
use App\VariationTemplate;
use App\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ReportFormController extends Controller
{

    public function getReportFormPnj()
    {
        return view('report_form.report_form_pnj');
    }
    public function getReportFormSjc()
    {
        return view('report_form.report_form_sjc');
    }

    public function getReportFormDoji()
    {
        return view('report_form.report_form_doji');
    }

    public function testTable()
    {
        return view('report_form.test');
    }

    public function showAllData()
    {
        if (!auth()->user()->can('product.view') && !auth()->user()->can('product.create')) {
            abort(403, 'Unauthorized action.');
        }
        $business_id = request()->session()->get('user.business_id');
        $selling_price_group_count = SellingPriceGroup::countSellingPriceGroups($business_id);

        // if (request()->ajax()) {
        $query = Product::with(['media'])
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->join('units', 'products.unit_id', '=', 'units.id')
            ->leftJoin('categories as c1', 'products.category_id', '=', 'c1.id')
            ->leftJoin('categories as c2', 'products.sub_category_id', '=', 'c2.id')
            ->leftJoin('tax_rates', 'products.tax', '=', 'tax_rates.id')
            ->join('variations as v', 'v.product_id', '=', 'products.id')
            ->leftJoin('variation_location_details as vld', 'vld.variation_id', '=', 'v.id')
            ->where('products.business_id', $business_id)
            ->where('products.type', '!=', 'modifier');

        //Filter by location
        $location_id = request()->get('location_id', null);
        $permitted_locations = auth()->user()->permitted_locations();
        if (!empty($location_id) && $location_id != 'none') {
            if ($permitted_locations == 'all' || in_array($location_id, $permitted_locations)) {
                $query->whereHas('product_locations', function ($query) use ($location_id) {
                    $query->where('product_locations.location_id', '=', $location_id);
                });
            }
        } elseif ($location_id == 'none') {
            $query->doesntHave('product_locations');
        } else {
            if ($permitted_locations != 'all') {
                $query->whereHas('product_locations', function ($query) use ($permitted_locations) {
                    $query->whereIn('product_locations.location_id', $permitted_locations);
                });
            } else {
                $query->with('product_locations');
            }
        }

        $products = $query->select(
            'products.id',
            'products.name as product',
            'products.type',
            'c1.name as category',
            'c2.name as sub_category',
            'products.category_id as category_id',
            'units.actual_name as unit',
            'brands.name as brand',
            'tax_rates.name as tax',
            'products.sku',
            'products.image',
            'products.enable_stock',
            'products.is_inactive',
            'products.not_for_selling',
            'products.weight',
            'products.seed_weight',
            'products.golden_age',
            'products.product_custom_field1',
            'products.product_custom_field2',
            'products.product_custom_field3',
            'products.product_custom_field4',
            DB::raw('SUM(vld.qty_available) as current_stock'),
            DB::raw('MAX(v.sell_price_inc_tax) as max_price'),
            DB::raw('MIN(v.sell_price_inc_tax) as min_price'),
            DB::raw('MAX(v.dpp_inc_tax) as max_purchase_price'),
            DB::raw('MIN(v.dpp_inc_tax) as min_purchase_price')

        )->groupBy('products.id');

        // Code must adjust to fetch and get all data from database

        $getProduct = $products->get();
        $arrayProduct = [];
        foreach ($getProduct as $product) {
            $items = [];
            $items['id'] = $product->id;
            $items['product'] = $product->product;
            $items['category'] = $product->category;
            $items['category_id'] = $product->category_id;
            $items['image'] = $product->image;
            $items['max_price'] = $product->max_price;
            $items['current_stock'] = $product->current_stock;
            $arrayProduct[] = $items;
            // Lấy các trường khác của sản phẩm
            // ...
        };
        // dd($arrayProduct);
        // Hiển thị tất cả các giá trị id
        $ids = [];
        foreach ($arrayProduct as $item) {
            $ids[] = $item['id'];
        }
        // dd($ids);

        $type = request()->get('type', null);
        if (!empty($type)) {
            $products->where('products.type', $type);
        }

        $category_id = request()->get('category_id', null);
        if (!empty($category_id)) {
            $products->where('products.category_id', $category_id);
        }

        $brand_id = request()->get('brand_id', null);
        if (!empty($brand_id)) {
            $products->where('products.brand_id', $brand_id);
        }

        $unit_id = request()->get('unit_id', null);
        if (!empty($unit_id)) {
            $products->where('products.unit_id', $unit_id);
        }

        $tax_id = request()->get('tax_id', null);
        if (!empty($tax_id)) {
            $products->where('products.tax', $tax_id);
        }

        $active_state = request()->get('active_state', null);
        if ($active_state == 'active') {
            $products->Active();
        }
        if ($active_state == 'inactive') {
            $products->Inactive();
        }
        $not_for_selling = request()->get('not_for_selling', null);
        if ($not_for_selling == 'true') {
            $products->ProductNotForSales();
        }

        $woocommerce_enabled = request()->get('woocommerce_enabled', 0);
        if ($woocommerce_enabled == 1) {
            $products->where('products.woocommerce_disable_sync', 0);
        }

        if (!empty(request()->get('repair_model_id'))) {
            $products->where('products.repair_model_id', request()->get('repair_model_id'));
        }

        $rack_enabled = (request()->session()->get('business.enable_racks') || request()->session()->get('business.enable_row') || request()->session()->get('business.enable_position'));
        $categories = Category::forDropdown($business_id, 'product');

        $brands = Brands::forDropdown($business_id);

        $units = Unit::forDropdown($business_id);

        $tax_dropdown = TaxRate::forBusinessDropdown($business_id, false);
        $taxes = $tax_dropdown['tax_rates'];

        $business_locations = BusinessLocation::forDropdown($business_id);
        $business_locations->prepend(__('lang_v1.none'), 'none');

        // return $arrayProduct;
        // dd([
        //     'arrayCategory' => $arrayProduct,
        //     'id' => $ids
        // ]);
        return [
            'arrayProduct' => $arrayProduct,
            'id' => $ids
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function showData($id)
    {
        if (!auth()->user()->can('product.view')) {
            abort(403, 'Unauthorized action.');
        }

        // try {
        $business_id = request()->session()->get('user.business_id');

        $product = Product::where('business_id', $business_id)
            ->with(['brand', 'unit', 'category', 'sub_category', 'product_tax', 'variations', 'variations.product_variation', 'variations.group_prices', 'variations.media', 'product_locations', 'warranty', 'media'])
            ->findOrFail($id);
        $price_groups = SellingPriceGroup::where('business_id', $business_id)->active()->pluck('name', 'id');
        $allowed_group_prices = [];
        foreach ($price_groups as $key => $value) {
            if (auth()->user()->can('selling_price_group.' . $key)) {
                $allowed_group_prices[$key] = $value;
            }
        }

        $group_price_details = [];

        foreach ($product->variations as $variation) {
            foreach ($variation->group_prices as $group_price) {
                $group_price_details[$variation->id][$group_price->price_group_id] = $group_price->price_inc_tax;
            }
        }

        $combo_variations = [];
        if ($product->type == 'combo') {
            $combo_variations = $this->productUtil->__getComboProductDetails($product['variations'][0]->combo_variations, $business_id);
        }
        // Get ProductId and name for multiple image
        $getId = $product->getAttributes()['id'];
        $getName = $product->getAttributes()['name'];
        //Get imageProduct
        $getImage = $product->getAttributes()['image'];
        // Get all Attributes 
        $getWeight = $product->getAttributes()['weight'];
        $getSku = $product->getAttributes()['sku'];
        $getBarcode = $product->getAttributes()['barcode_type'];
        $getDescription = $product->getAttributes()['product_description'];
        $getField1 = $product->getAttributes()['product_custom_field1'];
        $getField2 = $product->getAttributes()['product_custom_field2'];
        $getField3 = $product->getAttributes()['product_custom_field3'];
        $getField4 = $product->getAttributes()['product_custom_field3'];
        // Get Category
        if ($product->getRelations()['category']) {
            $getCategory = $product->getRelations()['category']->getAttributes()['name'];
        } else {
            $getCategory = 'Chưa phân loại';
        }

        // Get all Image children to get slideshow
        $getRelations = $product->getRelations()['variations'];
        $getVariations = $getRelations[0]->getRelations();
        $getMedia = $getVariations['media'];
        $arrayImage = [];
        // foreach first time to get each value in $media
        foreach ($getMedia as $media) {
            $arrayImage[] = $media->getAttributes();
        };
        // Get price show
        $getAttr = $getRelations[0]->getAttributes();
        $getPrice = $getAttr['default_sell_price'];
        $fileNames = [];
        // foreach this time to get each value in $arrayImage
        foreach ($arrayImage as $image) {
            $fileNames[] = $image['file_name'];
        }
        // dd($product);
        return [
            'id' => $getId,
            'name' => $getName,
            'category' => $getCategory,
            'price' => $getPrice,
            'sku' => $getSku,
            'bar_code' => $getBarcode,
            'weight' => $getWeight,
            'description' => $getDescription,
            'custom_field1' => $getField1,
            'custom_field2' => $getField2,
            'custom_field3' => $getField3,
            'custom_field4' => $getField4,
            'image' => $getImage,
            'fileNames' => $fileNames
        ];
    }
    public function getCategory()
    {
        // $category_type = request()->get('type');
        $category_type = 'product';
        // dd(request()->get('type'));
        // dd($category_type);
        // dd($category_type == 'product' && !auth()->user()->can('category.view') && !auth()->user()->can('category.create'));
        if ($category_type == 'product' && !auth()->user()->can('category.view') && !auth()->user()->can('category.create')) {
            abort(403, 'Unauthorized action.');
        }
        // if (request()->ajax()) {
        $business_id = request()->session()->get('user.business_id');
        $category = Category::where('business_id', $business_id)
            ->where('category_type', $category_type)
            ->select(['name', 'short_code', 'description', 'id', 'parent_id']);

        $getCategory = $category->get();
        $arrayCategory = [];
        // dd($getCategory);

        foreach ($getCategory as $category) {
            $items = [];
            $items['id'] = $category->id;
            $items['name'] = $category->name;
            $items['short_code'] = $category->short_code;
            $items['description'] = $category->description;
            $arrayCategory[] = $items;
            // Lấy các trường khác của sản phẩm
            // ...
        };
        // dd($arrayCategory);

        return $arrayCategory;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function getImage($id)
    {
        if (!auth()->user()->can('product.view')) {
            abort(403, 'Unauthorized action.');
        }

        // try {
        $business_id = request()->session()->get('user.business_id');

        $product = Product::where('business_id', $business_id)
            ->with(['brand', 'unit', 'category', 'sub_category', 'product_tax', 'variations', 'variations.product_variation', 'variations.group_prices', 'variations.media', 'product_locations', 'warranty', 'media'])
            ->findOrFail($id);
        $price_groups = SellingPriceGroup::where('business_id', $business_id)->active()->pluck('name', 'id');
        $allowed_group_prices = [];
        foreach ($price_groups as $key => $value) {
            if (auth()->user()->can('selling_price_group.' . $key)) {
                $allowed_group_prices[$key] = $value;
            }
        }

        $group_price_details = [];

        foreach ($product->variations as $variation) {
            foreach ($variation->group_prices as $group_price) {
                $group_price_details[$variation->id][$group_price->price_group_id] = $group_price->price_inc_tax;
            }
        }

        $combo_variations = [];
        if ($product->type == 'combo') {
            $combo_variations = $this->productUtil->__getComboProductDetails($product['variations'][0]->combo_variations, $business_id);
        }
        // Get ProductId for multiple image
        $getId = $product->getAttributes()['id'];
        // Get all Image children to get slideshow
        $getRelations = $product->getRelations()['variations'];
        $getVariations = $getRelations[0]->getRelations();
        $getMedia = $getVariations['media'];
        $arrayImage = [];
        // foreach first time to get each value in $media
        foreach ($getMedia as $media) {
            $arrayImage[] = $media->getAttributes();
        };
        // dd($getId);
        $fileNames = [];
        // foreach this time to get each value in $arrayImage
        foreach ($arrayImage as $image) {
            // $items = [];
            // $items['file_name'] = $image['file_name'];
            $fileNames[] = $image['file_name'];
        }
        // dd($fileNames);
        return $fileNames;
        // [   
        //     'file_name'=>$fileNames 
        // ];
    }
}
