<?php

namespace App\Class;

class Tools{

    public function printData($data){
        if(is_array($data) || is_object($data)):
            echo '<pre>';print_r($data);
        else:
            echo $data;
        endif;
    }//function
    
}//class