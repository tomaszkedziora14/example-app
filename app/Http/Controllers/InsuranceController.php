<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\ArrayHelper;

class InsuranceController extends Controller
{
    public function index(ArrayHelper $arrayHelper)
    {
        $pathToFile = storage_path('Documents/arkusz.xlsx');
        $data = $arrayHelper->ExcelToArray($pathToFile);
        return \request()->json($data);
    }
}
