<?php
// 2696. Minimum String Length After Removing Substrings
// Solved
// Easy
// Topics
// Companies
// Hint
// You are given a string s consisting only of uppercase English letters.

// You can apply some operations to this string where, in one operation, you can remove any occurrence of one of the substrings "AB" or "CD" from s.

// Return the minimum possible length of the resulting string that you can obtain.

// Note that the string concatenates after removing the substring and could produce new "AB" or "CD" substrings.



// Example 1:

// Input: s = "ABFCACDB"
// Output: 2
// Explanation: We can do the following operations:
// - Remove the substring "ABFCACDB", so s = "FCACDB".
// - Remove the substring "FCACDB", so s = "FCAB".
// - Remove the substring "FCAB", so s = "FC".
// So the resulting length of the string is 2.
// It can be shown that it is the minimum length that we can obtain.
// Example 2:

// Input: s = "ACBBD"
// Output: 5
// Explanation: We cannot do any operations on the string so the length remains the same.


// Constraints:

// 1 <= s.length <= 100
// s consists only of uppercase English letters.
// Seen this question in a real interview before?
// 1/5
// Yes
// No
// Accepted
// 224.7K
// Submissions
// 289.9K
// Acceptance Rate
// 77.5%
// Topics
// Companies
// Hint 1
// Can we use brute force to solve the problem?
// Hint 2
// Repeatedly traverse the string to find and remove the substrings “AB” and “CD” until no more occurrences exist.
// Hint 3
// Can the solution be optimized using a stack?
class Solution02
//my code wronge
{

    /**
     * @param string $s
     * @return integer
     */
    public function minLength($s)
    {
        $stack = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (!empty($stack)) {
                $dif = (ord($s[$i]) - ord(end($stack)));
                if ($dif == 1 || $dif == -1) {
                    array_pop($stack);
                }
            } else {
                array_push($stack, $s[$i]);
            }
        }
        return count($stack);
    }
}


class Solution01
{

    /**
     * @param string $s
     * @return integer
     */
    public function minLength($s)
    {
        $stack = [];

        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if (
                !empty($stack) &&
                (($char == "B" && $stack[count($stack) - 1] == "A") ||
                    ($char == "D" && $stack[count($stack) - 1] == "C"))
            ) {
                array_pop($stack);
            } else {
                array_push($stack, $char);
            }
        }
        return count($stack);
    }
}
class Solution
{

    /**
     * @param string $s
     * @return integer
     */
    public function minLength($s)
    {
        // Initialize an empty stack
        $stack = [];

        // Traverse through each character in the input string
        for ($i = 0; $i < strlen($s); $i++) {
            $currentChar = $s[$i];

            // Check if the top of the stack forms "AB" or "CD" with the current character
            if (!empty($stack)) {
                $topChar = end($stack);

                // Remove "AB" or "CD" if found
                if (($topChar == 'A' && $currentChar == 'B') || ($topChar == 'C' && $currentChar == 'D')) {
                    array_pop($stack); // Remove the top element from the stack
                    continue; // Skip adding the current character
                }
            }

            // If no removals, add the current character to the stack
            $stack[] = $currentChar;
        }

        // The minimum possible length is the size of the stack
        return count($stack);
    }
}
//test cases
$s = "ABFCACDB";
$obj = new Solution;
echo $obj->minLength($s); //2
echo "\n";
$s = "ACBBD";
echo $obj->minLength($s); //5
echo "\n";
$s = "ABCD";
echo $obj->minLength($s); //0
echo "\n";
$s = "BJKDKABJ";
echo $obj->minLength($s); //6