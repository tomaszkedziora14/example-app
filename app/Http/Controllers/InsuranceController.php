<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\ArrayHelper;

class InsuranceController extends Controller
{
    public function index(ArrayHelper $arrayHelper)
    {

        $pathToFile = storage_path('Documents/arkusz.xlsx');
//        $data = $arrayHelper->ExcelToArray($pathToFile);
      //  dd($xlsxToArray['DPO_Filter:Anlass']);
        // foreach($xlsxToArray as $key=>$array){
        //             echo $key;
        //   foreach($array as $value){
        //     echo '<br>';
        //   }
        // }
      //  dd($path = storage_path('Documents/arkusz.xlsx'));
        // return \request()->json(['dupa']);
       return $data = [['body'=>'Aneta']];
      //  return response()->json($data);
    }
}
