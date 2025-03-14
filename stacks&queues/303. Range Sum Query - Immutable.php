?
<?php

// 303. Range Sum Query - Immutable
// Easy
// Topics
// Companies
// Given an integer array nums, handle multiple queries of the following type:

// Calculate the sum of the elements of nums between indices left and right inclusive where left <= right.
// Implement the NumArray class:

// NumArray(int[] nums) Initializes the object with the integer array nums.
// int sumRange(int left, int right) Returns the sum of the elements of nums between indices left and right inclusive (i.e. nums[left] + nums[left + 1] + ... + nums[right]).


// Example 1:

// Input
// ["NumArray", "sumRange", "sumRange", "sumRange"]
// [[[-2, 0, 3, -5, 2, -1]], [0, 2], [2, 5], [0, 5]]
// Output
// [null, 1, -1, -3]

// Explanation
// NumArray numArray = new NumArray([-2, 0, 3, -5, 2, -1]);
// numArray.sumRange(0, 2); // return (-2) + 0 + 3 = 1
// numArray.sumRange(2, 5); // return 3 + (-5) + 2 + (-1) = -1
// numArray.sumRange(0, 5); // return (-2) + 0 + 3 + (-5) + 2 + (-1) = -3


// Constraints:

// 1 <= nums.length <= 104
// -105 <= nums[i] <= 105
// 0 <= left <= right < nums.length
// At most 104 calls will be made to sumRange.

// https://leetcode.com/problems/range-sum-query-immutable/description/


class NumArray
{

    private $prefixSum;

    /**
     * @param integer[] $nums
     */
    function __construct($nums)
    {
        $n = count($nums);
        $this->prefixSum = array_fill(0, $n + 1, 0); // Initialize prefix sum array

        // Build the prefix sum array
        for ($i = 0; $i < $n; $i++) {
            $this->prefixSum[$i + 1] = $this->prefixSum[$i] + $nums[$i];
        }
        echo implode(',', $this->prefixSum) . "\n";
    }

    /**
     * @param integer $left
     * @param integer $right
     * @return integer
     */
    function sumRange($left, $right)
    {
        // Return the sum of elements from left to right using the prefix sum array
        return $this->prefixSum[$right + 1] - $this->prefixSum[$left];
    }
}

// Example usage:
$nums = [-2, 0, 3, -5, 2, -1];
$obj = new NumArray($nums);

// Performing the queries
echo $obj->sumRange(0, 2) . "\n";  // Output: 1
echo $obj->sumRange(2, 5) . "\n";  // Output: -1
echo $obj->sumRange(0, 5) . "\n";  // Output: -3

?>