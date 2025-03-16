<?php
// 682. Baseball Game
// Easy
// Topics
// Companies
// You are keeping the scores for a baseball game with strange rules. At the beginning of the game, you start with an empty record.

// You are given a list of strings operations, where operations[i] is the ith operation you must apply to the record and is one of the following:

// An integer x.
// Record a new score of x.
// '+'.
// Record a new score that is the sum of the previous two scores.
// 'D'.
// Record a new score that is the double of the previous score.
// 'C'.
// Invalidate the previous score, removing it from the record.
// Return the sum of all the scores on the record after applying all the operations.

// The test cases are generated such that the answer and all intermediate calculations fit in a 32-bit integer and that all operations are valid.



// Example 1:

// Input: ops = ["5","2","C","D","+"]
// Output: 30
// Explanation:
// "5" - Add 5 to the record, record is now [5].
// "2" - Add 2 to the record, record is now [5, 2].
// "C" - Invalidate and remove the previous score, record is now [5].
// "D" - Add 2 * 5 = 10 to the record, record is now [5, 10].
// "+" - Add 5 + 10 = 15 to the record, record is now [5, 10, 15].
// The total sum is 5 + 10 + 15 = 30.
// Example 2:

// Input: ops = ["5","-2","4","C","D","9","+","+"]
// Output: 27
// Explanation:
// "5" - Add 5 to the record, record is now [5].
// "-2" - Add -2 to the record, record is now [5, -2].
// "4" - Add 4 to the record, record is now [5, -2, 4].
// "C" - Invalidate and remove the previous score, record is now [5, -2].
// "D" - Add 2 * -2 = -4 to the record, record is now [5, -2, -4].
// "9" - Add 9 to the record, record is now [5, -2, -4, 9].
// "+" - Add -4 + 9 = 5 to the record, record is now [5, -2, -4, 9, 5].
// "+" - Add 9 + 5 = 14 to the record, record is now [5, -2, -4, 9, 5, 14].
// The total sum is 5 + -2 + -4 + 9 + 5 + 14 = 27.
// Example 3:

// Input: ops = ["1","C"]
// Output: 0
// Explanation:
// "1" - Add 1 to the record, record is now [1].
// "C" - Invalidate and remove the previous score, record is now [].
// Since the record is empty, the total sum is 0.


// Constraints:

// 1 <= operations.length <= 1000
// operations[i] is "C", "D", "+", or a string representing an integer in the range [-3 * 104, 3 * 104].
// For operation "+", there will always be at least two previous scores on the record.
// For operations "C" and "D", there will always be at least one previous score on the record.


class Solution01
{

    /**
     * @param string[] $operations
     * @return integer
     */
    function calPoints($operations)
    {
        $stack = [];
        foreach ($operations as $op) {
            switch ($op) {
                case 'C':
                    array_pop($stack);
                    break;
                case 'D':
                    $last = end($stack);
                    array_push($stack, $last * 2);
                    break;
                case '+':
                    $sum = $stack[count($stack) - 1] + $stack[count($stack) - 2];
                    array_push($stack, $sum);
                    break;
                default:
                    array_push($stack, (int)$op);
            }
        }
        return array_sum($stack);
    }
}
class Solution
{

    /**
     * @param string[] $operations
     * @return integer
     */
    public function calPoints($operations)
    {
        $stack = [];
        $length = count($operations);

        for ($i = 0; $i < $length; $i++) {
            $char = $operations[$i];
            if ($char === 'C') {
                array_pop(array: $stack);
            } elseif ($char === '+') {
                $last = $stack[count($stack) - 1];  // Last element
                $secondLast = $stack[count($stack) - 2];  // Second last element
                $last = $secondLast + $last;
                array_push($stack, $last);
            } elseif ($char === 'D') {
                $last = $stack[count($stack) - 1] * 2;
                array_push($stack, $last);
            } else {
                array_push($stack, $char);
            }
        }

        return array_sum($stack);
    }
}

//test casess 
$operations = ["5", "2", "C", "D", "+"];
$solution = new Solution;
var_dump($solution->calPoints($operations)); // 30
//more test cases
$operations = ["5", "-2", "4", "C", "D", "9", "+", "+"];
var_dump($solution->calPoints($operations)); // 27
//more test cases
$operations = ["1", "C"];
var_dump($solution->calPoints($operations)); // 0
//more test cases