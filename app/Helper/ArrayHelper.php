<?php

namespace App\Helper;

use Excel;

class ArrayHelper
{
    private $combinedRows = [];

    public function excelToArray($filePath)
    {
        $arrayXlsx = Excel::toArray([], $filePath);
        $headers = $arrayXlsx[0][0];
        $headers = preg_grep ('/^DPO_Filter/', $headers);
        unset($arrayXlsx[0][0]);
        $xlsxArr = $arrayXlsx[0];

        array_splice($xlsxArr, 0, 1);

        $count = count($headers);
        for($i=0; $i<$count; $i++){
            $this->mergeRowsAndAddKeys($xlsxArr, $i, $headers);
        }
        return $this->combinedRows;
    }

    private function mergeRowsAndAddKeys($data, $k, $headers)
    {
        $array = [];
        foreach($data as $key=>$arr){
          $array['title'] = $headers[$k];
          $array['libs'][]['name'] = $data[$key][$k];
        }
        $this->combinedRows[] = $array;
    }
}
