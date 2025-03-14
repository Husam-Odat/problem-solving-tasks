<?php
// 70. Climbing Stairs
// https://leetcode.com/problems/climbing-stairs/description/
// Solved
// Easy
// Topics
// Companies
// Hint
// You are climbing a staircase. It takes n steps to reach the top.

// Each time you can either climb 1 or 2 steps. In how many distinct ways can you climb to the top?


// Example 1:
// Input: n = 2
// Output: 2
// Explanation: There are two ways to climb to the top.
// 1. 1 step + 1 step
// 2. 2 steps
// Example 2:

// Input: n = 3
// Output: 3
// Explanation: There are three ways to climb to the top.
// 1. 1 step + 1 step + 1 step
// 2. 1 step + 2 steps
// 3. 2 steps + 1 step


// Constraints:1 <= n <=45 
class Solution
{
    /**
     * @param integer $n
     * @return integer
     */
    function climbStairs($n)
    {
        if ($n == 1) return 1;
        if ($n == 2) return 2;

        $first = 1;
        $second = 2;

        for ($i = 3; $i <= $n; $i++) {
            $third = $first + $second;
            echo $i . '$third ' . $third . "\n";
            $first = $second;
            echo $i . '$first ' . $first . "\n";
            $second = $third;
            echo $i . '$second ' .  $second . "\n";
        }
        return $second;
    }
}
// Example
//usage:
$solution = new Solution();
// echo $solution->climbStairs(2) . "\n"; // Output: 2
// echo $solution->climbStairs(3) . "\n"; // Output: 3
echo $solution->climbStairs(8) . "\n"; // Output: 34
// echo $solution->climbStairs(13) . "\n"; // Output: 377
// echo $solution->climbStairs(22) . "\n"; // Output: 28657