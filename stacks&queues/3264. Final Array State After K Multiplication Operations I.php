<?php

// 3264. Final Array State After K Multiplication Operations I
// Easy
// Topics
// Companies
// Hint
// You are given an integer array nums, an integer k, and an integer multiplier.

// You need to perform k operations on nums. In each operation:

// Find the minimum value x in nums. If there are multiple occurrences of the minimum value, select the one that appears first.
// Replace the selected minimum value x with x * multiplier.
// Return an integer array denoting the final state of nums after performing all k operations.



// Example 1:

// Input: nums = [2,1,3,5,6], k = 5, multiplier = 2

// Output: [8,4,6,5,6]

// Explanation:

// Operation	Result
// After operation 1	[2, 2, 3, 5, 6]
// After operation 2	[4, 2, 3, 5, 6]
// After operation 3	[4, 4, 3, 5, 6]
// After operation 4	[4, 4, 6, 5, 6]
// After operation 5	[8, 4, 6, 5, 6]
// Example 2:

// Input: nums = [1,2], k = 3, multiplier = 4

// Output: [16,8]

// Explanation:

// Operation	Result
// After operation 1	[4, 2]
// After operation 2	[4, 8]
// After operation 3	[16, 8]


// Constraints:

// 1 <= nums.length <= 100
// 1 <= nums[i] <= 100
// 1 <= k <= 10
// 1 <= multiplier <= 5
// Seen this question in a real interview before?
// 1/5
// Yes
// No
// Accepted
// 175.4K
// Submissions
// 200.2K
// Acceptance Rate
// 87.6%
// Topics
// Array
// Math
// Heap (Priority Queue)
// Simulation
// Companies
// Hint 1
// Maintain sorted pairs (nums[index], index) in a priority queue.
// Hint 2
// Simulate the operation k times
// https://leetcode.com/problems/final-array-state-after-k-multiplication-operations-i/


class Solution
{

    /**
     * @param integer[] $nums
     * @param integer $k
     * @param integer $multiplier
     * @return integer[]
     */
    function getFinalState($nums, $k, $multiplier)
    {
        // Loop for k operations
        for ($i = 0; $i < $k; $i++) {
            // Find the index of the minimum value in the array
            $minIndex = array_search(min($nums), $nums);

            // Multiply the minimum value by the multiplier and update the array
            $nums[$minIndex] *= $multiplier;
        }

        // Return the final state of the array after all k operations
        return $nums;
    }
}

// Example usage:
$solution = new Solution();

// Example 1
$nums1 = [2, 1, 3, 5, 6];
$k1 = 5;
$multiplier1 = 2;
print_r($solution->getFinalState($nums1, $k1, $multiplier1));

// Example 2
$nums2 = [1, 2];
$k2 = 3;
$multiplier2 = 4;
print_r($solution->getFinalState($nums2, $k2, $multiplier2));
