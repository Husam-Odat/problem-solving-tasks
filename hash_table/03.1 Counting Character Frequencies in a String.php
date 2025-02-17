<?php




// Counting Character Frequencies in a String
function countCharacterFrequencies($str)
{
    $frequency = [];

    // Iterate through the string and count each character's frequency
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        if (isset($frequency[$char])) {
            $frequency[$char]++;
        } else {
            $frequency[$char] = 1;
        }
    }

    return $frequency;
}

// Example usage
$str = "hello world";
$charCount = countCharacterFrequencies($str);
print_r($charCount);

// Output:
// Array ( [h] => 1 [e] => 1 [l] => 3 [o] => 2 [ ] => 1 [w] => 1 [r] => 1 [d] => 1 )