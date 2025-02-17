<?php


// Find the First Non-Repeating Character in a String
function firstNonRepeatingCharacter($str)
{
    $frequency = [];

    // Count frequency of each character
    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];
        if (isset($frequency[$char])) {
            $frequency[$char]++;
        } else {
            $frequency[$char] = 1;
        }
    }

    // Find the first non-repeating character
    for ($i = 0; $i < strlen($str); $i++) {
        if ($frequency[$str[$i]] == 1) {
            return $str[$i];  // First non-repeating character
        }
    }

    return null;  // No non-repeating character found
}

// Example usage
$str = "swiss";
echo firstNonRepeatingCharacter($str);  // Output: w