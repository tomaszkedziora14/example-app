<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\ArrayHelper;
use Illuminate\Support\Facades\Storage;

class ExportPdfController extends Controller
{
  /**
   * Return converted data to vue js multiselect form.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Helper\ArrayHelper $arrayHelper
   * @return \Illuminate\Http\Response
   */
    public function index(Request $request, ArrayHelper $arrayHelper)
    {
       $pathToFile = storage_path('Documents/arkusz.xlsx');
       $data = $arrayHelper->excelToArray($pathToFile);
       return $data;
    }
}
