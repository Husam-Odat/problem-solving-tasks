<?php
// 144. Binary Tree Preorder Traversal
// Solved
// Easy
// Topics
// Companies
// Given the root of a binary tree, return the preorder traversal of its nodes' values.



// Example 1:

// Input: root = [1,null,2,3]

// Output: [1,2,3]

// Explanation:



// Example 2:

// Input: root = [1,2,3,4,5,null,8,null,null,6,7,9]

// Output: [1,2,4,5,6,7,3,8,9]

// Explanation:



// Example 3:

// Input: root = []

// Output: []

// Example 4:

// Input: root = [1]

// Output: [1]



// Constraints:

// The number of nodes in the tree is in the range [0, 100].
// -100 <= Node.val <= 100


// Follow up: Recursive solution is trivial, could you do it iteratively?
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */

class Solution
{
    public $arr = [];

    // /**
    //  * @param TreeNode $root
    //  * @return Integer[]
    //  */
    function preorderTraversal($root)
    {
        // Base case: if the node is null, return
        if ($root === null) {
            return [];
        }



        // Visit the root node (add the value to the result array)
        $this->arr[] = $root->val;
        // Traverse the left subtree
        $this->preorderTraversal($root->left);
        // Traverse the right subtree
        $this->preorderTraversal($root->right);

        // Return the result
        return $this->arr;
    }
}
