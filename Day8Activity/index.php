<?php

function counts($value){
    $length = 0;
    foreach ($value as $name) {
        $length++;
    }
    return $length;
}

function hurdleJump($hurdles, $jumpHeight) {
    // Memoization array to store whether the hurdle can be cleared
    $memo = [];

    // Helper function to recursively check if the jumper can clear the hurdles
    function canClearHurdles($hurdles, $index, $jumpHeight, &$memo) {
        // If we've already checked this hurdle, return the stored result
        if (isset($memo[$index])) {
            return $memo[$index];
        }
        
        // If we've checked all hurdles
        if ($index >= counts($hurdles)) {
            return true;
        }
        
        // Check if the current hurdle is greater than the jump height
        if ($hurdles[$index] > $jumpHeight) {
            $memo[$index] = false; // Store the result
            return false;
        }
        
        // Recursively check the next hurdle
        $result = canClearHurdles($hurdles, $index + 1, $jumpHeight, $memo);
        
        // Store the result for the current index
        $memo[$index] = $result;
        
        return $result;
    }
    
    // Start the recursive check from the first hurdle (index 0)
    return canClearHurdles($hurdles, 0, $jumpHeight, $memo);
}

// Example usage:
$hurdles = [1, 2, 1];
$jumpHeight = 1;

echo hurdleJump($hurdles, $jumpHeight) ? 'true' : 'false'; // Should output 'true'


function secondLargest($numbers) {
    if (counts($numbers) < 2) {
        return null;
    }

    $largest = PHP_INT_MIN;
    $secondLargest = PHP_INT_MIN;

    foreach ($numbers as $num) {
        if ($num > $largest) {
            $secondLargest = $largest;
            $largest = $num;
        } elseif ($num > $secondLargest && $num < $largest) {
            $secondLargest = $num;
        }
    }

    return $secondLargest === PHP_INT_MIN ? null : $secondLargest;
}

$numbers = [10, 40, 30, 20, 50];
echo secondLargest($numbers);  // Output: 40

function findBob($names) {
    // Create a cache to store results of previous checks
    $cache = [];

    // Manually determine the length of the array
    // $length = 0;
    // foreach ($names as $name) {
    //     $length++;
    // }

    // Iterate through the array manually
    for ($index = 0; $index < counts($names); $index++) {
        $name = $names[$index];
        
        // Check if we have already cached the result for this name
        if (isset($cache[$name])) {
            // If we find "Bob" in the cache, return its index
            if ($name == "Bob") {
                return $cache[$name];
            }
        }
        else {
            // Cache the result
            if ($name == "Bob") {
                $cache[$name] = $index;
                return $index; // Return the index if "Bob" is found
            } else {
                // Cache the value as -1 if it's not found
                $cache[$name] = -1;
            }
        }
    }

    // If "Bob" was not found, return -1
    return -1;
}

// Test the function
echo findBob(["BOB", "Layla", "Kaitlyn", "Patricia"]);  // Output: 2

?>


