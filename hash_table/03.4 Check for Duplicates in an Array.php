<?php
function hasDuplicates($arr)
{
    $seen = [];

    foreach ($arr as $value) {
        if (isset($seen[$value])) {
            return true;  // Duplicate found
        }
        $seen[$value] = true;
    }

    return false;  // No duplicates
}

// Example usage
$arr = [1, 2, 3, 4, 5];
echo hasDuplicates($arr) ? "Duplicates found" : "No duplicates";  // Output: No duplicates

$arrWithDuplicates = [1, 2, 3, 4, 5, 2];
echo hasDuplicates($arrWithDuplicates) ? "Duplicates found" : "No duplicates";  // Output: Duplicates found