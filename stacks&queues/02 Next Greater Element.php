<?php
function nextGreaterElement($nums)
{
    $stack = [];
    $result = array_fill(0, count($nums), -1); // Initialize all elements with -1

    // Loop through the array backwards
    for ($i = count($nums) - 1; $i >= 0; $i--) {
        echo $i . '$nums[$i]' .  $nums[$i] . "\n";

        // Pop elements from the stack until we find a greater element
        while (!empty($stack) && $stack[count($stack) - 1] <= $nums[$i]) {
            echo $i . '$stack[count($stack) - 1]' .  $stack[count($stack) - 1] . "\n";
            array_pop($stack);
        }

        // If stack is not empty, the top element is the next greater element
        if (!empty($stack)) {
            $result[$i] = $stack[count($stack) - 1];
        }

        // Push the current element to the stack
        array_push($stack, $nums[$i]);
    }

    return $result;
}

// Test case
$nums = [4, 5, 2, 10, 8];
print_r(nextGreaterElement($nums));
// Output: [5, 10, 10, -1, -1]
