<?php
require_once __DIR__ . '/customFunctions.php';

function euclidean($a, $b)  
{
    $r = $a % $b;
    switch ($r) {
        case 0:
            return $b;
        default:
            return euclidean($b, $r);
    }
}

function primeDivisors($num)
{
    $memo = [];
    for ($i = 1; $i <= $num; $i++) {
        if ($num % $i == 0 && customPrimeNum($i)) {
            $memo[] = $i;
        }
    }
    return $memo;
}

function unique($arr)
{
    $count = customArrCount(customArrMap('strval', $arr));

    $unique = customArrKeys(customArrFilter($count, function ($value) {
        return $value == 1;
    }));

    return isset($unique[0]) ? (customIsNumeric($unique[0]) ? +$unique[0] : $unique[0]) : null;
}

function expand($num)
{
    //50
    $num = customStrval($num);
    $len = strlen($num);
    $memo = [];
    for ($i = 0; $i < $len; $i++) {
        if ($num[$i] != 0) {
            $memo[] = $num[$i] . str_repeat('0', $len - $i - 1);
        }
    }
    return implode(' + ', $memo);
}

function noYelling($str)
{
    $arr = explode(" ", $str);
    $len = count($arr);
    $map = [];
    foreach ($arr as $val) {
        if ($val === $arr[$len - 1]) {
            $s = preg_replace('/\s+/', ' ', $val);
            $s = preg_replace('/\!+/', '!', $val);
            $s = preg_replace('/\?+/', '?', $s);
            $map[] = $s;
            break;
        }
        $map[] = $val;
    }

    return implode(" ", $map);
}

echo euclidean(49, 14);
print_r(primeDivisors(99));
var_export(unique([3, 3, 3, 0.07, 3, 3]));
echo expand(5432);
print_r(noYelling("I just cannot believe it!!!!!"));

