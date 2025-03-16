<?php
// 1021. Remove Outermost Parentheses
// https://leetcode.com/problems/remove-outermost-parentheses/description/?envType=problem-list-v2&envId=stack
// Easy
// Topics
// Companies
// Hint
// A valid parentheses string is either empty "", "(" + A + ")", or A + B, where A and B are valid parentheses strings, and + represents string concatenation.

// For example, "", "()", "(())()", and "(()(()))" are all valid parentheses strings.
// A valid parentheses string s is primitive if it is nonempty, and there does not exist a way to split it into s = A + B, with A and B nonempty valid parentheses strings.

// Given a valid parentheses string s, consider its primitive decomposition: s = P1 + P2 + ... + Pk, where Pi are primitive valid parentheses strings.

// Return s after removing the outermost parentheses of every primitive string in the primitive decomposition of s.



// Example 1:

// Input: s = "(()())(())"
// Output: "()()()"
// Explanation: 
// The input string is "(()())(())", with primitive decomposition "(()())" + "(())".
// After removing outer parentheses of each part, this is "()()" + "()" = "()()()".
// Example 2:

// Input: s = "(()())(())(()(()))"
// Output: "()()()()(())"
// Explanation: 
// The input string is "(()())(())(()(()))", with primitive decomposition "(()())" + "(())" + "(()(()))".
// After removing outer parentheses of each part, this is "()()" + "()" + "()(())" = "()()()()(())".
// Example 3:

// Input: s = "()()"
// Output: ""
// Explanation: 
// The input string is "()()", with primitive decomposition "()" + "()".
// After removing outer parentheses of each part, this is "" + "" = "".


// Constraints:

// 1 <= s.length <= 105
// s[i] is either '(' or ')'.
// s is a valid parentheses string.
// Seen this question in a real interview before?

// Topics
// Companies
// Hint 1
// Can you find the primitive decomposition? The number of ( and ) characters must be equal.


// More challenges
// 1062. Longest Repeating Substring
// 171. Excel Sheet Column Number
// 2408. Design SQL
class Solution
{

    /**
     * @param string $s
     * @return string
     */
    public function removeOuterParentheses($s)
    {
        $start = 0;
        $balance = 0;
        $result = '';
        $length = strlen($s);

        for ($i = 0; $i < $length; $i++) {
            if ($s[$i] == '(') {
                $balance++;
            } else {
                $balance--;
            }

            if ($balance == 0) {
                $result .= substr($s, $start + 1, $i - $start - 1);
                $start = $i + 1;
            }
        }

        return $result;
    }
}

// make test for this
//complexity of O(n) 
$s = new Solution();
echo $s->removeOuterParentheses("(()())(())") . "\n"; // "()()()"
echo $s->removeOuterParentheses("(()())(())(()(()))") . "\n"; // "()()()()(())"
echo $s->removeOuterParentheses("()()") . "\n"; // ""