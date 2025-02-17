<?php
// Finding the Missing Number in an Array (1 to N)


function findMissingNumber($arr, $n)
{
    $sum = array_sum($arr);
    $expectedSum = $n * ($n + 1) / 2;
    echo '$sum' . $sum . "\n";
    echo '$expectedSum' . $expectedSum . "\n";
    return $expectedSum - $sum;
}

// Example usage
$arr = [1, 2, 4, 6, 3, 7, 8];
$n = 8;
echo findMissingNumber($arr, $n);  // Output: 5