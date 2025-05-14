<?php
function customPrimeNum($num)
{
    if (empty($num)) {
        return false;
    }
    if ($num <= 1)
        return false;
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0)
            return false;
    }
    return true;
}

function customArrMap($callback, $array) {
    $result = [];
    foreach ($array as $key => $value) {
        $result[$key] = $callback($value);
    }
    return $result;
}

function customArrCount($array) {
    $result = [];

    foreach ($array as $value) {
        if (is_int($value) || is_string($value)) {
            $result[$value] = ($result[$value] ?? 0) + 1;
        }
    }

    return $result;
}

function customArrFilter($array, $callback = null) {
    $result = [];

    foreach ($array as $key => $value) {
        if ($callback) {
            if ($callback($value)) {
                $result[$key] = $value;
            }
        } else {
            if ($value) {
                $result[$key] = $value;
            }
        }
    }

    return $result;
}

function customArrKeys($array, $search_value = null, $strict = false) {
    $keys = [];

    foreach ($array as $key => $value) {
        if ($search_value === null) {
            $keys[] = $key;
        } else {
            if ($strict ? $value === $search_value : $value == $search_value) {
                $keys[] = $key;
            }
        }
    }

    return $keys;
}

function customIsNumeric($value) {
    // Check if it's an integer or float
    if (is_int($value) || is_float($value)) {
        return true;
    }

    // Check if it's a string that looks like a number
    if (is_string($value)) {
        // Allow optional sign (+/-), digits, optional decimal, and optional exponent
        return preg_match('/^[+-]?([0-9]*[.])?[0-9]+([eE][+-]?[0-9]+)?$/', trim($value)) === 1;
    }

    return false;
}

function customStrval($value) {
    switch (gettype($value)) {
        case 'string':
            return $value;
        case 'integer':
        case 'double':
            return (string) $value;
        case 'boolean':
            return $value ? '1' : '';
        case 'NULL':
            return '';
        case 'array':
            return 'Array';
        case 'object':
            return method_exists($value, '__toString') ? (string)$value : 'Object';
        default:
            return '';
    }
}
