<?php
function custmStrlen(string $str): int
{
    $length = 0;
    while (isset($str[$length])) {
        $length++;
    }
    return $length;
}

function custmArrMerge(...$arrays): array
{
    $result = [];
    foreach ($arrays as $array) {
        foreach ($array as $item) {
            $result[] = $item;
        }
    }
    return $result;
}

function custmMin($array)
{
    if (!is_array($array) || empty($array)) {
        return null;
    }

    $minimum = reset($array);

    foreach ($array as $value) {
        if ($value < $minimum) {
            $minimum = $value;
        }
    }

    return $minimum;
}

function custmArrMap(callable $callback, array $array): array
{
    $result = [];
    foreach ($array as $key => $value) {
        $result[$key] = $callback($value);
    }
    return $result;
}

function custmSubstr(string $string, int $start, ?int $length = null): string
{
    $strLen = custmStrlen($string);

    if ($start < 0) {
        $start = max($strLen + $start, 0);
    }

    if ($start >= $strLen) {
        return '';
    }

    if ($length === null) {
        $length = $strLen - $start;
    } elseif ($length < 0) {
        $length = max($strLen - $start + $length, 0);
    } else {
        $length = min($length, $strLen - $start);
    }

    $result = '';
    for ($i = 0; $i < $length; $i++) {
        if (isset($string[$start + $i])) {
            $result .= $string[$start + $i];
        }
    }

    return $result;
}

function custmArrSlice(array $array, int $offset, ?int $length = null): array
{
    $arrayLength = count($array);

    if ($offset < 0) {
        $offset = max($arrayLength + $offset, 0);
    }

    if ($offset >= $arrayLength) {
        return [];
    }

    if ($length === null) {
        $length = $arrayLength - $offset;
    } elseif ($length < 0) {
        $length = $arrayLength - $offset + $length;
    }

    $result = [];
    $count = 0;

    foreach ($array as $key => $value) {
        if ($count >= $offset && $count < ($offset + $length)) {
            $result[] = $value;
        }
        $count++;
    }

    return $result;
}

function custmArrReverse(array $array): array
{
    $result = [];
    $length = count($array);

    for ($i = $length - 1; $i >= 0; $i--) {
        $result[] = $array[$i];
    }

    return $result;
}