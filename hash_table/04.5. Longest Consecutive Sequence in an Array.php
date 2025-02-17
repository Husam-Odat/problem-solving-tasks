<?php


// 5. Longest Consecutive Sequence in an Array

function longestConsecutive($arr)
{
    $hashSet = [];

    // Store all elements in a hash set
    foreach ($arr as $num) {
        $hashSet[$num] = true;
    }

    $longestStreak = 0;

    foreach ($arr as $num) {
        if (!isset($hashSet[$num - 1])) {  // Check if this is the start of a sequence
            $currentNum = $num;
            $currentStreak = 1;

            while (isset($hashSet[$currentNum + 1])) {  // Check for the next consecutive number
                $currentNum++;
                $currentStreak++;
            }

            $longestStreak = max($longestStreak, $currentStreak);
        }
    }

    return $longestStreak;
}

// Example usage
$arr = [100, 4, 200, 1, 3, 2];
echo longestConsecutive($arr);  // Output: 4