<?php
// 1047. Remove All Adjacent Duplicates In String
// Solved
// Easy
// Topics
// Companies
// Hint
// You are given a string s consisting of lowercase English letters. A duplicate removal consists of choosing two adjacent and equal letters and removing them.

// We repeatedly make duplicate removals on s until we no longer can.

// Return the final string after all such duplicate removals have been made. It can be proven that the answer is unique.



// Example 1:

// Input: s = "abbaca"
// Output: "ca"
// Explanation: 
// For example, in "abbaca" we could remove "bb" since the letters are adjacent and equal, and this is the only possible move.  The result of this move is that the string is "aaca", of which only "aa" is possible, so the final string is "ca".
// Example 2:

// Input: s = "azxxzy"
// Output: "ay"


// Constraints:

// 1 <= s.length <= 105
// s consists of lowercase English letters.
// Seen this question in a real interview before?
// 1/5
// Yes
// No
// Accepted
// 691.4K
// Submissions
// 972.1K
// Acceptance Rate
// 71.1%
// Topics
// Companies
// Hint 1
// Use a stack to process everything greedily.

// More challenges
// 1209. Remove All Adjacent Duplicates in String II M
// 2390. Removing Stars From a String M
// In2716. Minimize String Length E
class Solution
{

    /**
     * @param string $s
     * @return string
     */
    public function removeDuplicates($s)
    {
        $stack = [];
        $length = strlen($s);

        for ($i = 0; $i < $length; $i++) {
            $char = $s[$i];
            if (!empty($stack) && end($stack) === $char) {
                array_pop($stack);
            } else {
                array_push($stack, $char);
            }
        }

        return implode('', $stack);
    }
}


//test this 
$s = "abbaca";
$obj = new Solution;
print_r($obj->removeDuplicates($s));
echo "\n";
// Output: "ca"
//time complexity: O(n)
//space complexity: O(n)

//test this
$s = "azxxzy";
$obj = new Solution;
print_r($obj->removeDuplicates($s));
// Output: "ay"