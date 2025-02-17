<?php

// Creating a hash table
$hashTable = [
    'apple' => 1,
    'banana' => 2,
    'cherry' => 3
];

// Alternatively, you can use the `array()` function:
$hashTable = array(
    'apple' => 1,
    'banana' => 2,
    'cherry' => 3
);

$hashTable['date'] = 4;  // Insert a new key-value pair

echo $hashTable['banana'];  // Outputs: 2

if (isset($hashTable['grape'])) {
    echo $hashTable['grape'];
} else {
    echo "Key not found!";
}

if (array_key_exists('banana', $hashTable)) {
    echo $hashTable['banana'];  // Outputs: 2
}

unset($hashTable['banana']);  // Removes the 'banana' key-value pair

// Using array_key_exists
if (array_key_exists('apple', $hashTable)) {
    echo "Apple exists!";
}

// Using isset (but won't work for NULL values)
if (isset($hashTable['apple'])) {
    echo "Apple exists!";
}

foreach ($hashTable as $key => $value) {
    echo "$key => $value\n";
}




// Create a hash set (unique values only)
$hashSet = [
    'apple' => true,
    'banana' => true,
    'cherry' => true
];

// Add new elements
$hashSet['date'] = true;
$hashSet['Apple'] = true; //add key with different case

// Remove an element
unset($hashSet['banana']);

// Check for existence
if (isset($hashSet['apple'])) {
    echo "Apple is in the set!";
}

// Iterate over the hash set
foreach ($hashSet as $key => $value) {
    echo "$key is in the set\n";
}
