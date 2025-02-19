?
<?php
// 108. Convert Sorted Array to Binary Search Tree
// Solved
// Easy
// Topics
// Companies
// Given an integer array nums where the elements are sorted in ascending order, convert it to a 
// height-balanced
//  binary search tree.



// Example 1:


// Input: nums = [-10,-3,0,5,9]
// Output: [0,-3,9,-10,null,5]
// Explanation: [0,-10,5,null,-3,null,9] is also accepted:

// Example 2:


// Input: nums = [1,3]
// Output: [3,1]
// Explanation: [1,null,3] and [3,1] are both height-balanced BSTs.


// Constraints:

// 1 <= nums.length <= 104
// -104 <= nums[i] <= 104
// nums is sorted in a strictly increasing order.




//   Definition for a binary tree node.
class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution
{

    // /**
    //  * @param Integer[] $nums
    //  * @return TreeNode
    //  */
    function sortedArrayToBST($nums)
    {

        //  if (empty($nums)) {
        //     return null; // Base case: if the array is empty, return null
        // }
        // $mid = floor(count($nums)/2);
        // if($mid > -1) {return null;}
        // if($mid < count($nums)) {return null;}
        // $arr = new TreeNode($nums[$mid],$this->ortedArrayToBST($nums[$mid-1]),$this->ortedArrayToBST($nums[$mid+1]) );
        // return $arr;


        if (empty($nums)) {
            return null; // Base case: if the array is empty, return null
        }

        $mid = floor(count($nums) / 2); // Find the middle element

        // Create a new TreeNode with the middle element
        $node = new TreeNode($nums[$mid], $this->sortedArrayToBST(array_slice($nums, 0, $mid)),          $this->sortedArrayToBST(array_slice($nums, $mid + 1)));

        // // Recursively build the left and right subtrees
        // // $node->left = $this->sortedArrayToBST(array_slice($nums, 0, $mid)); // Left half
        // // $node->right = $this->sortedArrayToBST(array_slice($nums, $mid + 1)); // Right half

        return $node; // Return the constructed node
    }


    /**
     * Helper function to convert BST to array for easy comparison
     * @param TreeNode $root
     * @return array
     */
    function bstToArray($root)
    {
        $result = [];
        $queue = [$root];

        while (!empty($queue)) {
            $node = array_shift($queue);

            if ($node) {
                $result[] = $node->val; // Add the node's value
                $queue[] = $node->left;  // Add left child
                $queue[] = $node->right; // Add right child
            } else {
                $result[] = null; // Add null for missing children
            }
        }

        // Remove trailing nulls
        while (end($result) === null) {
            array_pop($result);
        }

        return $result;
    }
}

// Test cases
$solution = new Solution();

$testCases = [
    [-10, -3, 0, 5, 9], // Test case 1
    [1, 3]              // Test case 2
];

foreach ($testCases as $nums) {
    $bstRoot = $solution->sortedArrayToBST($nums);
    $resultArray = $solution->bstToArray($bstRoot);
    print_r($resultArray);
}
?>