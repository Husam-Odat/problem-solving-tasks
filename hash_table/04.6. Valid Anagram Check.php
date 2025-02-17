<?php
// 6. Valid Anagram Check

function isAnagram($str1, $str2)
{
    if (strlen($str1) !== strlen($str2)) {
        return false;
    }

    $hashMap1 = [];
    $hashMap2 = [];

    // Count frequency of characters in both strings
    for ($i = 0; $i < strlen($str1); $i++) {
        $hashMap1[$str1[$i]] = isset($hashMap1[$str1[$i]]) ? $hashMap1[$str1[$i]] + 1 : 1;
        $hashMap2[$str2[$i]] = isset($hashMap2[$str2[$i]]) ? $hashMap2[$str2[$i]] + 1 : 1;
    }

    return $hashMap1 === $hashMap2;
}

// Example usage
$str1 = "anagram";
$str2 = "nagaram";
echo isAnagram($str1, $str2) ? "True" : "False";  // Output: True