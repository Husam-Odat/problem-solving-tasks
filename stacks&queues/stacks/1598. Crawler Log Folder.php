<?php
// 1598. Crawler Log Folder
// Solved
// Easy
// Topics
// Companies
// Hint
// The Leetcode file system keeps a log each time some user performs a change folder operation.

// The operations are described below:

// "../" : Move to the parent folder of the current folder. (If you are already in the main folder, remain in the same folder).
// "./" : Remain in the same folder.
// "x/" : Move to the child folder named x (This folder is guaranteed to always exist).
// You are given a list of strings logs where logs[i] is the operation performed by the user at the ith step.

// The file system starts in the main folder, then the operations in logs are performed.

// Return the minimum number of operations needed to go back to the main folder after the change folder operations.



// Example 1:



// Input: logs = ["d1/","d2/","../","d21/","./"]
// Output: 2
// Explanation: Use this change folder operation "../" 2 times and go back to the main folder.
// Example 2:



// Input: logs = ["d1/","d2/","./","d3/","../","d31/"]
// Output: 3
// Example 3:

// Input: logs = ["d1/","../","../","../"]
// Output: 0


// Constraints:

// 1 <= logs.length <= 103
// 2 <= logs[i].length <= 10
// logs[i] contains lowercase English letters, digits, '.', and '/'.
// logs[i] follows the format described in the statement.
// Folder names consist of lowercase English letters and digits.
// Seen this question in a real interview before?
// 1/5
// Yes
// No
// Accepted
// 265.4K
// Submissions
// 370.5K
// Acceptance Rate
// 71.6%
// Topics
// Companies
// Hint 1
// Simulate the process but don’t move the pointer beyond the main folder.
class Solution02
{

    /**
     * @param string[] $logs
     * @return integer
     */
    function minOperations($logs)
    {
        $stack = [];
        $length = count($logs);

        for ($i = 0; $i < $length; $i++) {
            $char = $logs[$i];
            if (!empty($stack) && $char == '../' && count($stack) > 0) {
                array_pop($stack);
            } elseif ($char != "./") {
                array_push($stack, $char);
            }
        }

        return count($stack);
    }
}

class Solution
{

    /**
     * @param string[] $logs
     * @return integer
     */
    public function minOperations($logs)
    {
        $stack = [];

        foreach ($logs as $log) {
            if ($log === "../") {
                if (!empty($stack)) {
                    array_pop($stack); // Move up a directory only if stack is not empty
                }
            } elseif ($log !== "./") {
                array_push($stack, $log); // Push valid directory names
            }
        }

        return count($stack); // Steps to reach current directory
    }
}
//test cases 
$logs = ["d1/", "d2/", "../", "d21/", "./"];
$obj = new Solution;
print_r($obj->minOperations($logs)); //2
echo "\n";
// more test cases 
$logs = ["d1/", "d2/", "./", "d3/", "../", "d31/"];
print_r($obj->minOperations($logs)); //3
echo "\n";
$logs = ["d1/", "../", "../", "../"];
print_r($obj->minOperations($logs)); //0
echo "\n";
$logs = ["./", "../", "./"];
print_r($obj->minOperations($logs)); //0
echo "\n";
