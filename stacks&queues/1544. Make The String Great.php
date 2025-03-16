<?php
// 1544. Make The String Great
// Easy
// Topics
// Companies
// Hint
// Given a string s of lower and upper case English letters.

// A good string is a string which doesn't have two adjacent characters s[i] and s[i + 1] where:

// 0 <= i <= s.length - 2
// s[i] is a lower-case letter and s[i + 1] is the same letter but in upper-case or vice-versa.
// To make the string good, you can choose two adjacent characters that make the string bad and remove them. You can keep doing this until the string becomes good.

// Return the string after making it good. The answer is guaranteed to be unique under the given constraints.

// Notice that an empty string is also good.



// Example 1:

// Input: s = "leEeetcode"
// Output: "leetcode"
// Explanation: In the first step, either you choose i = 1 or i = 2, both will result "leEeetcode" to be reduced to "leetcode".
// Example 2:

// Input: s = "abBAcC"
// Output: ""
// Explanation: We have many possible scenarios, and all lead to the same answer. For example:
// "abBAcC" --> "aAcC" --> "cC" --> ""
// "abBAcC" --> "abBA" --> "aA" --> ""
// Example 3:

// Input: s = "s"
// Output: "s"


// Constraints:

// 1 <= s.length <= 100
// s contains only lower and upper case English letters.
// Seen this question in a real interview before?
// 1/5
// Yes
// No
// Accepted
// 352.5K
// Submissions
// 516.5K
// Acceptance Rate
// 68.2%
// Topics
// Companies
// Hint 1
// The order you choose 2 characters to remove doesn't matter.
// Hint 2
// Keep applying the mentioned step to s till the length of the string is not changed.

// More challenges
// 1392. Longest Happy Prefix
// 734. Sentence Similarity
// 2273. Find Resultant Array After Removing Anagrams
class Solution
{

    /**
     * @param string $s
     * @return string
     */
    public function makeGood($s)
    {

        $stack = [];
        $length = strlen($s);

        for ($i = 0; $i < $length; $i++) {
            $char = $s[$i];
            if (!empty($stack) &&  abs(ord(end($stack)) - ord($char)) === 32) {
                array_pop($stack);
            } else {
                array_push($stack, $char);
            }
        }

        return implode('', $stack);
    }
}
// test this 
$s = "leEeetcode";
$obj = new Solution;
echo "$s : " . $obj->makeGood(s: $s); // answer is "leetcode"
echo "\n";

// more test cases
$s = "abBAcC";
$obj = new Solution;
echo "$s : " . $obj->makeGood(s: $s); // answer is ""
echo "\n";
$s = "s";
$obj = new Solution;
echo "$s : " . $obj->makeGood(s: $s); // answer is "s"
echo "\n";
$s = "Pp";
$obj = new Solution;
echo "Pp : " . $obj->makeGood(s: $s); // answer is ""