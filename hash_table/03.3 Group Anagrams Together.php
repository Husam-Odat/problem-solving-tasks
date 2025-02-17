<?php


// Group Anagrams Together
//https://chatgpt.com/c/67a6a7a3-39f0-800b-81b9-3c718e8ac2a1

function groupAnagrams($words)
{
    $result = [];

    foreach ($words as $word) {
        // Sort the characters of the word to create a signature
        $sortedWord = str_split($word);
        sort($sortedWord);
        $sortedWord = implode('', $sortedWord);

        // Use the sorted word as a key in the hash table
        if (!isset($result[$sortedWord])) {
            $result[$sortedWord] = [];
        }

        // Group words with the same signature (anagram)
        $result[$sortedWord][] = $word;
    }

    return array_values($result);  // Return grouped anagrams
}

// Example usage
$words = ["eat", "tea", "tan", "ate", "nat", "bat"];
print_r(groupAnagrams($words));

// Output:
// Array (
//     [0] => Array ( [0] => eat [1] => tea [2] => ate )
//     [1] => Array ( [0] => tan [1] => nat )
//     [2] => Array ( [0] => bat )
// )