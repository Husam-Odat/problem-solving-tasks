<?php
// 4. Find All Subarrays with a Given Sum

// function subarraysWithSum($arr, $target)
// {
//     $hashMap = [];
//     $sum = 0;
//     $count = 0;

//     // Initialize hashMap to store the frequency of sum occurrences
//     $hashMap[0] = 1;

//     foreach ($arr as $num) {
//         $sum += $num;

//         if (isset($hashMap[$sum - $target])) {
//             $count += $hashMap[$sum - $target];  // Add the number of times the sum - target occurred
//             echo '$count' . $count . '/n';
//         }

//         $hashMap[$sum] = isset($hashMap[$sum]) ? $hashMap[$sum] + 1 : 1;
//         print_r($hashMap);
//     }
//     echo '$hashMap[$sum]' . $hashMap[$sum] . '/n';
//     echo '$count' . $count . '/n';


//     return $count;
// }

// // Example usage
// $arr = [1, 2, 3, 0, 3];
// $target = 3;
// echo subarraysWithSum($arr, $target);  // Output: 3



function subarraysWithSum($arr, $target)
{
    $hashMap = [];
    $sum = 0;
    $count = 0;

    // Initialize hashMap to store the frequency of sum occurrences
    $hashMap[0] = 1;

    foreach ($arr as $num) {
        $sum += $num;

        if (isset($hashMap[$sum - $target])) {
            $count += $hashMap[$sum - $target];  // Add the number of times the sum - target occurred
            echo '$count' . $count . '/n';
        }

        $hashMap[$sum] = isset($hashMap[$sum]) ? $hashMap[$sum] + 1 : 1;
        print_r($hashMap);
    }

    return $count;
}

// Example usage
$arr = [1, 2, 3, 0, 3];
$target = 3;
echo subarraysWithSum($arr, $target);  // Output: 3