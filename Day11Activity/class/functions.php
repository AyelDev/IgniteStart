<?php
include_once 'customfunctions.php';
// Activity No. 1
function longestCommonEnding(array $arr): string
{
    $len = custmMin(custmArrMap('custmStrlen', $arr));
    $res = '';

    for ($i = 1; $i <= $len; $i++) {
        if ($arr[0][-$i] === $arr[1][-$i]) {
            $res = $arr[0][-$i] . $res;
        } else {
            break;
        }
    }

    return $res;
}

// Activity No. 2
function constructDeconstruct(string $str)
{
    $len = custmStrlen($str);
    $build = [];

    for ($i = 1; $i <= $len; $i++) {
        $build[] = custmSubstr($str, 0, $i);
    }

    $deconstruct = custmArrReverse(custmArrSlice($build, 0, -1));

    $res = custmArrMerge($build, $deconstruct);

    $final = [
        0 => $res
    ];

    return $final;
}

// Activity No. 3
function multiplyNum($num)
{
    for ($i = 1; $i <= $num; $i++) {
        echo "<div class='cell'>$i<br>";
        for ($j = 0; $j <= $num; $j++) {
            echo "$i x $j = " . ($i * $j) . "<br>";
        }
        echo "</div>";
    }
}

// Activity No. 4
function isPrimeNum($num)
{
    $true = "$num is prime number";
    $false = "$num is not a prime number";

    if ($num <= 1)
        return $false;

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0)
            return $false;
    }

    return $true;
}


// Activity No. 5
function sumOfDigit($num)
{

    $num = (string) $num;
    $res = 0;

    for ($i = 0; $i <= custmStrlen($num) - 1; $i++) {
        $res += $num[$i];
    }

    return "The sum of digits of $num is $res";
}
