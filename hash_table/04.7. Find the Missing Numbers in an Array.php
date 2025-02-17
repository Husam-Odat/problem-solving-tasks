<?php
// 7. Find the Missing Numbers in an Array
function findMissingNumbers($arr, $n)
{
    $hashMap = [];
    $missingNumbers = [];

    // Mark all numbers present in the array
    foreach ($arr as $num) {
        $hashMap[$num] = true;
    }

    // Find all numbers that are missing
    for ($i = 1; $i <= $n; $i++) {
        if (!isset($hashMap[$i])) {
            $missingNumbers[] = $i;
        }
    }

    return $missingNumbers;
}

// Example usage
$arr = [2, 3, 7, 4, 8];
$n = 8;
print_r(findMissingNumbers($arr, $n));  // Output: [1, 5, 6]