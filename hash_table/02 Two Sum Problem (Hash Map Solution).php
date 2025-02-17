<?php
// Two Sum Problem (Hash Map Solution)
function twoSum($nums, $target)
{
    $hashMap = [];

    foreach ($nums as $index => $num) {
        $complement = $target - $num;
        echo '$complement ' . $complement . "/n";

        if (isset($hashMap[$complement])) {
            echo '$hashMap[$complement], $index ' . $hashMap[$complement] . $index . "/n";
            return [$hashMap[$complement], $index]; // Return the indices of the two numbers
        }

        $hashMap[$num] = $index; // Store the number with its index
        print_r($hashMap);
    }

    return null;
}

// Example usage
$nums = [2, 3, 5, 6, 7, 11, 15];
$target = 9;
print_r(twoSum($nums, $target));  // Output: [0, 1]