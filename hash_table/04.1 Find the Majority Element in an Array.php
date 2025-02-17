<?php 


// Find the Majority Element in an Array (Element Appears More Than N/2 Times)
function majorityElement($arr) {
    $hashMap = [];
    $n = count($arr);

    foreach ($arr as $num) {
        if (isset($hashMap[$num])) {
            $hashMap[$num]++;
        } else {
            $hashMap[$num] = 1;
        }

        if ($hashMap[$num] > $n / 2) {
            return $num;
        }
    }

    return null;  // No majority element found
}

// Example usage
$arr = [3, 3, 4, 2, 4, 4, 2, 4, 4];
echo majorityElement($arr);  // Output: 4