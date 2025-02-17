<?php



function isValidParentheses($s)
{
    $stack = [];
    $map = [
        ')' => '(',
        ']' => '[',
        '}' => '{'
    ];

    for ($i = 0; $i < strlen($s); $i++) {
        echo $i . '$s[$i]' .  $s[$i] . "\n";
        $char = $s[$i];

        if (isset($map[$char])) {
            echo '$map[$char]' .  $map[$char] . "\n";

            // If current char is a closing bracket, check the stack
            if (empty($stack) || array_pop($stack) != $map[$char]) {
                echo $i . '$map[$char]' .  $map[$char] . "\n";

                return false;
            }
        } else {
            // Otherwise, it's an opening bracket, so push to the stack
            array_push($stack, $char);
            echo $i . '$char' .  $char . "\n";
        }
    }

    // If stack is empty, all the brackets matched
    return empty($stack);
}

// Test cases
// var_dump(isValidParentheses("()[]{}")); // true
// var_dump(isValidParentheses("(]"));     // false
// var_dump(isValidParentheses("([)]"));   // false
var_dump(isValidParentheses("{[]}"));   // true