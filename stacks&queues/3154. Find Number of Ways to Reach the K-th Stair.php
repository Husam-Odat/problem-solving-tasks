<?php
// 3154. Find Number of Ways to Reach the K-th Stair
// Solved
// Hard
// Topics
// Companies
// Hint
// You are given a non-negative integer k. There exists a staircase with an infinite number of stairs, with the lowest stair numbered 0.

// Alice has an integer jump, with an initial value of 0. She starts on stair 1 and wants to reach stair k using any number of operations. If she is on stair i, in one operation she can:

// Go down to stair i - 1. This operation cannot be used consecutively or on stair 0.
// Go up to stair i + 2jump. And then, jump becomes jump + 1.
// Return the total number of ways Alice can reach stair k.

// Note that it is possible that Alice reaches the stair k, and performs some operations to reach the stair k again.



// Example 1:

// Input: k = 0

// Output: 2

// Explanation:

// The 2 possible ways of reaching stair 0 are:

// Alice starts at stair 1.
// Using an operation of the first type, she goes down 1 stair to reach stair 0.
// Alice starts at stair 1.
// Using an operation of the first type, she goes down 1 stair to reach stair 0.
// Using an operation of the second type, she goes up 20 stairs to reach stair 1.
// Using an operation of the first type, she goes down 1 stair to reach stair 0.
// Example 2:

// Input: k = 1

// Output: 4

// Explanation:

// The 4 possible ways of reaching stair 1 are:

// Alice starts at stair 1. Alice is at stair 1.
// Alice starts at stair 1.
// Using an operation of the first type, she goes down 1 stair to reach stair 0.
// Using an operation of the second type, she goes up 20 stairs to reach stair 1.
// Alice starts at stair 1.
// Using an operation of the second type, she goes up 20 stairs to reach stair 2.
// Using an operation of the first type, she goes down 1 stair to reach stair 1.
// Alice starts at stair 1.
// Using an operation of the first type, she goes down 1 stair to reach stair 0.
// Using an operation of the second type, she goes up 20 stairs to reach stair 1.
// Using an operation of the first type, she goes down 1 stair to reach stair 0.
// Using an operation of the second type, she goes up 21 stairs to reach stair 2.
// Using an operation of the first type, she goes down 1 stair to reach stair 1.


// Constraints:

// 0 <= k <= 109
// Seen this question in a real interview before?
// 1/5
// Yes
// No
// Accepted
// 13K
// Submissions
// 35.9K
// Acceptance Rate
// 36.2%
// Topics
// Math
// Dynamic Programming
// Bit Manipulation
// Memoization
// Combinatorics
// Companies
// Hint 1
// On using x operations of the second type and y operations of the first type, the stair 2x - y is reached.
// Hint 2
// Since first operations cannot be consecutive, there are exactly x + 1 positions (before and after each power of 2) to perform the second operation.
// Hint 3
// Using combinatorics, we have x + 1Cy number of ways to select the positions of second operations.
// Similar Questions
// Climbing Stairs
// Easy
// Min Cost Climbing Stairs
// https://leetcode.com/problems/find-number-of-ways-to-reach-the-k-th-stair/description/

class Solution
{

    /**
     * @param integer $k
     * @return integer
     */
    function waysToReachStair($k)
    {
        $ans = 0;
        for ($x = 0; $x <= 60; $x++) {
            $pow2x = pow(2, $x);
            if ($pow2x < $k) {
                continue;
            }
            $y = $pow2x - $k;
            if ($y < 0 || $y > $x + 1) {
                continue;
            }
            $ans += $this->comb($x + 1, $y);
        }
        return $ans;
    }

    function comb($n, $k)
    {
        if ($k < 0 || $k > $n) {
            return 0;
        }
        if ($k == 0 || $k == $n) {
            return 1;
        }
        $k = min($k, $n - $k);
        $res = 1;
        for ($i = 0; $i < $k; $i++) {
            $res *= ($n - $i);
            $res /= ($i + 1);
        }
        return $res;
    }
}

//add test 
$solution = new Solution();
echo $solution->waysToReachStair(0) . "\n"; // Output: 2
echo $solution->waysToReachStair(1) . "\n"; // Output: 4
echo $solution->waysToReachStair(2) . "\n"; // Output: 4
echo $solution->waysToReachStair(3) . "\n"; // Output: 3
echo $solution->waysToReachStair(4) . "\n"; // Output: 2

?>
// 3154. Find Number of Ways to Reach the K-th Stair
<!-- https://chat.deepseek.com/a/chat/s/437bcff4-1aed-46ad-85af-ca8ea1e08cd9 -->
To solve this problem, we need to determine the number of distinct ways Alice can reach stair `k` starting from stair 1
using specific operations. Alice can either go down one stair (but not consecutively or from stair 0) or jump up by
`2^jump` stairs, incrementing the jump value each time.

### Approach
The key insight is to model the problem using combinatorial mathematics. The solution involves:
1. **Understanding the Operations**: Alice can either go down one stair (non-consecutively) or jump up by `2^jump`
stairs. Each jump increases the jump value by 1.
2. **Mathematical Formulation**: After `x` up operations and `y` down operations, the position Alice reaches is `2^x -
y`. This must equal `k` for valid sequences.
3. **Combinatorial Arrangement**: The down operations must be placed such that no two are consecutive. This can be
modeled using combinations, where we choose `y` positions out of `x+1` possible slots (before, between, or after up
operations).

### Solution Code
```php
class Solution {

/**
* @param Integer $k
* @return Integer
*/
function waysToReachStair($k) {
$ans = 0;
for ($x = 0; $x <= 60; $x++) { $pow2x=pow(2, $x); if ($pow2x < $k) { continue; } $y=$pow2x - $k; if ($y < 0 || $y> $x +
    1) {
    continue;
    }
    $ans += $this->comb($x + 1, $y);
    }
    return $ans;
    }

    function comb($n, $k) {
    if ($k < 0 || $k> $n) {
        return 0;
        }
        if ($k == 0 || $k == $n) {
        return 1;
        }
        $k = min($k, $n - $k);
        $res = 1;
        for ($i = 0; $i < $k; $i++) { $res *=($n - $i); $res /=($i + 1); } return $res; } } ``` ### Explanation 1.
            **Loop Through Possible Jumps**: We iterate over possible values of `x` (number of up operations) up to 60,
            which is sufficient given the problem constraints. 2. **Check Validity**: For each `x`, compute `2^x` and
            check if it is at least `k`. Calculate `y` as `2^x - k`. 3. **Combinatorial Check**: Ensure `y` is
            non-negative and fits within the combinatorial constraints (i.e., `y <=x + 1`). 4. **Combination
            Calculation**: Use the combination formula to determine the number of valid sequences for each valid `x` and
            `y`. This approach efficiently leverages combinatorial mathematics to avoid enumerating all possible
            sequences, making it feasible even for large values of `k`.