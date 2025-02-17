<?php
function evaluatePostfix($expression)
{
    $stack = [];
    $tokens = explode(" ", $expression);

    foreach ($tokens as $token) {
        if (is_numeric($token)) {
            array_push($stack, $token);
        } else {
            // Pop the top two operands
            $b = array_pop($stack);
            $a = array_pop($stack);

            // Perform the operation and push the result back
            switch ($token) {
                case '+':
                    array_push($stack, $a + $b);
                    break;
                case '-':
                    array_push($stack, $a - $b);
                    break;
                case '*':
                    array_push($stack, $a * $b);
                    break;
                case '/':
                    array_push($stack, $a / $b);
                    break;
            }
        }
    }

    return array_pop($stack); // The result will be the last element in the stack
}

// Test case
echo evaluatePostfix("5 3 + 2 *"); // Output: 16
