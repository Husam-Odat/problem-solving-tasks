<?php
function reverseString($str)
{
    $stack = [];

    // Push each character onto the stack
    for ($i = 0; $i < strlen($str); $i++) {

        echo $i . '$str[$i]' .  $str[$i] . "\n";
        array_push($stack, $str[$i]);
    }

    // Pop each character off the stack to reverse the string
    $reversedStr = "";
    while (!empty($stack)) {
        echo '$reversedStr' .  $reversedStr . "\n";

        $reversedStr .= array_pop($stack);
    }

    return $reversedStr;
}

// Test case
echo reverseString("Hello, World!"); // Output: !dlroW ,olleH