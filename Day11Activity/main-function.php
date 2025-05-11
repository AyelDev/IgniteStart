<?php 

function longestCommonEnding(array $arr): string
{
    $len = min(array_map('strlen', $arr));
    $result = '';

    for ($i = 1; $i <= $len; $i++) {
        if ($arr[0][- $i] === $arr[1][- $i]) {
            $result = $arr[0][- $i] . $result;
        } else {
            break;
        }
    }

    return $result;
}

function constructDeconstruct(string $str)
{
    $len = strlen($str);
    $cache = [];
    $memo = [];

    for($i = 1; $i < $len ;$i++){
        $cache[] = substr($str, 0, $i);
    }

    $memo[] = $cache;
    $memo[] = $str;
    $memo[] = array_reverse($cache);

    echo '';
    print_r($memo); 
    echo '';
    // array_reverse
    // return [];
}

 //echo longestCommonEnding(["multiplication", "ration"]);
constructDeconstruct("Hello");
?>