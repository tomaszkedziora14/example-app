<?php

namespace App\Helper;

use Excel;

class ArrayHelper
{
    private $combinedRows = [];

    public function ExcelToArray($filePath)
    {
        $arrayXlsx = Excel::toArray([], $filePath);

        $headers = $arrayXlsx[0][0];
        $headers = preg_grep ('/^DPO_Filter/', $headers);

        unset($arrayXlsx[0][0]);

        $xlsxArr = $arrayXlsx[0];

        array_splice($xlsxArr, 0, 1);

        $count = count($headers);
        for($i=0; $i<$count; $i++){
            $this->merge($xlsxArr, $i);
        }
        return array_combine($headers,$this->combinedRows);
    }

    private function merge($data, $k)
    {
        $array = [];
        foreach($data as $key=>$arr){
            $array[] = $data[$key][$k];
        }
        $this->combinedRows[] = $array;
    }
}
