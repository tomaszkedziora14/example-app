<?php

namespace App\Helper;

use Excel;

class ArrayHelper
{
    private $headers;

    private $combinedRows = [];

    private $repeatableSameKey = [];

    private $items = [];

    public function excelToArray($filePath)
    {

      // $data[] = [
      //     'title' => 'DPO_Filter:Anlass',
      //     'libs' => [
      //         [
      //             'name' => 'Beitragsänderung'
      //         ],
      //         [
      //             'name' => 'Beitragsänderung'
      //         ]
      //     ]
      // ];



        $arrayXlsx = Excel::toArray([], $filePath);

        $headers = $arrayXlsx[0][0];
        $headers = preg_grep ('/^DPO_Filter/', $headers);

        unset($arrayXlsx[0][0]);

        $xlsxArr = $arrayXlsx[0];

        array_splice($xlsxArr, 0, 1);

        $count = count($headers);
        for($i=0; $i<$count; $i++){
            $this->mergeRowsAndAddNewKeys($xlsxArr, $i, $headers);
        }

      //  dd($this->combinedRows);

         return $this->combinedRows;
    }

    private function merge($data, $k)
    {
        $array = [];
        foreach($data as $key=>$arr){
            $array[] = $data[$key][$k];
        }
        $this->combinedRows[] = $array;
    }

    private function mergeRowsAndAddNewKeys($data, $k, $headers)
    {
        $array = [];
        foreach($data as $key=>$arr){
          $array['title'] = $headers[$k];
          $array['libs'][]['name'] = $data[$key][$k];
        }



      //  dd($array);
        $this->combinedRows[] = $array;
    }

    public function createRepitableKey()
    {
      $array = [];
      $keyName = 'name';
      for($i=0; $i<5; $i++){
        $array[] = $keyName.$i;
      }
      return  $array;
    }
}
