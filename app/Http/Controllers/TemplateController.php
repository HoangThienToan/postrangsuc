<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ReportFormController;
use App\Http\Controllers\TestCategoryController;
use App\Http\Controllers\TestMediaController;

class TemplateController extends Controller
{
    // 
    public function getPnjTemplate()
    {
        // Instantiate the controller: Import Controller you want to use
        $reportFormController = new ReportFormController();
        // $image = $reportFormController->getImage($id);
        // Call the showAllData() method
        $arrayProduct = $reportFormController->showAllData()['arrayProduct'];
        // Get all id from product_id to transfer to getImage($id)
        $arrayId = $reportFormController->showAllData()['id'];
        $arrayCategory = $reportFormController->getCategory();
        $arrayMedia = [];
        // getImage cần có đối số là id từ product_id
        // Use foreach to get all result from product id
        foreach ($arrayId as $id) {
            $media = $reportFormController->getImage($id);
            $arrayMedia[$id] = $media;
        }
        return view('template.pnj.index')->with(compact(
            'arrayProduct',
            'arrayCategory',
            'arrayMedia',
        ));
    }

    public function getProduct($id)
    {
        $reportFormController = new ReportFormController();
        $allProduct = $reportFormController->showAllData();
        $arrayProduct = $reportFormController->showData($id);

        // dd($allProduct);
        return view('template.layout')->with(compact(
            'allProduct',
            'arrayProduct'
        ));
    }

    public function checkout($id)
    {
        $reportFormController = new ReportFormController();
        $arrayProduct = $reportFormController->showData($id);
        // dd($arrayProduct);

        return view('template.pnj.checkout')->with(compact(
            'arrayProduct'
        ));
    }
    public function getSjcTemplate()
    {
        return view('template.sjc.index');
    }

    public function getDojiTemplate()
    {
        return view('template.doji.index');
    }
}
