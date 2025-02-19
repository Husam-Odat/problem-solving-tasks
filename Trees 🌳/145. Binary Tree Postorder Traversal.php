<?php 
// 145. Binary Tree Postorder Traversal
// Solved
// Easy
// Topics
// Companies
// Given the root of a binary tree, return the postorder traversal of its nodes' values.

 

// Example 1:

// Input: root = [1,null,2,3]

// Output: [3,2,1]

// Explanation:



// Example 2:

// Input: root = [1,2,3,4,5,null,8,null,null,6,7,9]

// Output: [4,6,7,5,2,9,8,3,1]

// Explanation:



// Example 3:

// Input: root = []

// Output: []

// Example 4:

// Input: root = [1]

// Output: [1]

 

// Constraints:

// The number of the nodes in the tree is in the range [0, 100].
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
class Solution {
    public $arr=[];
        // /**
        //  * @param TreeNode $root
        //  * @return Integer[]
        //  */
        function postorderTraversal($root) {
    
            // Base case: if the node is null, return
            if ($root === null) {
                return [];
            }
    
            // Traverse the left subtree
            $this->postorderTraversal($root->left);
    
            // Traverse the right subtree
            $this->postorderTraversal($root->right);
    
            // Visit the root node and add its value to the result array
            $this->arr[] = $root->val;
    
            // Return the result
            return $this->arr;
        }
    }

?>