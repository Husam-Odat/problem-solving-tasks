?

<?php
// 1614. Maximum Nesting Depth of the Parentheses
// Easy
// Topics
// Companies
// Hint
// Given a valid parentheses string s, return the nesting depth of s. The nesting depth is the maximum number of nested parentheses.



// Example 1:

// Input: s = "(1+(2*3)+((8)/4))+1"

// Output: 3

// Explanation:

// Digit 8 is inside of 3 nested parentheses in the string.

// Example 2:

// Input: s = "(1)+((2))+(((3)))"

// Output: 3

// Explanation:

// Digit 3 is inside of 3 nested parentheses in the string.

// Example 3:

// Input: s = "()(())((()()))"

// Output: 3



// Constraints:

// 1 <= s.length <= 100
// s consists of digits 0-9 and characters '+', '-', '*', '/', '(', and ')'.
// It is guaranteed that parentheses expression s is a VPS.
// Seen this question in a real interview before?
// 1/5
// Yes
// No
// Accepted
// 417.8K
// Submissions
// 496.2K
// Acceptance Rate
// 84.2%
// Topics
// Companies
// Hint 1
// The depth of any character in the VPS is the ( number of left brackets before it ) - ( number of right brackets before it )
// More challenges
// 1111. Maximum Nesting Depth of Two Valid Parentheses Strings

// https://leetcode.com/problems/maximum-nesting-depth-of-the-parentheses/submissions/1576085967/?envType=problem-list-v2&envId=stack
class Solution
{

    /**
     * @param string $s
     * @return integer
     */
    public function maxDepth($s)
    {
        $depth = 0;
        $maxDepth = 0;
        $length = strlen($s);

        for ($i = 0; $i < $length; $i++) {
            if ($s[$i] == '(') {
                $depth++;
                $maxDepth = max($maxDepth, $depth);
            } elseif ($s[$i] == ')') {
                $depth--;
            }
        }

        return $maxDepth;
    }
}

class Solution02
{

    /**
     * @param string $s
     * @return integer
     */
    public function maxDepth($s)
    {
        $current_depth = 0;
        $max_depth = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if ($char == '(') {
                $current_depth++;
                if ($current_depth > $max_depth) {
                    $max_depth = $current_depth;
                }
            } elseif ($char == ')') {
                $current_depth--;
            }
        }
        return $max_depth;
    }
}
//test casses 
$solution = new Solution();
// $solution = new Solution02();
$s = "(1+(2*3)+((8)/4))+1";
print_r($solution->maxDepth($s)); //3
echo "\n";
print_r($solution->maxDepth($s)); //3
echo "\n";
$s = "(1)+((2))+(((3)))";
print_r($solution->maxDepth($s)); //3
echo "\n";
print_r($solution->maxDepth($s)); //3
echo "\n";
$s = "()(())((()()))";
print_r($solution->maxDepth($s)); //3
echo "\n";
print_r($solution->maxDepth($s)); //3

?>