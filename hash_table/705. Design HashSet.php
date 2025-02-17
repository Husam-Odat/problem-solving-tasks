<?php


// 705. Design HashSet
// Solved
// Easy
// Topics
// Companies
// Design a HashSet without using any built-in hash table libraries.

// Implement MyHashSet class:

// void add(key) Inserts the value key into the HashSet.
// bool contains(key) Returns whether the value key exists in the HashSet or not.
// void remove(key) Removes the value key in the HashSet. If key does not exist in the HashSet, do nothing.


// Example 1:

// Input
// ["MyHashSet", "add", "add", "contains", "contains", "add", "contains", "remove", "contains"]
// [[], [1], [2], [1], [3], [2], [2], [2], [2]]
// Output
// [null, null, null, true, false, null, true, null, false]

// Explanation
// MyHashSet myHashSet = new MyHashSet();
// myHashSet.add(1);      // set = [1]
// myHashSet.add(2);      // set = [1, 2]
// myHashSet.contains(1); // return True
// myHashSet.contains(3); // return False, (not found)
// myHashSet.add(2);      // set = [1, 2]
// myHashSet.contains(2); // return True
// myHashSet.remove(2);   // set = [1]
// myHashSet.contains(2); // return False, (already removed)


// Constraints:

// 0 <= key <= 106
// At most 104 calls will be made to add, remove, and contains.
// add(): 𝑂(1)O(1)
// remove(): 𝑂(1)O(1)
// contains(): 𝑂(1)O(1)

class MyHashSet
{
    private $set;
    /**
     */
    function __construct()
    {
        $this->set = [];
    }

    /**
     * @param integer $key
     * @return null
     */
    function add($key)
    {
        $this->set[$key] = true; // Use an associative array to store keys
    }

    // /**
    //  * @param Integer $key
    //  * @return NULL
    //  */
    function remove($key)
    {
        unset($this->set[$key]);
    }

    /**
     * @param integer $key
     * @return boolean
     */
    function contains($key)
    {
        // return array_key_exists($key, $this->set); // Correct order of parameters
        return isset($this->set[$key]);
    }
}

/**
 * Your MyHashSet object will be instantiated and called as such:
 * $obj = MyHashSet();
 * $obj->add($key);
 * $obj->remove($key);
 * $ret_3 = $obj->contains($key);
 */

$myHashSet = new MyHashSet();

$myHashSet->add(1);
$myHashSet->add(2);
echo "Contains 1? " . ($myHashSet->contains(1) ? "true" : "false") . PHP_EOL; // Expected: true
echo "Contains 3? " . ($myHashSet->contains(3) ? "true" : "false") . PHP_EOL; // Expected: false

$myHashSet->add(2);
echo "Contains 2? " . ($myHashSet->contains(2) ? "true" : "false") . PHP_EOL; // Expected: true

$myHashSet->remove(2);
echo "Contains 2 after removal? " . ($myHashSet->contains(2) ? "true" : "false") . PHP_EOL; // Expected: false