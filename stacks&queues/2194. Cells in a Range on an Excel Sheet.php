?
<?php

// 2194. Cells in a Range on an Excel Sheet
// Easy
// Topics
// Companies
// Hint
// A cell (r, c) of an excel sheet is represented as a string "<col><row>" where:

// <col> denotes the column number c of the cell. It is represented by alphabetical letters.
// For example, the 1st column is denoted by 'A', the 2nd by 'B', the 3rd by 'C', and so on.
// <row> is the row number r of the cell. The rth row is represented by the integer r.
// You are given a string s in the format "<col1><row1>:<col2><row2>", where <col1> represents the column c1, <row1> represents the row r1, <col2> represents the column c2, and <row2> represents the row r2, such that r1 <= r2 and c1 <= c2.

// Return the list of cells (x, y) such that r1 <= x <= r2 and c1 <= y <= c2. The cells should be represented as strings in the format mentioned above and be sorted in non-decreasing order first by columns and then by rows.



// Example 1:


// Input: s = "K1:L2"
// Output: ["K1","K2","L1","L2"]
// Explanation:
// The above diagram shows the cells which should be present in the list.
// The red arrows denote the order in which the cells should be presented.
// Example 2:


// Input: s = "A1:F1"
// Output: ["A1","B1","C1","D1","E1","F1"]
// Explanation:
// The above diagram shows the cells which should be present in the list.
// The red arrow denotes the order in which the cells should be presented.


// Constraints:

// s.length == 5
// 'A' <= s[0] <= s[3] <= 'Z'
// '1' <= s[1] <= s[4] <= '9'
// s consists of uppercase English letters, digits and ':'.
// Seen this question in a real interview before?
// 1/5
// Yes
// No
// Accepted
// 78.2K
// Submissions
// 93.1K
// Acceptance Rate
// 84.0%
// Topics
// Companies
// Hint 1
// From the given string, find the corresponding rows and columns.
// Hint 2
// Iterate through the columns in ascending order and for each column, iterate through the rows in ascending order to obtain the required cells in sorted order.

// Similar Questions
// Excel Sheet Column Title
// Easy
// Excel Sheet Column Number
// Easy
// Matrix Cells in Distance Order
// Easy

class Solution
{

    /**
     * @param string $s
     * @return string[]
     */
    public function cellsInRange($s)
    {
        list($start_cell, $end_cell) = explode(':', $s);

        $start_col = $start_cell[0];
        $start_row = (int)substr($start_cell, 1);
        $end_col = $end_cell[0];
        $end_row = (int)substr($end_cell, 1);

        $result = array();

        for ($c = ord($start_col); $c <= ord($end_col); $c++) {
            $col_char = chr($c);
            for ($r = $start_row; $r <= $end_row; $r++) {
                $result[] = $col_char . $r;
            }
        }

        return $result;
    }
}
$solution = new Solution();
print_r($solution->cellsInRange("K1:L2")); //["K1","K2","L1","L2"]
print_r($solution->cellsInRange("A1:F1")); //["A1","B1","C1","D1","E1","F1"]



?>