<?php

if(!function_exists('pre')){
    function pre($data, $exit=TRUE){
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        if($exit){
            exit;
        }
    }
}