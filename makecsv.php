<?php

function MakeCSV ($dataJson, $path){

$dataArray = json_decode($dataJson, true);
$keysArray = array_keys($dataArray);
foreach ($keysArray as $categoryKey){
    foreach ($dataArray[$categoryKey] as $masterKey=>$row) {
        $headersArray = array_keys($row);
        foreach ($row as $key=>$value){
            if (is_array($value)){
                $categories = implode(', ', $value);
                $dataArray[$categoryKey][$masterKey][$key] = $categories;
                //print_r($dataArray[$categoryKey][$masterKey][$key]);
                
            }
        }
            
    }
}
$fp = fopen($path, 'w');
$keysArray = array_keys($dataArray);
array_unshift($headersArray, "Category");
fputcsv($fp, $headersArray);
foreach ($keysArray as $categoryKey){
    //print_r($dataArray[$categoryKey]);
    //fputcsv($fp, $keysArray);
    foreach ($dataArray[$categoryKey] as $row) {
        array_unshift($row, $categoryKey);
        fputcsv($fp, $row);
    }

    
}
    fclose($fp);
    
}