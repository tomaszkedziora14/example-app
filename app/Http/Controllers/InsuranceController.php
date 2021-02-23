<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\ArrayHelper;

class InsuranceController extends Controller
{
    public function index(Request $request, ArrayHelper $arrayHelper)
    {
       $pathToFile = storage_path('Documents/arkusz.xlsx');
       $data = $arrayHelper->excelToArray($pathToFile);

        // $data[] =[ [
        //     'title' => 'languageTest',
        //     'libs' => [
        //         [
        //             'name' => 'Brandenburg'
        //         ],
        //         [
        //             'name' => 'Brandenburg'
        //         ]
        //     ]]
        // ];

       return $data;
    }
}
