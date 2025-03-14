<?php

// 746. Min Cost Climbing Stairs
// https://leetcode.com/problems/min-cost-climbing-stairs/
// Easy
// Topics
// Companies
// Hint
// You are given an integer array cost where cost[i] is the cost of ith step on a staircase. Once you pay the cost, you can either climb one or two steps.

// You can either start from the step with index 0, or the step with index 1.

// Return the minimum cost to reach the top of the floor.



// Example 1:

// Input: cost = [10,15,20]
// Output: 15
// Explanation: You will start at index 1.
// - Pay 15 and climb two steps to reach the top.
// The total cost is 15.
// Example 2:

// Input: cost = [1,100,1,1,1,100,1,1,100,1]
// Output: 6
// Explanation: You will start at index 0.
// - Pay 1 and climb two steps to reach index 2.
// - Pay 1 and climb two steps to reach index 4.
// - Pay 1 and climb two steps to reach index 6.
// - Pay 1 and climb one step to reach index 7.
// - Pay 1 and climb two steps to reach index 9.
// - Pay 1 and climb one step to reach the top.
// The total cost is 6.


// Constraints:

// 2 <= cost.length <= 1000
// 0 <= cost[i] <= 999
// Seen this question in a real interview before?
// 1/5
// Yes
// No
// Accepted
// 1.4M
// Submissions
// 2.1M
// Acceptance Rate
// 66.7%
// Topics
// Array
// Dynamic Programming
// Companies
// Hint 1
// Build an array dp where dp[i] is the minimum cost to climb to the top starting from the ith staircase.
// Hint 2
// Assuming we have n staircase labeled from 0 to n - 1 and assuming the top is n, then dp[n] = 0, marking that if you are at the top, the cost is 0.
// Hint 3
// Now, looping from n - 1 to 0, the dp[i] = cost[i] + min(dp[i + 1], dp[i + 2]). The answer will be the minimum of dp[0] and dp[1]

class Solution2
{

    /**
     * @param integer[] $cost
     * @return integer
     */
    function minCostClimbingStairs($cost)
    {
        $n = count($cost);

        // Initialize two variables for the last two states
        $prev2 = 0; // dp[i-2]
        $prev1 = 0; // dp[i-1]

        for ($i = 2; $i <= $n; $i++) {
            // Calculate the current dp[i] using dp[i-1] and dp[i-2]
            $current = min($prev1 + $cost[$i - 1], $prev2 + $cost[$i - 2]);

            // Update prev2 and prev1 for the next iteration
            $prev2 = $prev1;
            $prev1 = $current;
        }

        return $prev1;
    }
}
class Solution
{
    /**
     * @param integer[] $cost
     * @return integer
     */
    function minCostClimbingStairs($cost)
    {
        $n = count($cost);
        $dp = array_fill(0, $n + 1, 0);

        for ($i = 2; $i <= $n; $i++) {
            $dp[$i] = min($dp[$i - 1] + $cost[$i - 1], $dp[$i - 2] + $cost[$i - 2]);
            echo '$dp[$i]' . $dp[$i] . "\n";
        }
        echo '$dp[$n]' . $dp[$n] . "\n";
        return $dp[$n];
    }
}

// Example usage:
$solution = new Solution();
$cost = [10, 15, 20];
echo $solution->minCostClimbingStairs($cost) . "\n"; // Output: 15

$cost = [1, 100, 1, 1, 1, 100, 1, 1, 100, 1];
echo $solution->minCostClimbingStairs($cost) . "\n"; // Output: 6