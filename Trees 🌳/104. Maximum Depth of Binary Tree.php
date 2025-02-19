<?php
// 104. Maximum Depth of Binary Tree
// Solved
// Easy
// Topics
// Companies
// Given the root of a binary tree, return its maximum depth.

// A binary tree's maximum depth is the number of nodes along the longest path from the root node down to the farthest leaf node.



// Example 1:


// Input: root = [3,9,20,null,null,15,7]
// Output: 3
// Example 2:

// Input: root = [1,null,2]
// Output: 2


// Constraints:

// The number of nodes in the tree is in the range [0, 104].
// -100 <= Node.val <= 100

//   Definition for a binary tree node.
// https://leetcode.com/problems/maximum-depth-of-binary-tree/description/
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
    //  * @param TreeNode $root
    //  * @return Integer
    //  */
    function maxDepth($root)
    {

        if ($root === null) {
            return 0;
        }
        return 1 + max($this->maxDepth($root->left), $this->maxDepth($root->right));
    }
}
// Test cases
$tree1 = new TreeNode(1, new TreeNode(2, new TreeNode(3), new TreeNode(4)), new TreeNode(2, new TreeNode(4), new TreeNode(3)));
$tree2 = new TreeNode(1, new TreeNode(2, null, new TreeNode(3)), new TreeNode(2, null, new TreeNode(3)));
$tree3 = new TreeNode(3, new TreeNode(9), new TreeNode(20, new TreeNode(15), new TreeNode(7)));
$tree4 = new TreeNode(1, null, new TreeNode(2));
$solution = new Solution();
echo "Max Depth of Tree1: " . $solution->maxDepth($tree1) . "\n"; // Output: 3
echo "Max Depth of Tree2: " . $solution->maxDepth($tree2) . "\n"; // Output: 3
echo "Max Depth of Tree3: " . $solution->maxDepth($tree3) . "\n"; // Output: 3
echo "Max Depth of Tree4: " . $solution->maxDepth($tree4) . "\n"; // Output: 2