<?php

// 3. Remove Duplicates from an Array

function removeDuplicates($arr)
{
    $hashMap = [];
    $uniqueArr = [];

    foreach ($arr as $num) {
        if (!isset($hashMap[$num])) {
            $hashMap[$num] = true;
            $uniqueArr[] = $num;
        }
    }

    return $uniqueArr;
}

// Example usage
$arr = [1, 2, 2, 3, 4, 4, 5];
print_r(removeDuplicates($arr));

// Output:
// Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 )