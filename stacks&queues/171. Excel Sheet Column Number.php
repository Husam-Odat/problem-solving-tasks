<?php
// 171. Excel Sheet Column Number
// https://leetcode.com/problems/excel-sheet-column-number/
// Easy
// Topics
// Companies
// Given a string columnTitle that represents the column title as appears in an Excel sheet, return its corresponding column number.

// For example:

// A -> 1
// B -> 2
// C -> 3
// ...
// Z -> 26
// AA -> 27
// AB -> 28 
// ...


// Example 1:

// Input: columnTitle = "A"
// Output: 1
// Example 2:

// Input: columnTitle = "AB"
// Output: 28
// Example 3:

// Input: columnTitle = "ZY"
// Output: 701


// Constraints:

// 1 <= columnTitle.length <= 7
// columnTitle consists only of uppercase English letters.
// columnTitle is in the range ["A", "FXSHRXW"].


class Solution
{

    /**
     * @param string $columnTitle
     * @return integer
     */
    public function titleToNumber($columnTitle)
    {
        $result = 0;
        $length = strlen($columnTitle);
        for ($i = 0; $i < $length; $i++) {
            $char = $columnTitle[$i];
            $value = ord($char) - ord('A') + 1;
            $result = $result * 26 + $value;
        }
        return $result;
    }
}

// test it 
$columnTitle = "AB";
$solution = new Solution;
var_dump($solution->titleToNumber($columnTitle)); // 28
//more test cases
$columnTitle = "A";
var_dump($solution->titleToNumber($columnTitle)); // 1
$columnTitle = "ZY";
var_dump($solution->titleToNumber($columnTitle)); // 701