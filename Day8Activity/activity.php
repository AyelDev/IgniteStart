<?php

function hurdleJump($hurdles, $height){
    
    $res = true;
    
    if(empty($hurdles)){
         return $res;
    }
    
    foreach($hurdles as $hurdle){
        if($hurdle > $height){
            return !$res;
        }
    }
    return $res;
}

echo var_export(hurdleJump([12,13,14], 12   ), true);

function secondLargest($arr){

    if (count($arr) < 2) {
        return null;
    }

    $first = $second = PHP_INT_MIN;

    foreach ($arr as $val) {
        if ($val > $first) {
            $second = $first;
            $first = $val;
        } elseif ($val > $second && $val < $first) {
            $second = $val;
        }
    }

    return $second === PHP_INT_MIN ? null : $second;
    
}

echo secondLargest([20,30,40]);

function findBob($arr){
    
    foreach($arr as $indx => $val){
        if(strlower($val) == 'bob'){
            return $indx;
        }
    }

    return -1;
}

function strlower($str) {
    $res = '';
    for ($i = 0; isset($str[$i]); $i++) {
        $ascii = ord($str[$i]);
        $res .= ($ascii >= 65 && $ascii <= 90)
            ? chr($ascii + 32)
            : $str[$i];
    }
    return $res;
}

echo findBob(["ariel", "mhie", "boob", "bobb", "bobb", "bbob"]);