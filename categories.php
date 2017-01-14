<?php 
$categories = array();           
$handle = fopen("resources/categories.txt", "r");
            if ($handle) {
                while (!feof($handle)) {
                    $line = fgets($handle);
                    $name = str_replace("(deprecated)","",$line);           
                    $name = str_replace("_"," ",$name);
                    $name = preg_replace( '/\s+/', ' ', $name);
                    $name = trim($name);
                    $name = ucwords($name);
                    //echo $name."-".$value."<br>";
                    $categories[$line] = $name;
                }
                //echo sizeof($categories);
                fclose($handle);
            } else {
                echo "error";
            } 
    ?>