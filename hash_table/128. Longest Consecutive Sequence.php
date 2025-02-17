<?php
// 128. Longest Consecutive Sequence
// Solved
// Medium
// Topics
// Companies
// Given an unsorted array of integers nums, return the length of the longest consecutive elements sequence.

// You must write an algorithm that runs in O(n) time.



// Example 1:

// Input: nums = [100,4,200,1,3,2]
// Output: 4
// Explanation: The longest consecutive elements sequence is [1, 2, 3, 4]. Therefore its length is 4.
// Example 2:

// Input: nums = [0,3,7,2,5,8,4,6,0,1]
// Output: 9
// Example 3:

// Input: nums = [1,0,1,2]
// Output: 3


// Constraints:

// 0 <= nums.length <= 105
// -109 <= nums[i] <= 109
// https://leetcode.com/problems/longest-consecutive-sequence/description/
class Solution
{

    //momory limit exceed
    function longestConsecutive2($arr)
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
    // /**
    //  * @param Integer[] $nums
    //  * @param Integer $num
    //  * @return Integer
    //  */
    function longestConsecutive($nums)
    {
        // Creates an array by using the values from the keys array as keys and the values from the values array as the corresponding values.
        $nums = array_combine($nums, $nums);
        $longestStreak = 0;

        foreach ($nums as $num) {
            if (isset($nums[$num - 1])) {
                continue;
            }

            $currentStreak = 1;
            while (isset($nums[$num + $currentStreak])) {
                $currentStreak++;
            }

            if ($currentStreak > $longestStreak) {
                $longestStreak = $currentStreak;
            }
        }

        return $longestStreak;
    }
}
$solution = new Solution();
// Example usage
$nums = [100, 4, 200, 1, 3, 2];
echo $solution->longestConsecutive($nums);  // Output: 4