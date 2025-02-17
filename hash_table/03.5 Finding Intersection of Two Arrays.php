<?php

// Finding Intersection of Two Arrays
function arrayIntersection($arr1, $arr2)
{
    $result = [];
    $hashMap = [];

    // Store elements of arr1 in the hash table
    foreach ($arr1 as $value) {
        $hashMap[$value] = true;
    }

    // Check if elements of arr2 are in the hash table
    foreach ($arr2 as $value) {
        if (isset($hashMap[$value])) {
            $result[] = $value;
            unset($hashMap[$value]);  // Remove the element to avoid duplicates in the result
        }
    }

    return $result;
}

// Example usage
$arr1 = [1, 2, 2, 1];
$arr2 = [2, 2];
print_r(arrayIntersection($arr1, $arr2));

// Output:
// Array ( [0] => 2 )


// without this 
// unset($hashMap[$value]);
// Array ( [0] => 2 [1] => 2 )