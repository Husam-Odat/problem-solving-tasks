<?php

// 2. Pair Sum Problem (Find Pairs that Sum to a Given Target)
function findPairsWithSum($arr, $target)
{
    $hashMap = [];
    $pairs = [];

    foreach ($arr as $num) {
        $complement = $target - $num;

        if (isset($hashMap[$complement])) {
            $pairs[] = [$complement, $num];  // Pair found
        }

        $hashMap[$num] = true;  // Store the current number
    }

    return $pairs;
}

// Example usage
$arr = [2, 7, 11, 15, -2, 4, 8];
$target = 10;
print_r(findPairsWithSum($arr, $target));

// Output:
// Array ( [0] => Array ( [0] => 7 [1] => 3 ) [1] => Array ( [0] => 2 [1] => 8 ) )