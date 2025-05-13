<?php 

// Activity No. 1
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

// Activity No. 2
function constructDeconstruct(string $str)
{
    $len = strlen($str);
    $build = [];

    for ($i = 1; $i <= $len; $i++) {
        $build[] = substr($str, 0, $i);
    }

    $deconstruct = array_reverse(array_slice($build, 0, -1));
  
    $result = array_merge($build, $deconstruct);

    $final = [
        0 => $result
    ];

    return $final;
}

// Activity No. 3
function multiplyNum($num)
{
    for ($i = 1; $i <= $num; $i++) {
        echo "<div class='cell'>$i<br>";
        for($j = 0; $j <= $num; $j++){
            echo "$i x $j = " . ($i*$j) . "<br>";
        }
        echo "</div>";
    }
}

// Activity No. 4
function isPrimeNum($num, $true = 'Prime number', $false = 'Not a prime number')
{
    
    if($num <= 1)
    return $false;

    for($i = 2; $i < $num; $i++){
        if($num % $i == 0)
            return $false;
    }

    return $true;

}


// Activity No. 5
function sumOfDigit($num)
{
    
    $num =(string)$num;
    $res = 0;

    for($i = 0; $i <= strlen($num) - 1; $i++){
        $res += $num[$i];
    }

   return "The sum of digits of $num is $res";
}
