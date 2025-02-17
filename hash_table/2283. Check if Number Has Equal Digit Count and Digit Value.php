<?php
// 2283. Check if Number Has Equal Digit Count and Digit Value
// Easy
// Topics
// Companies
// Hint
// You are given a 0-indexed string num of length n consisting of digits.

// Return true if for every index i in the range 0 <= i < n, the digit i occurs num[i] times in num, otherwise return false.



// Example 1:

// Input: num = "1210"
// Output: true
// Explanation:
// num[0] = '1'. The digit 0 occurs once in num.
// num[1] = '2'. The digit 1 occurs twice in num.
// num[2] = '1'. The digit 2 occurs once in num.
// num[3] = '0'. The digit 3 occurs zero times in num.
// The condition holds true for every index in "1210", so return true.
// Example 2:

// Input: num = "030"
// Output: false
// Explanation:
// num[0] = '0'. The digit 0 should occur zero times, but actually occurs twice in num.
// num[1] = '3'. The digit 1 should occur three times, but actually occurs zero times in num.
// num[2] = '0'. The digit 2 occurs zero times in num.
// The indices 0 and 1 both violate the condition, so return false.


// Constraints:

// n == num.length
// 1 <= n <= 10
// num consists of digits.
// Seen this question in a real interview before?
// Hint 1
// Count the frequency of each digit in num.

// solve it 
class Solution
{
    /**
     * @param string $num
     * @return boolean
     */
    function digitCount($num)
    {
        $count = array_fill(0, 10, 0); // Initialize an array to store digit frequencies

        // Count occurrences of each digit
        for ($i = 0; $i < strlen($num); $i++) {
            $count[$num[$i]]++;
            echo $i . $count[$num[$i]] . "\n";
            print_r($count);
        }

        // Check if the count matches the given number at each index
        for ($i = 0; $i < strlen($num); $i++) {
            if ($count[$i] != (int)$num[$i]) {
                return false;
            }
        }

        return true;
    }
}

$solution = new Solution();

echo $solution->digitCount("1210") ? 'true' : 'false'; // Output: true
echo "\n";
// echo $solution->digitCount("030") ? 'true' : 'false';  // Output: false
// echo "\n";
// echo $solution->digitCount("2020") ? 'true' : 'false'; // Output: true
// echo "\n";
// echo $solution->digitCount("1220") ? 'true' : 'false'; // Output: false