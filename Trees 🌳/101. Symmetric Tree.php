<?php
// 101. Symmetric Tree
// Easy
// Topics
// Companies
// Given the root of a binary tree, check whether it is a mirror of itself (i.e., symmetric around its center).



// Example 1:


// Input: root = [1,2,2,3,4,4,3]
// Output: true
// Example 2:


// Input: root = [1,2,2,null,3,null,3]
// Output: false


// Constraints:

// The number of nodes in the tree is in the range [1, 1000].
// -100 <= Node.val <= 100
// https://leetcode.com/problems/symmetric-tree/


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
    //  * @param TreeNode $root
    //  * @return Boolean
    //  */
    function isSymmetric($root)
    {


        if ($root === null) {
            return true;
        }
        return $this->isMirror($root->left, $root->right);
    }

    private function isMirror($t1, $t2)
    {
        if ($t1 === null && $t2 === null) {
            return true;
        }
        if ($t1 === null || $t2 === null) {
            return false;
        }
        return ($t1->val === $t2->val)
            && $this->isMirror($t1->right, $t2->left)
            && $this->isMirror($t1->left, $t2->right);
    }
}

// Test cases
$tree1 = new TreeNode(1, new TreeNode(2, new TreeNode(3), new TreeNode(4)), new TreeNode(2, new TreeNode(4), new TreeNode(3)));
$tree2 = new TreeNode(1, new TreeNode(2, null, new TreeNode(3)), new TreeNode(2, null, new TreeNode(3)));

$solution = new Solution();
echo $solution->isSymmetric($tree1) ? 'true' : 'false'; // Output: true
echo "\n";
echo $solution->isSymmetric($tree2) ? 'true' : 'false'; // Output: false