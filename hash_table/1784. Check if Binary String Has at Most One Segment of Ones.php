<?php
// 1784. Check if Binary String Has at Most One Segment of Ones

// 1784. Check if Binary String Has at Most One Segment of Ones
// Solved
// Easy
// Topics
// Companies
// Hint
// Given a binary string s ​​​​​without leading zeros, return true​​​ if s contains at most one contiguous segment of ones. Otherwise, return false.



// Example 1:

// Input: s = "1001"
// Output: false
// Explanation: The ones do not form a contiguous segment.
// Example 2:

// Input: s = "110"
// Output: true


// Constraints:

// 1 <= s.length <= 100
// s[i]​​​​ is either '0' or '1'.
// s[0] is '1'.
// Seen this question in a real interview before?
// 1/5
// Yes
// No
// Accepted
// 50.4K
// Submissions
// 128.6K
// Acceptance Rate
// 39.2%
// Topics
// Companies
// Hint 1
// It's guaranteed to have at least one segment
// Hint 2
// The string size is small so you can count all segments of ones with no that have no adjacent ones.
class Solution01
{

    /**
     * @param string $s
     * @return boolean
     */
    function checkOnesSegment($s)
    {
        for ($i = 1; $i < strlen($s) - 1; $i++) {
            if ($s[$i] == "0" && $s[$i + 1] == "1") return false;
        }
        return true;
    }
}
class Solution02
{

    /**
     * @param string $s
     * @return boolean
     */
    function checkOnesSegment($s)
    {
        return strpos($s, '01') === false;
    }
}

$Solution01 = new Solution01();
$s = "110";
echo (($Solution01->checkOnesSegment($s)) ? 'true' : 'false') . PHP_EOL;;
$s = "1001";
echo (($Solution01->checkOnesSegment($s)) ? 'true' : 'false') . PHP_EOL;;
