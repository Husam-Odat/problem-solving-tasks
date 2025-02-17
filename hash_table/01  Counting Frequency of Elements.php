<?php


$words = ['apple', 'banana', 'apple', 'cherry', 'banana', 'banana'];
$frequency = [];

foreach ($words as $word) {
    if (isset($frequency[$word])) {
        $frequency[$word]++;
    } else {
        $frequency[$word] = 1;
    }
}

print_r($frequency);
// Output:
// Array ( [apple] => 2 [banana] => 3 [cherry] => 1 )
